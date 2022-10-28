@extends('admin.layouts.app')

@section('template_title')
    {{ $categoriasact->name ?? 'Show Categoriasact' }}
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
                        <li class="breadcrumb-item active">{{ __('Categoriasact') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('categoriasacts.index') }}" class="btn btn-success">Regresar</a>
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
                            <span class="card-title">Mostrar Categoriasact</span>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cate Acti Id:</strong>
                            {{ $categoriasact->cate_acti_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cate Acti Nomb:</strong>
                            {{ $categoriasact->cate_acti_nomb }}
                        </div>
                        <div class="form-group">
                            <strong>Cate Acti Desc:</strong>
                            {{ $categoriasact->cate_acti_desc }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
