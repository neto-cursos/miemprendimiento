@extends('admin.layouts.app')

@section('template_title')
    {{ $cronActividade->name ?? 'Show Cron Actividade' }}
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
                        <li class="breadcrumb-item active">{{ __('Cron Actividade') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('cron-actividades.index') }}" class="btn btn-success">Regresar</a>
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
                            <span class="card-title">Mostrar Cron Actividade</span>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cron Id:</strong>
                            {{ $cronActividade->cron_id }}
                        </div>
                        <div class="form-group">
                            <strong>Empr Id:</strong>
                            {{ $cronActividade->empr_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cron Acti Padr:</strong>
                            {{ $cronActividade->cron_acti_padr }}
                        </div>
                        <div class="form-group">
                            <strong>Type:</strong>
                            {{ $cronActividade->type }}
                        </div>
                        <div class="form-group">
                            <strong>Project:</strong>
                            {{ $cronActividade->project }}
                        </div>
                        <div class="form-group">
                            <strong>Displayorder:</strong>
                            {{ $cronActividade->displayorder }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $cronActividade->name }}
                        </div>
                        <div class="form-group">
                            <strong>Start:</strong>
                            {{ $cronActividade->start }}
                        </div>
                        <div class="form-group">
                            <strong>End:</strong>
                            {{ $cronActividade->end }}
                        </div>
                        <div class="form-group">
                            <strong>Responsable:</strong>
                            {{ $cronActividade->responsable }}
                        </div>
                        <div class="form-group">
                            <strong>Dependencies:</strong>
                            {{ $cronActividade->dependencies }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $cronActividade->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Unidad:</strong>
                            {{ $cronActividade->unidad }}
                        </div>
                        <div class="form-group">
                            <strong>Costounitario:</strong>
                            {{ $cronActividade->costounitario }}
                        </div>
                        <div class="form-group">
                            <strong>Monto:</strong>
                            {{ $cronActividade->monto }}
                        </div>
                        <div class="form-group">
                            <strong>Notas:</strong>
                            {{ $cronActividade->notas }}
                        </div>
                        <div class="form-group">
                            <strong>Progress:</strong>
                            {{ $cronActividade->progress }}
                        </div>
                        <div class="form-group">
                            <strong>Cron Done:</strong>
                            {{ $cronActividade->cron_done }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $cronActividade->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
