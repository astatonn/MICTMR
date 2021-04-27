<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\FinanceiroController;
use App\Http\Controllers\RegistroUsuarioController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AvisosController;
use App\Http\Controllers\RelatoriosController;
use App\Http\Controllers\AtasController;
use App\Http\Controllers\LojasController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//==============================================================================================
// DEFINIÇÃO DE ROTAS
// APENAS USUÁRIOS LOGADOS


//==============================================================================================
// HISTÓRICO
Route::get('/historico',  [HistoricoController::class, 'index'])->name('historico');
Route::get('/pesquisa_historico',  [HistoricoController::class, 'pesquisa_historico'])->name('pesquisa_historico');


//==============================================================================================
// ROTAS DE TRANSAÇÃO FINANCEIRA
Route::get('/financeiro',  [FinanceiroController::class, 'index'])->name('financeiro');

Route::get('/entrada_fin',  [FinanceiroController::class, 'entrada_fin'])->name('entrada_fin');
Route::get('/submit_entrada_fin',  [FinanceiroController::class, 'submit_entrada_fin'])->name('submit_entrada_fin');

Route::get('/saida_fin',  [FinanceiroController::class, 'saida_fin'])->name('saida_fin');
Route::get('/submit_saida_fin',  [FinanceiroController::class, 'submit_saida_fin'])->name('submit_saida_fin');

Route::get('/ver_transacao/{id}', [FinanceiroController::class, 'ver_transacao'])->name('ver_transacao');


//==============================================================================================
// CRUD USUARIO
Route::get('/cadastro_usuario',  [RegistroUsuarioController::class, 'cadastro_usuario'])->name('cadastro_usuario');
Route::get('/submit_cadastro_novo_usuario',  [RegistroUsuarioController::class, 'submit_cadastro_novo_usuario'])->name('submit_cadastro_novo_usuario');

Route::get('/edita_usuario/{id}',  [RegistroUsuarioController::class, 'edita_usuario'])->name('edita_usuario');
Route::get('/submit_edita_usuario',  [RegistroUsuarioController::class, 'submit_edita_usuario'])->name('submit_edita_usuario');

Route::get('/usuarios',  [RegistroUsuarioController::class, 'index'])->name('usuarios');


//==============================================================================================
// AGENDA
Route::get('/cria_evento',  [AgendaController::class, 'cria_evento'])->name('cria_evento');
Route::get('/submit_cria_evento',  [AgendaController::class, 'submit_cria_evento'])->name('submit_cria_evento');

Route::get('/edita_evento',  [AgendaController::class, 'edita_evento'])->name('edita_evento');
Route::get('/submit_edita_evento',  [AgendaController::class, 'submit_edita_evento'])->name('submit_edita_evento');

Route::get('/ver_eventos',  [AgendaController::class, 'index'])->name('ver_eventos');


//==============================================================================================
// AVISOS
Route::get('/avisos',  [AvisosController::class, 'index'])->name('avisos');

Route::get('/cria_aviso',  [AvisosController::class, 'cria_aviso'])->name('cria_aviso');
Route::get('/submit_cria_aviso',  [AvisosController::class, 'submit_cria_aviso'])->name('submit_cria_aviso');

Route::get('/edita_aviso',  [AvisosController::class, 'edita_aviso'])->name('edita_aviso');
Route::get('/submit_edita_aviso',  [AvisosController::class, 'submit_edita_aviso'])->name('submit_edita_aviso');


//==============================================================================================
// GERAR RELATÓRIO
Route::get('/relatorios',  [RelatoriosController::class, 'index'])->name('relatorios');
Route::get('/gerar_relatorio',  [RelatoriosController::class, 'gerar_relatorio'])->name('gerar_relatorio');


//==============================================================================================
// CONTATO
Route::get('/contato',  [MainController::class, 'contato'])->name('contato');


//==============================================================================================
// ATA DE PRESENÇA
Route::get('/atas',  [AtasController::class, 'index'])->name('atas');

Route::get('/criar_nova_ata',  [AtasController::class, 'criar_nova_ata'])->name('criar_nova_ata');
Route::get('/submit_criar_nova_ata',  [AtasController::class, 'submit_criar_nova_ata'])->name('submit_criar_nova_ata');

Route::get('/editar_ata',  [AtasController::class, 'editar_ata'])->name('editar_ata');
Route::get('/ata_enviar/{id}',  [AtasController::class, 'ata_enviar'])->name('ata_enviar');


//==============================================================================================
// CRUD  LOJA
Route::get('/nova_loja',  [LojasController::class, 'nova_loja'])->name('nova_loja');
Route::post('/submit_nova_loja',  [LojasController::class, 'submit_nova_loja'])->name('submit_nova_loja');

Route::get('/lojas',  [LojasController::class, 'index'])->name('lojas');

Route::get('/ver_loja/{id}',  [LojasController::class, 'ver_loja'])->name('ver_loja');
Route::get('/editar_loja/{id}',  [LojasController::class, 'editar_loja'])->name('editar_loja');
Route::post('/submit_editar_loja',  [LojasController::class, 'submit_editar_loja'])->name('submit_editar_loja');





