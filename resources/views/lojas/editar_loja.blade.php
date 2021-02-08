@extends('adminlte::page')

@section('title', 'Usuários')

@section('adminlte_css')
    @stack('css')
    @yield('css')

@stop
@php
use Illuminate\Support\Facades\Crypt;
@endphp

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Lojas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                    <li class="breadcrumb-item active">Lojas</li>
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
    <div class="col-12">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
            Alterações feitas nos dados da loja podem comprometer os cadastros. Tenha certeza que uma loja com mesmo
            número/nome já não exista.<br>
            A duplicação dos dados pode prejudicar todo o funcionamento do sistema.
        </div>
    </div>
    <div class="row">

        <div class="card-body">
            <div class="card">
                <div class="col-12">
                    <div class="card-header">
                        <h1 class="card-title">
                            <i class="fas fa-info-circle"></i>
                            Detalhes
                        </h1>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('submit_editar_loja') }}" class="form-group" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_loja" value="{{ $loja->id }}">
                            <div class="row">

                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="numero_loja">Número: </label>
                                            <input type="number" class="form-control form-control-border" id="numero_loja"
                                                name="numero_loja" placeholder="Ex.: 000" value="{{ $loja->numero }}">
                                        </div>
                                        <div class="col-2">
                                            <label for="titulo_loja">Título: </label>
                                            <input type="text" class="form-control form-control-border" id="titulo_loja"
                                                name="titulo_loja" placeholder="Ex.: ARSL" value="{{ $loja->titulo }}">
                                        </div>
                                        <div class="col-6">
                                            <label for="nome_loja">Nome: </label>
                                            <input type="text" class="form-control form-control-border" id="nome_loja"
                                                name="nome_loja" placeholder="Ex.: JUSTO E PERFEITO"
                                                value="{{ $loja->nome }}">
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="oriente_loja">Oriente: </label>
                                                <input type="text" class="form-control form-control-border" id="oriente_loja"
                                                    name="oriente_loja" placeholder="Ex.: Porto Alegre, RS"
                                                    value="{{ $loja->oriente }}">
                                            </div>
                                            <div class="col-8">
                                                <label for="endereco_loja">Endereço: </label>
                                                <input type="text" class="form-control form-control-border" id="endereco_loja"
                                                    name="endereco_loja" placeholder="Ex.: Rua dos Templários, 3"
                                                    value="{{ $loja->endereco }}">
    
                                            </div>
    
                                            <div class="col-12 mt-4">
                                                <label for="imagem_loja">Imagem: </label>
                                                <div class="input-group">
    
                                                    <div class="custom-file">
    
                                                        <input type="file" class="custom-file-input" id="imagem_loja"
                                                            name="imagem_loja">
                                                        <label class="custom-file-label" for="imagem_loja">Escolha o
                                                            arquivo</label>
                                                    </div>
    
                                                </div>
                                            </div>
                                            <div class="col-3 mt-4">
                                                <input type="submit" class="btn btn-block btn-info" value="Enviar">
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                                <div class="col-4">

                                    <img src="{{ asset("storage/images/lojas/$loja->imagem") }}" alt="Foto da Loja"
                                        class="img-thumbnail rounded float-right" height="200" width="200">

                                </div>
                                


                            </div>
                            <hr>

                        </form>

                    </div>
                    <div class="col-12">
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
        </div>
    </div>




@endsection
