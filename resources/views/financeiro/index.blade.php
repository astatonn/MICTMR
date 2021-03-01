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
                <h1>Financeiro</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                    <li class="breadcrumb-item active">Financeiro</li>
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
                        <div class="row">
                            <div class="col-2">
                                <a href="{{ route('nova_loja') }}" class="btn btn-sm btn-outline-success card-title">
                                    <span class="fas fa-coins"> Nova Receita </span>
                                </a>
                            </div>
                            <div class="col-2">
                                <a href="{{ route('nova_loja') }}" class="btn btn-sm btn-outline-danger card-title">
                                    <span class="fas fa-dollar-sign"> Nova Despesa </span>
                                </a>
                            </div>
                            <div class="col-2">
                                <a href="{{ route('nova_loja') }}" class="btn btn-sm btn-outline-secondary card-title">
                                    <span class="fas fa-money-bill"> Mensalidades </span>
                                </a>
                            </div>
                        </div>
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="financeiro" class="table table-bordered table-striped dataTable dtr-inline"
                                    role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th width="10%">Data</th>
                                            <th width="10%">Valor</th>
                                            <th width="10%">Tipo</th>
                                            <th>Descrição</th>
                                            <th width="20%">Registrado Por</th>
                                            <th width="10%">Visualizar</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($entradas as $entrada)
                                            <tr role="row" class=" ">


                                                <td>{{ $entrada->created_at->format('d/m/Y') }} </td>
                                                <td>R$ {{ $entrada->valor }}</td>
                                                <td>{{ $entrada->tipo }}</td>
                                                <td>{{ $entrada->descricao }}</td>
                                                <td>{{ $entrada->User->name }}</td>
                                                <td style="text-align: center"><a
                                                        href="{{ route('ver_transacao', ['id' => Crypt::encrypt($entrada->id)]) }}"><i
                                                            class="fas fa-eye btn btn-sm btn-primary"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @foreach ($saidas as $saida)
                                            <tr role="row" class="">


                                                <td>{{ $saida->created_at->format('d/m/Y') }} </td>
                                                <td>R$ {{ $saida->valor }}</td>
                                                <td>{{ $saida->tipo }}</td>
                                                <td>{{ $saida->descricao }}</td>
                                                <td>{{ $saida->users->name }}</td>
                                                <td style="text-align: center"><a
                                                        href="{{ route('ver_transacao', ['id' => Crypt::encrypt($saida->id)]) }}"><i
                                                            class="fas fa-eye btn btn-sm btn-primary"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                    <tfoot>
                                        <tr>

                                            <th width="10%">Data</th>
                                            <th width="10%">Valor</th>
                                            <th width="10%">Tipo</th>
                                            <th>Descrição</th>
                                            <th width="20%">Registrado Por</th>
                                            <th width="10%">Visualizar</th>
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
            $('#financeiro').DataTable({
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
                "pageLength": 25,

            });
            $('#financeiro').removeClass('display').addClass('table table-striped table-bordered');
        });

    </script>
@endsection
