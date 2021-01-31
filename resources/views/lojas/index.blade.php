@extends('adminlte::page')

@section('title', 'Usuários')

    {{-- @section('content_header')
    <h3>Lista de Usuários</h3>
    <ol class="breadcrumb">
        <li>home</li>

    </ol>
    @stop --}}
    {{--
    1 - ADMIN
    2 - USUÁRIO CONVENCIONAL
    3 - TESOUREIRO
    4 - VENERÁVEL
    5 - SECRETÁRIO
    --}}


    @if ($permission == 1)
        {{-- ADMIN --}}
        @section('content')
        <div class="content-wrapper" style="min-height: 926px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Data Tables
                <small>advanced tables</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
              </ol>
            </section>
        
            <!-- /.content -->
          </div>
        @endsection
    @endif

    @if ($permission == 2)
        {{-- Usuário Convencional --}}
    @endif

    @if ($permission == 3)
        {{-- Tesoureiro --}}
    @endif

    @if ($permission == 4)
        {{-- Venerável --}}
    @endif

    @if ($permission == 5)
        {{-- Secretário --}}
    @endif
