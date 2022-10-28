@extends('admin.layouts.app')

@section('template_title')
    {{ $financiamiento->name ?? 'Show Financiamiento' }}
@endsection

@section('content')
<!-- start page title -->
<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title">
                    <h4>Panel De Control</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Panel</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">{{ __('Financiamiento') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('financiamientos.index') }}" class="btn btn-success">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->
    
<div class="container-fluid">
    <div class="page-content-wrapper">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Financiamiento</span>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fina Id:</strong>
                            {{ $financiamiento->fina_id }}
                        </div>
                        <div class="form-group">
                            <strong>Empr Id:</strong>
                            {{ $financiamiento->empr_id }}
                        </div>
                        <div class="form-group">
                            <strong>Fuen Fina Id:</strong>
                            {{ $financiamiento->fuen_fina_id }}
                        </div>
                        <div class="form-group">
                            <strong>Fina Activ:</strong>
                            {{ $financiamiento->fina_activ }}
                        </div>
                        <div class="form-group">
                            <strong>Fina Cant:</strong>
                            {{ $financiamiento->fina_cant }}
                        </div>
                        <div class="form-group">
                            <strong>Fina Unid:</strong>
                            {{ $financiamiento->fina_unid }}
                        </div>
                        <div class="form-group">
                            <strong>Fina Mone:</strong>
                            {{ $financiamiento->fina_mone }}
                        </div>
                        <div class="form-group">
                            <strong>Fina Mont:</strong>
                            {{ $financiamiento->fina_mont }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
