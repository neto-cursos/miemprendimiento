@extends('admin.layouts.app')

@section('template_title')
    Emprendimiento
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
                        <li class="breadcrumb-item active">{{ __('Emprendimiento') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('emprendimientos.create') }}" class="btn btn-success">Agregar Nuevo</a>
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
                                        
										<th>Usuario</th>
										<th>Nombre</th>
										<th>Rubro</th>
										<th>Tipo</th>
										<th>Estado</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($emprendimientos as $emprendimiento)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $emprendimiento->name }}</td>
											<td>{{ $emprendimiento->empr_nomb }}</td>
											<td>{{ $emprendimiento->empr_rubro }}</td>
											<td>{{ $emprendimiento->empr_tipo }}</td>
											<td>{{ $emprendimiento->empr_esta }}</td>

                                            <td>
                                                <form action="{{ route('emprendimientos.destroy',$emprendimiento->empr_id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('emprendimientos.show',$emprendimiento->empr_id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('emprendimientos.edit',$emprendimiento->empr_id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $emprendimientos->links() !!}
            </div>
        </div>
     </div><!-- end-Wrapper -->

</div> <!-- container-fluid -->
@endsection
