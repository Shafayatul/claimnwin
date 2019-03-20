<div class="grids widget-shadow">
<div class="row">
<div class="col-md-6 grid-box1">
<div class="form-group {{ $errors->has('labelName') ? 'has-error' : ''}}">
    {!! Form::label('labelName', 'Labelname', ['class' => 'control-label']) !!}
    {!! Form::text('labelName', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('labelName', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="col-md-6">
<div class="form-group {{ $errors->has('fieldKey') ? 'has-error' : ''}}">
    {!! Form::label('fieldKey', 'Fieldkey', ['class' => 'control-label']) !!}
    {!! Form::text('fieldKey', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('fieldKey', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>

<div class="row">
<div class="col-md-6 grid-box1">
<div class="form-group {{ $errors->has('fieldValue') ? 'has-error' : ''}}">
    {!! Form::label('fieldValue', 'Fieldvalue', ['class' => 'control-label']) !!}
    {!! Form::text('fieldValue', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('fieldValue', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="col-md-6">
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
    {!! Form::select('status', (['1'=>'Enabled','0'=>'Disabled']), null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>

<div class="row">
<div class="col-md-12 grid-box1">
<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>
</div>
