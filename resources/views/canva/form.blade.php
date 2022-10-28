<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <label class="" for="empr_id">
                Emprendimiento
            </label>
            <select name="empr_id" id="empr_id" class="form-control" data-placeholder="emprendimiento" required>
                @foreach($emprendimiento as $item)
                @if($canva->empr_id==$item['empr_id'])
                <option value="{{$item['empr_id']}}" selected>
                    {{$item['empr_nomb']}}</option>
                @else
                <option value="{{$item['empr_id']}}">
                    {{$item['empr_nomb']}}</option>
                @endif
                @endforeach
            </select>
            {!! $errors->first('empr_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('canv_esta') }}
            {{ Form::text('canv_esta', $canva->canv_esta, ['class' => 'form-control' . ($errors->has('canv_esta') ? ' is-invalid' : ''), 'placeholder' => 'Canv Esta']) }}
            {!! $errors->first('canv_esta', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>