@extends('admin.layouts.app')

@section('template_title')
    {{ $cronograma->name ?? 'Show Cronograma' }}
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
                        <li class="breadcrumb-item active">{{ __('Cronograma') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('cronogramas.index') }}" class="btn btn-success">Regresar</a>
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
                            <span class="card-title">Mostrar Cronograma</span>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cron Id:</strong>
                            {{ $cronograma->cron_id }}
                        </div>
                        <div class="form-group">
                            <strong>Empr Id:</strong>
                            {{ $cronograma->empr_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cron Fech Inic:</strong>
                            {{ $cronograma->cron_fech_inic }}
                        </div>
                        <div class="form-group">
                            <strong>Cron Fech Fin:</strong>
                            {{ $cronograma->cron_fech_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Cron Proy:</strong>
                            {{ $cronograma->cron_proy }}
                        </div>
                        <div class="form-group">
                            <strong>Cron Desc:</strong>
                            {{ $cronograma->cron_desc }}
                        </div>
                        <div class="form-group">
                            <strong>Cron Type:</strong>
                            {{ $cronograma->cron_type }}
                        </div>
                        <div class="form-group">
                            <strong>Cron Hide Child:</strong>
                            {{ $cronograma->cron_hide_child }}
                        </div>
                        <div class="form-group">
                            <strong>Cron Done:</strong>
                            {{ $cronograma->cron_done }}
                        </div>
                        <div class="form-group">
                            <strong>Cron Esta:</strong>
                            {{ $cronograma->cron_esta }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
