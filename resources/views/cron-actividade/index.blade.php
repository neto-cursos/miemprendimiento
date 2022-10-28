@extends('admin.layouts.app')

@section('template_title')
    Cron Actividade
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
                        <li class="breadcrumb-item active">{{ __('Cron Actividade') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('cron-actividades.create') }}" class="btn btn-success">Agregar Nuevo</a>
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
                                        
										<th>Cron Id</th>
										<th>Empr Id</th>
										<th>Cron Acti Padr</th>
										<th>Type</th>
										<th>Project</th>
										<th>Displayorder</th>
										<th>Name</th>
										<th>Start</th>
										<th>End</th>
										<th>Responsable</th>
										<th>Dependencies</th>
										<th>Cantidad</th>
										<th>Unidad</th>
										<th>Costounitario</th>
										<th>Monto</th>
										<th>Notas</th>
										<th>Progress</th>
										<th>Cron Done</th>
										<th>Estado</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cronActividades as $cronActividade)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $cronActividade->cron_id }}</td>
											<td>{{ $cronActividade->empr_id }}</td>
											<td>{{ $cronActividade->cron_acti_padr }}</td>
											<td>{{ $cronActividade->type }}</td>
											<td>{{ $cronActividade->project }}</td>
											<td>{{ $cronActividade->displayorder }}</td>
											<td>{{ $cronActividade->name }}</td>
											<td>{{ $cronActividade->start }}</td>
											<td>{{ $cronActividade->end }}</td>
											<td>{{ $cronActividade->responsable }}</td>
											<td>{{ $cronActividade->dependencies }}</td>
											<td>{{ $cronActividade->cantidad }}</td>
											<td>{{ $cronActividade->unidad }}</td>
											<td>{{ $cronActividade->costounitario }}</td>
											<td>{{ $cronActividade->monto }}</td>
											<td>{{ $cronActividade->notas }}</td>
											<td>{{ $cronActividade->progress }}</td>
											<td>{{ $cronActividade->cron_done }}</td>
											<td>{{ $cronActividade->estado }}</td>

                                            <td>
                                                <form action="{{ route('cron-actividades.destroy',$cronActividade->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('cron-actividades.show',$cronActividade->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('cron-actividades.edit',$cronActividade->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $cronActividades->links() !!}
            </div>
        </div>
     </div><!-- end-Wrapper -->

</div> <!-- container-fluid -->
@endsection
