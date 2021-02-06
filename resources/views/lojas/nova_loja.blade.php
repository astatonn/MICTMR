@extends('adminlte::page')

@section('title', 'Usuários')

@section('adminlte_css')
    @stack('css')
    @yield('css')

@stop

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Lojas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('lojas') }}">Lojas</a></li>
                    <li class="breadcrumb-item active">Nova Loja</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop
{{--
1 - ADMIN
2 - USUÁRIO CONVENCIONAL
3 - TESOUREIRO
4 - VENERÁVEL
5 - SECRETÁRIO
--}}


@section('content')


    <div class="col-md-8 offset-md-2">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Insira as informações</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('submit_nova_loja') }}" class="form-group" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-2">
                            <label for="numero_loja">Número: </label>
                            <input type="number" class="form-control form-control-border" id="numero_loja"
                                name="numero_loja" placeholder="Ex.: 000">
                        </div>
                        <div class="col-2">
                            <label for="titulo_loja">Título: </label>
                            <input type="text" class="form-control form-control-border" id="titulo_loja" name="titulo_loja"
                                placeholder="Ex.: ARSL">
                        </div>
                        <div class="col-8">
                            <label for="nome_loja">Nome: </label>
                            <input type="text" class="form-control form-control-border" id="nome_loja" name="nome_loja"
                                placeholder="Ex.: JUSTO E PERFEITO">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="oriente_loja">Oriente: </label>
                            <input type="text" class="form-control form-control-border" id="oriente_loja"
                                name="oriente_loja" placeholder="Ex.: Porto Alegre, RS">
                        </div>
                    </div>
                    <label for="imagem_loja">Imagem: </label>
                    <div class="input-group">

                        <div class="custom-file">

                            <input type="file" class="custom-file-input" id="imagem_loja" name="imagem_loja">
                            <label class="custom-file-label" for="imagem_loja">Escolha o arquivo</label>
                        </div>

                    </div>
                    <div class="col-3 mt-2">
                        <input type="submit" class="btn btn-block btn-info" value="Enviar">
                    </div>
                </form>
                {{-- ERROS --}}

                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="alert alert-danger">{{ $error }}</li>
                            @endforeach

                        </ul>
                    </div>

                @endif
                @if (Session::has('flash_success'))
                    <li class="alert alert-success">Registro enviado com sucesso!</li>
                @endif
                @if (Session::has('flash_failed'))
                    <li class="alert alert-danger">Registro duplicado, favor verificar</li>
                @endif





            </div>
        </div>


        <!-- /.card-body -->
    </div>



@endsection
