<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">        
        <label class="" for="id">
                Usuario
            </label>
            <select name="id" id="id" class="form-control" data-placeholder="Usuario" required>
                @foreach($user as $item)
                @if($emprendimiento->id==$item['id'])
                <option value="{{$item['id']}}" selected>
                    {{$item['name']}}&nbsp;{{$item['apellido']}}</option>
                @else
                <option value="{{$item['id']}}">
                    {{$item['name']}}&nbsp;{{$item['apellido']}}</option>
                @endif
                @endforeach
            </select>
            {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
        </div>    

        <div class="form-group">
            {{ Form::label('Nombre Emprendimiento') }}
            {{ Form::text('empr_nomb', $emprendimiento->empr_nomb, ['class' => 'form-control' . ($errors->has('empr_nomb') ? ' is-invalid' : ''), 'placeholder' => 'puede usar un nombre posible luego podrá cambiarlo']) }}
            {!! $errors->first('empr_nomb', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label class="" for="empr_rubro">
                Rubro
            </label>
            <select name="empr_rubro" id="empr_rubro" class="form-control" data-placeholder="Rubro del emprendimiento" required>
                <option value="comercial" selected>Comercial</option>
                <option value="industrial">Industrial</option>
                <option value="online">Online</option>
            </select>
            {!! $errors->first('empr_rubro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label class="" for="empr_tipo">
                Tipo de emprendimiento
            </label>
            <select name="empr_tipo" id="empr_tipo" class="form-control" data-placeholder="Producto o Servicio" required>
                <option value="Producto" selected>Producto</option>
                <option value="Servicio">Servicio</option>
            </select>
            {!! $errors->first('empr_tipo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Estado') }}
            {{ Form::text('empr_esta', $emprendimiento->empr_esta, ['class' => 'form-control' . ($errors->has('empr_esta') ? ' is-invalid' : ''), 'placeholder' => 'Activo o inactivo']) }}
            {!! $errors->first('empr_esta', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>