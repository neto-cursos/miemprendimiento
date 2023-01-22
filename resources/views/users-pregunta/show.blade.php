@extends('admin.layouts.app')

@section('template_title')
    {{ $usersPregunta->name ?? 'Show Users Pregunta' }}
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
                        <li class="breadcrumb-item active">{{ __('Users Pregunta') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('users-preguntas.index') }}" class="btn btn-success">Regresar</a>
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
                            <span class="card-title">Mostrar Users Pregunta</span>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Usr Preg Id:</strong>
                            {{ $usersPregunta->usr_preg_id }}
                        </div>
                        <div class="form-group">
                            <strong>Modu Id:</strong>
                            {{ $usersPregunta->modu_id }}
                        </div>
                        <div class="form-group">
                            <strong>Empr Id:</strong>
                            {{ $usersPregunta->empr_id }}
                        </div>
                        <div class="form-group">
                            <strong>Usr Preg Own:</strong>
                            {{ $usersPregunta->usr_preg_own }}
                        </div>
                        <div class="form-group">
                            <strong>Usr Repl Preg Id:</strong>
                            {{ $usersPregunta->usr_repl_preg_id }}
                        </div>
                        <div class="form-group">
                            <strong>Usr Preg Nume:</strong>
                            {{ $usersPregunta->usr_preg_nume }}
                        </div>
                        <div class="form-group">
                            <strong>Usr Preg Text:</strong>
                            {{ $usersPregunta->usr_preg_text }}
                        </div>
                        <div class="form-group">
                            <strong>Usr Preg Desc:</strong>
                            {{ $usersPregunta->usr_preg_desc }}
                        </div>
                        <div class="form-group">
                            <strong>Usr Preg Esta:</strong>
                            {{ $usersPregunta->usr_preg_esta }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
