<div class="grids widget-shadow">
<div class="row">
<div class="col-md-6 grid-box1">
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="col-md-6">
<div class="form-group {{ $errors->has('iata_code') ? 'has-error' : ''}}">
    {!! Form::label('iata_code', 'Iata Code', ['class' => 'control-label']) !!}
    {!! Form::text('iata_code', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('iata_code', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>

<div class="row">
<div class="col-md-6 grid-box1">
<div class="form-group {{ $errors->has('icao_code') ? 'has-error' : ''}}">
    {!! Form::label('icao_code', 'ICAO Code', ['class' => 'control-label']) !!}
    {!! Form::text('icao_code', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('icao_code', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="col-md-6">
<div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
    {!! Form::label('country', 'Country', ['class' => 'control-label']) !!}
    {!! Form::select('country',$country, null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>

<div class="row">
<div class="col-md-6 grid-box1">
<div class="form-group {{ $errors->has('municipality') ? 'has-error' : ''}}">
    {!! Form::label('municipality', 'Municipality', ['class' => 'control-label']) !!}
    {!! Form::text('municipality', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('municipality', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="col-md-6">
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    {!! Form::label('type', 'Type', ['class' => 'control-label']) !!}
    {!! Form::text('type', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>
<div class="row">
<div class="col-md-6 grid-box1">
<div class="form-group {{ $errors->has('latitude') ? 'has-error' : ''}}">
    {!! Form::label('latitude', 'Latitude', ['class' => 'control-label']) !!}
    {!! Form::text('latitude', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('latitude', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="col-md-6">
<div class="form-group {{ $errors->has('longitude') ? 'has-error' : ''}}">
    {!! Form::label('longitude', 'Longitude', ['class' => 'control-label']) !!}
    {!! Form::text('longitude', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('longitude', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>

<div class="row">
<div class="col-md-6 grid-box1">
<div class="form-group {{ $errors->has('home_link') ? 'has-error' : ''}}">
    {!! Form::label('home_link', 'Home Link', ['class' => 'control-label']) !!}
    {!! Form::text('home_link', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('home_link', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="col-md-6">
<div class="form-group {{ $errors->has('wikipedia_link') ? 'has-error' : ''}}">
    {!! Form::label('wikipedia_link', 'Wikipedia Link', ['class' => 'control-label']) !!}
    {!! Form::text('wikipedia_link', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('wikipedia_link', '<p class="help-block">:message</p>') !!}
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
