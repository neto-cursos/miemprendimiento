@extends('admin.layouts.app')

@section('template_title')
    Resp Cuestionario
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
                        <li class="breadcrumb-item active">{{ __('Resp Cuestionario') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('resp-cuestionarios.create') }}" class="btn btn-success">Agregar Nuevo</a>
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
                                        
										<th>Resp Cuest Id</th>
										<th>Canv Id</th>
										<th>Cuest Id</th>
										<th>Opci Cuest Id</th>
										<th>Modu Nume</th>
										<th>Resp Cuest Desc</th>
										<th>Resp Cuest Text</th>
										<th>Resp Cuest Esta</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($respCuestionarios as $respCuestionario)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $respCuestionario->resp_cuest_id }}</td>
											<td>{{ $respCuestionario->canv_id }}</td>
											<td>{{ $respCuestionario->cuest_id }}</td>
											<td>{{ $respCuestionario->opci_cuest_id }}</td>
											<td>{{ $respCuestionario->modu_nume }}</td>
											<td>{{ $respCuestionario->resp_cuest_desc }}</td>
											<td>{{ $respCuestionario->resp_cuest_text }}</td>
											<td>{{ $respCuestionario->resp_cuest_esta }}</td>

                                            <td>
                                                <form action="{{ route('resp-cuestionarios.destroy',$respCuestionario->resp_cuest_id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('resp-cuestionarios.show',$respCuestionario->resp_cuest_id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('resp-cuestionarios.edit',$respCuestionario->resp_cuest_id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $respCuestionarios->links() !!}
            </div>
        </div>
     </div><!-- end-Wrapper -->

</div> <!-- container-fluid -->
@endsection
