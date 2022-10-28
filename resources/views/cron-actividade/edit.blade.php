@extends('admin.layouts.app')

@section('template_title')
    Update Cron Actividade
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

        @include('admin.layouts.messages.notifications')
                    @yield('notes')

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Cron Actividade</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cron-actividades.update', $cronActividade->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('cron-actividade.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

@endsection
