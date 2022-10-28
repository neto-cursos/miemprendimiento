@extends('admin.layouts.app')

@section('template_title')
    Actividadesclafe
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
                        <li class="breadcrumb-item active">{{ __('Actividadesclafe') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('actividadesclaves.create') }}" class="btn btn-success">Agregar Nuevo</a>
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
                                        
										<th>Acti Clav Id</th>
										<th>Cate Acti Id</th>
										<th>Empr Id</th>
										<th>Rubr Acti Id</th>
										<th>Acti Clav Desc</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($actividadesclaves as $actividadesclafe)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $actividadesclafe->acti_clav_id }}</td>
											<td>{{ $actividadesclafe->cate_acti_id }}</td>
											<td>{{ $actividadesclafe->empr_id }}</td>
											<td>{{ $actividadesclafe->rubr_acti_id }}</td>
											<td>{{ $actividadesclafe->acti_clav_desc }}</td>

                                            <td>
                                                <form action="{{ route('actividadesclaves.destroy',$actividadesclafe->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('actividadesclaves.show',$actividadesclafe->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('actividadesclaves.edit',$actividadesclafe->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $actividadesclaves->links() !!}
            </div>
        </div>
     </div><!-- end-Wrapper -->

</div> <!-- container-fluid -->
@endsection
