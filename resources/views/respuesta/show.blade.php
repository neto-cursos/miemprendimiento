@extends('admin.layouts.app')

@section('template_title')
    {{ $respuesta->name ?? 'Show Respuesta' }}
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
                        <li class="breadcrumb-item active">{{ __('Respuesta') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('respuestas.index') }}" class="btn btn-success">Regresar</a>
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
                            <span class="card-title">Mostrar Respuesta</span>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>ID</strong>
                            {{ $respuesta->resp_id }}
                        </div>
                        <div class="form-group">
                            <strong>Preg Id:</strong>
                            {{ $respuesta->preg_id }}
                        </div>
                        <div class="form-group">
                            <strong>Resp Desc:</strong>
                            {{ $respuesta->resp_desc }}
                        </div>
                        <div class="form-group">
                            <strong>Modu Nume:</strong>
                            {{ $respuesta->modu_nume }}
                        </div>
                        <div class="form-group">
                            <strong>Canv Id:</strong>
                            {{ $respuesta->canv_id }}
                        </div>
                        <div class="form-group">
                            <strong>Resp Nume:</strong>
                            {{ $respuesta->resp_nume }}
                        </div>
                        <div class="form-group">
                            <strong>Resp Text:</strong>
                            {{ $respuesta->resp_text }}
                        </div>
                        <div class="form-group">
                            <strong>Resp Esta:</strong>
                            {{ $respuesta->resp_esta }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
