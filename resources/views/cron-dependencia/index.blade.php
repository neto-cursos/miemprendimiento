@extends('admin.layouts.app')

@section('template_title')
    Cron Dependencia
@endsection

@section('content')
    
    <!--div class="container-fluid"-->
<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title">
                    <h4>Panel De Control</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Panel</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">{{ __('Cron Dependencia') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('cron-dependencias.create') }}" class="btn btn-success">Agregar Nuevo</a>
                </div>
            </div>
        </div>
    </div>
</div>

                    <!--div class="card-body"-->
                    <!--div class="card card-body mx-3 mx-md-4 mt-n6"-->
<div class="container-fluid">

    <div class="page-content-wrapper">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    
                    @include('admin.layouts.messages.notifications')
                    @yield('notes')


                    <div class="card-body">
                        
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Cron Dep Id</th>
										<th>Cron Dep Tareas</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cronDependencias as $cronDependencia)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $cronDependencia->cron_dep_id }}</td>
											<td>{{ $cronDependencia->cron_dep_tareas }}</td>

                                            <td>
                                                <form action="{{ route('cron-dependencias.destroy',$cronDependencia->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('cron-dependencias.show',$cronDependencia->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('cron-dependencias.edit',$cronDependencia->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                            <a type="submit" class="btn btn-danger btn-sm borrame" href="#" id="sa-warnings"><i class="fa fa-fw fa-trash"></i> Borrar</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        
                    </div>
                </div>
                {!! $cronDependencias->links() !!}
            </div>
        </div>
     </div><!-- end-Wrapper -->

</div> <!-- container-fluid -->
@endsection
