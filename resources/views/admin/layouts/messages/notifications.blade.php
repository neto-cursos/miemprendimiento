@section('notes')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

    </button>
    <strong>Exito!</strong> {{$message}}.
</div>

@endif
@isset($error)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

    </button>
    <strong>Error!</strong> {{$error}}.
</div>

@endisset
@if (\Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

    </button>
    <strong>Error!</strong> {!! \Session::get('error') !!}.
</div>
@endif
@if (count($errors) > 0)

<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

    </button>
    <ul style="list-style-type:none;">
        @foreach ($errors->all() as $error)
        <li><strong>{{ $error }}</strong></li>
        @endforeach
    </ul>

</div>

@endif
@endsection