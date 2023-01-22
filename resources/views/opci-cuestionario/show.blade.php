@extends('admin.layouts.app')

@section('template_title')
    {{ $opciCuestionario->name ?? 'Show Opci Cuestionario' }}
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
                        <li class="breadcrumb-item active">{{ __('Opci Cuestionario') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('opci-cuestionarios.index') }}" class="btn btn-success">Regresar</a>
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
                            <span class="card-title">Mostrar Opci Cuestionario</span>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Opci Cuest Id:</strong>
                            {{ $opciCuestionario->opci_cuest_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cuest Id:</strong>
                            {{ $opciCuestionario->cuest_id }}
                        </div>
                        <div class="form-group">
                            <strong>Modu Nume:</strong>
                            {{ $opciCuestionario->modu_nume }}
                        </div>
                        <div class="form-group">
                            <strong>Opci Cuest Type:</strong>
                            {{ $opciCuestionario->opci_cuest_type }}
                        </div>
                        <div class="form-group">
                            <strong>Opci Cuest Text:</strong>
                            {{ $opciCuestionario->opci_cuest_text }}
                        </div>
                        <div class="form-group">
                            <strong>Opci Cuest Desc:</strong>
                            {{ $opciCuestionario->opci_cuest_desc }}
                        </div>
                        <div class="form-group">
                            <strong>Opci Cuest Esta:</strong>
                            {{ $opciCuestionario->opci_cuest_esta }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
