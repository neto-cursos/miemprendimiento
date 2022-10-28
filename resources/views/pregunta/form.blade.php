<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <label class="" for="modu_id">
                Número de módulo
            </label>
            <select name="modu_id" id="modu_id" class="form-control" data-placeholder="Número de módulo" required>
                @foreach($modulo as $item)
                @if($pregunta->modu_id==$item['modu_id'])
                <option value="{{$item['modu_id']}}" selected>
                    {{$item['modu_nume']}}&nbsp;{{$item['modu_nomb']}} </option>
                @else
                <option value="{{$item['modu_id']}}">
                    {{$item['modu_nume']}}&nbsp;{{$item['modu_nomb']}}</option>
                @endif
                @endforeach
            </select>
            {!! $errors->first('modu_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Número de pregunta') }}
            {{ Form::text('preg_nume', $pregunta->preg_nume, ['class' => 'form-control' . ($errors->has('preg_nume') ? ' is-invalid' : ''), 'placeholder' => 'Número de pregunta']) }}
            {!! $errors->first('preg_nume', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Pregunta') }}
            {{ Form::text('preg_text', $pregunta->preg_text, ['class' => 'form-control' . ($errors->has('preg_text') ? ' is-invalid' : ''), 'placeholder' => 'Escriba la pregunta']) }}
            {!! $errors->first('preg_text', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripción') }}
            {{ Form::text('preg_desc', $pregunta->preg_desc, ['class' => 'form-control' . ($errors->has('preg_desc') ? ' is-invalid' : ''), 'placeholder' => 'Descripción de la pregunta']) }}
            {!! $errors->first('preg_desc', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>