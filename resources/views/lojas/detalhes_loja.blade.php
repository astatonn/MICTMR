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
                        <div class="row">

                            <div class="col-8">
                                <div class="row">
                                    <div class="col-4">
                                        <h4>Número </h4>
                                        {{ $loja->numero }}
                                    </div>
                                    <div class="col-4">
                                        <h4>Título</h4>
                                        {{ $loja->titulo }}
                                    </div>
                                    <div class="col-4">
                                        <h4>
                                            Nome
                                        </h4>
                                        {{ $loja->nome }}
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="row">
                                        <div class="col-4">
                                            <h4>Oriente</h4>
                                            {{ $loja->oriente }}
                                        </div>
                                        <div class="col-4">
                                            <h4>Endereço</h4>
                                            {{ $loja->endereco }}
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                            <div class="col-4">

                                <img src="{{ asset("storage/images/lojas/$loja->imagem") }}" alt="Foto da Loja" class="img-thumbnail rounded float-right"
                                    height="200" width="200">

                            </div>
                           
                        </div>
                        <hr>
                        <div class="card-header">
                            <h1 class="card-title">
                                <i class="fas fa-list"></i>
                                Lista de irmãos
                            </h1>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="lojas" class="table table-bordered table-striped" role="grid">
                                        <thead>
                                            <tr role="row">
                                                <th width="100">Grau</th>
                                                <th>Nome</th>
                                                <th width="30">Situação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($usuarios as $usuario)
                                                <tr role="row">

                                                    <td>{{ $usuario->grau }}</td>
                                                    <td>{{ $usuario->name }}</td>
                                                    @if ($usuario->situacao == 1)
                                                        <td>Ativo</td>
                                                    @else
                                                        <td>Inativo</td>
                                                    @endif


                                                </tr>
                                            @endforeach


                                        </tbody>
                                        <tfoot>
                                            <tr>

                                                <th>Grau</th>
                                                <th>Nome</th>
                                                <th>Situação</th>
                                            </tr>
                                        </tfoot>

                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>




@endsection
