@extends('admin.layouts.app')

@section('template_title')
    Financiamiento
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
                        <li class="breadcrumb-item active">{{ __('Financiamiento') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('financiamientos.create') }}" class="btn btn-success">Agregar Nuevo</a>
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
                                        
										<th>Fina Id</th>
										<th>Empr Id</th>
										<th>Fuen Fina Id</th>
										<th>Fina Activ</th>
										<th>Fina Cant</th>
										<th>Fina Unid</th>
										<th>Fina Mone</th>
										<th>Fina Mont</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($financiamientos as $financiamiento)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $financiamiento->fina_id }}</td>
											<td>{{ $financiamiento->empr_id }}</td>
											<td>{{ $financiamiento->fuen_fina_id }}</td>
											<td>{{ $financiamiento->fina_activ }}</td>
											<td>{{ $financiamiento->fina_cant }}</td>
											<td>{{ $financiamiento->fina_unid }}</td>
											<td>{{ $financiamiento->fina_mone }}</td>
											<td>{{ $financiamiento->fina_mont }}</td>

                                            <td>
                                                <form action="{{ route('financiamientos.destroy',$financiamiento->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('financiamientos.show',$financiamiento->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('financiamientos.edit',$financiamiento->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $financiamientos->links() !!}
            </div>
        </div>
     </div><!-- end-Wrapper -->

</div> <!-- container-fluid -->
@endsection
