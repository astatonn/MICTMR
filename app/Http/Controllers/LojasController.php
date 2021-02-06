<?php

namespace App\Http\Controllers;

use App\Models\lojas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class LojasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ==========================================================================
    public function nova_loja(Request $request)
    {
        $session = $request->session()->get("permissions");
        if ($session == null || $session == 2) {
            return redirect()->route('home');
        }

        return view('lojas.nova_loja');
    }

    // ==========================================================================
    public function submit_nova_loja(Request $request)
    {
        $session = $request->session()->get("permissions");
        if ($session == null) {
            return redirect()->route('home');
        }
        $request->validate(
            //rules
            [
                'imagem_loja'           => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:512'],
                'nome_loja'             => ['required', 'string', 'min:5', 'max:255'],
                'numero_loja'           => ['required', 'string', 'min:1', 'max:10'],
                'titulo_loja'           => ['required', 'string', 'min:2', 'max:10'],
                'oriente_loja'           => ['required', 'string', 'min:5', 'max:255'],
            ],
            //messages
            [
                // ERROS DA IMAGEM
                'imagem_loja.required'  => 'A imagem é obrigatória',
                'imagem_loja.image'     => 'Deve enviar uma imagem no formato .jpg ou .png',
                'imagem_loja.max'       => 'A imagem deve ter no máximo 512 Kb',

                // ERROS DO NOME
                'nome_loja.required'    => 'O nome é obrigatório',
                'nome_loja.min'         => 'O nome deve ter no mínimo 5 caracteres',
                'nome_loja.max'         => 'O nome deve ter no máximo 255 caracteres',

                // ERROS DO NÚMERO DA LOJA
                'numero_loja.required'    => 'O número é obrigatório',
                'numero_loja.number'      => 'Apenas números são entradas válidas',
                'numero_loja.min'         => 'O número deve ter no mínimo 1 caracter',
                'numero_loja.max'         => 'O número deve ter no máximo 255 caracteres',

                // ERROS DO TÍTULO
                'titulo_loja.required'    => 'O título é obrigatório',
                'titulo_loja.min'         => 'O título deve ter no mínimo 2 caracteres',
                'titulo_loja.max'         => 'O título deve ter no máximo 10 caracteres',

                // ERROS DO ORIENTE
                'oriente_loja.required'    => 'O oriente é obrigatório',
                'oriente_loja.min'         => 'O oriente deve ter no mínimo 5 caracteres',
                'oriente_loja.max'         => 'O oriente deve ter no máximo 255 caracteres',
            ]
        );

        $nome_imagem = ($request->numero_loja . $request->titulo_loja . Str::kebab($request->nome_loja)) . '.jpg';


        // SALVAR IMAGEM NO STORAGE
        $upload = $request->imagem_loja->storeAs('public/images/lojas', $nome_imagem);

        if (!$upload) {
            return redirect()->back()->with('error', 'Falha no upload da Imagem');
        }

        //VERIFICA SE EXISTE REGISTRO SEMELHANTE
        
        if(lojas::where('numero','=',$request->numero_loja)->exists() || lojas::where('nome','=',$request->nome_loja)->exists()){
            $request->session()->flash('flash_failed', '!');
            return redirect()->route('nova_loja');

        }

       lojas::firstOrCreate(
            [
                'numero'    => $request->numero_loja,
            ],
            [
                'nome'      => $request->nome_loja,
                'titulo'    => $request->titulo_loja,
                'oriente'   => $request->oriente_loja,
                'imagem'    => $nome_imagem
            ]
        );


        $request->session()->flash('flash_success', '!');
        return redirect()->route('nova_loja');
    }

    // ==========================================================================
    public function index(Request $request)
    {
        $session = $request->session()->get("permissions");
        $lojas = lojas::all();
        if ($session == null) {
            return redirect()->route('home');
        }

        return view(
            "lojas.index",
            [
                'permission' => $session,
                'lojas' => $lojas
            ]
        );
    }

    // ==========================================================================
    public function editar_loja()
    {
        echo 'teste';
    }

    // ==========================================================================
    public function submit_editar_loja()
    {
        echo 'teste';
    }

    public function ver_loja(Request $request, $id)
    {       
        $session = $request->session()->get("permissions");
        if ($session == null ) {
            return redirect()->route('home');
        }

        $decrypted = Crypt::decrypt($id);
        $detalhesDaLoja = lojas::find($decrypted);
        $listaUsuarios = User::where ('loja_id',$decrypted)->get();
        $imagem_loja = asset('images/lojas/'.$detalhesDaLoja->imagem);


        return view('lojas.detalhes_loja', [
            'loja'      => $detalhesDaLoja,
            'usuarios'  => $listaUsuarios,
            'imagem'    => $imagem_loja,
        ]);
        
       
    }
}
