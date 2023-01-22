@extends('admin.layouts.app')

@section('template_title')
    {{ $respCosto->name ?? 'Show Resp Costo' }}
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
                        <li class="breadcrumb-item active">{{ __('Resp Costo') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('resp-costos.index') }}" class="btn btn-success">Regresar</a>
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
                            <span class="card-title">Mostrar Resp Costo</span>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Resp Cost Id:</strong>
                            {{ $respCosto->resp_cost_id }}
                        </div>
                        <div class="form-group">
                            <strong>Canv Id:</strong>
                            {{ $respCosto->canv_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cost Id:</strong>
                            {{ $respCosto->cost_id }}
                        </div>
                        <div class="form-group">
                            <strong>Modu Nume:</strong>
                            {{ $respCosto->modu_nume }}
                        </div>
                        <div class="form-group">
                            <strong>Resp Cost Desc:</strong>
                            {{ $respCosto->resp_cost_desc }}
                        </div>
                        <div class="form-group">
                            <strong>Resp Cost Acti:</strong>
                            {{ $respCosto->resp_cost_acti }}
                        </div>
                        <div class="form-group">
                            <strong>Resp Cost Monto:</strong>
                            {{ $respCosto->resp_cost_monto }}
                        </div>
                        <div class="form-group">
                            <strong>Resp Cost Esta:</strong>
                            {{ $respCosto->resp_cost_esta }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
