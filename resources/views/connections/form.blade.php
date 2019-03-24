<div class="form-group {{ $errors->has('claim_id') ? 'has-error' : ''}}">
    {!! Form::label('claim_id', 'Claim Id', ['class' => 'control-label']) !!}
    {!! Form::text('claim_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('claim_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('airport_id') ? 'has-error' : ''}}">
    {!! Form::label('airport_id', 'Airport Id', ['class' => 'control-label']) !!}
    {!! Form::text('airport_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('airport_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
