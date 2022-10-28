<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre de Módulo') }}
            {{ Form::text('modu_nomb', $modulo->modu_nomb, ['class' => 'form-control' . ($errors->has('modu_nomb') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el nombre del módulo']) }}
            {!! $errors->first('modu_nomb', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
        <label class="" for="modu_nume">
                Número
            </label>
            
            <select name="modu_nume" id="modu_nume" class="form-control" data-placeholder="Número de módulo" required>
                @for ($i = 1; $i < 10; $i++)
                    @if ($modulo->modu_nume == $i)
                    
                    <option value="{{$i}}" selected>&nbsp; {{$i}} &nbsp;</option>
                    @else
                    <option value="{{$i}}">&nbsp; {{$i}} &nbsp;</option>
                    @endif
                @endfor
                
            </select>

            {!! $errors->first('modu_nume', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripción de Módulo') }}
            {{ Form::text('modu_desc', $modulo->modu_desc, ['class' => 'form-control' . ($errors->has('modu_desc') ? ' is-invalid' : ''), 'placeholder' => 'Descripción de módulo']) }}
            {!! $errors->first('modu_desc', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>