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

    {{-- USUÁRIO CONVENCIONAL --}}

    @if ($permission == 2)

        <div class="row">
            <div class="card-body">
                <div class="card">
                    <div class="col-12">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="lojas" class="table table-bordered table-striped dataTable dtr-inline"
                                        role="grid" style="text-align: center">
                                        <thead>
                                            <tr role="row">
                                                <th>Número</th>
                                                <th>Título</th>
                                                <th>Nome</th>
                                                <th>Oriente</th>
                                                <th><i class="fas fa-cog"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lojas as $loja)
                                                <tr role="row">

                                                    <td>{{ $loja->numero }}</td>
                                                    <td>{{ $loja->titulo }}</td>
                                                    <td>{{ $loja->nome }}</td>
                                                    <td>{{ $loja->oriente }}</td>
                                                    
                                                    <td>
                                                        <div class="btn-group">
                                                            <a
                                                                href="{{ route('ver_loja', ['id' => Crypt::encrypt($loja->id)]) }}"><i
                                                                    class="fas fa-eye btn btn-sm btn-primary"></i></a>
                                                        </div>
                                                    </td>

                                                </tr>
                                            @endforeach


                                        </tbody>
                                        <tfoot>
                                            <tr>

                                                <th>Número</th>
                                                <th>Título</th>
                                                <th>Nome</th>
                                                <th>Oriente</th>
                                                <th><i class="fas fa-cog"></i></th>
                                            </tr>
                                        </tfoot>

                                    </table>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.col -->

            <!-- ./row -->
        </div>

        {{-- DEMAIS USUÁRIOS --}}

    @else


        <div class="row">
            <div class="card-body">
                <div class="card">
                    <div class="col-12">
                        <div class="card-header">

                            <a href="{{ route('nova_loja') }}" class="btn btn-sm btn-outline-success card-title">
                                <span class="fa fa-plus"> Inserir nova Loja</span>
                            </a>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="lojas" class="table table-bordered table-striped dataTable dtr-inline"
                                        role="grid" style="text-align: center">
                                        <thead>
                                            <tr role="row">
                                                <th>Número</th>
                                                <th>Título</th>
                                                <th>Nome</th>
                                                <th>Oriente</th>

                                                <th><i class="fas fa-cog"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lojas as $loja)
                                                <tr role="row">

                                                    <td>{{ $loja->numero }}</td>
                                                    <td>{{ $loja->titulo }}</td>
                                                    <td>{{ $loja->nome }}</td>
                                                    <td>{{ $loja->oriente }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a
                                                                href="{{ route('ver_loja', ['id' => Crypt::encrypt($loja->id)]) }}"><i
                                                                    class="fas fa-eye btn btn-sm btn-primary"></i></a>
                                                                    <a
                                                                    href="{{ route('editar_loja', ['id' => Crypt::encrypt($loja->id)]) }}"><i
                                                                    class="fas fa-edit btn btn-sm btn-warning"></i></a>
                                                        </div>
                                                    </td>

                                                </tr>
                                            @endforeach


                                        </tbody>
                                        <tfoot>
                                            <tr>

                                                <th>Número</th>
                                                <th>Título</th>
                                                <th>Nome</th>
                                                <th>Oriente</th>
                                                <th><i class="fas fa-cog"></i></th>
                                            </tr>
                                        </tfoot>

                                    </table>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.col -->

            <!-- ./row -->
        </div>
    @endif





@endsection

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"></script>
    <script>
        $(document).ready(function() {
            $('#lojas').DataTable({
                dom: 'Bfrtilp',
                responsive: 'true',
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json',
                },
                buttons: [{
                        extend: 'excelHtml5',
                        className: 'btn btn-success ',
                        text: '<i class="fas fa-file-excel "></i>',
                        tittleAttr: 'Exportar para Excel',

                    },

                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf "></i>',
                        tittleAttr: 'Exportar para PDF',
                        className: 'btn btn-danger',
                        exportOptions: {
                            modifier: {
                                page: 'current'
                            }
                        }
                    },

                    {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i>',
                        tittleAttr: 'Imprimir',
                        className: 'btn btn-info',
                        exportOptions: {
                            modifier: {
                                page: 'current'
                            }
                        }
                    },
                ],
                "pageLength": 10,

            });
            $('#lojas').removeClass('display').addClass('table table-striped table-bordered');
        });

    </script>
@endsection
