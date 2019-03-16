<div class="grids widget-shadow">

    {{-- <div class="col-md-6">
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    {!! Form::label('user_id', 'User Id', ['class' => 'control-label']) !!}
    {!! Form::text('user_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
    </div> --}}
<div class="row">
<div class="col-md-6">
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="col-md-6">
<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
    {!! Form::label('code', 'Code', ['class' => 'control-label']) !!}
    {!! Form::text('code', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}">
    {!! Form::label('value', 'Value', ['class' => 'control-label']) !!}
    {!! Form::text('value', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="col-md-6">
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
    {!! Form::select('status', ['1'=> 'Enabled', '2'=> 'Disabled'], null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>

<div class="row">
    <div class="col-md-12">
<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>
</div>
