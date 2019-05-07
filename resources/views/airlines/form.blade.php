{{-- <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    {!! Form::label('user_id', 'User Id', ['class' => 'control-label']) !!}
    {!! Form::text('user_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div> --}}
<div class="grids widget-shadow">

<div class="row">
  <div class="col-md-6 grid_box1">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
        {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
        {!! Form::text('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 grid_box1">
    <div class="form-group {{ $errors->has('iata_code') ? 'has-error' : ''}}">
        {!! Form::label('iata_code', 'Iata Code', ['class' => 'control-label']) !!}
        {!! Form::text('iata_code', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('iata_code', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('icao_code') ? 'has-error' : ''}}">
        {!! Form::label('icao_code', 'Icao Code', ['class' => 'control-label']) !!}
        {!! Form::text('icao_code', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('icao_code', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 grid_box1">
    <div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
        {!! Form::label('country', 'Country', ['class' => 'control-label']) !!}
        {!! Form::select('country',$country, null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
        {!! Form::label('phone', 'Phone', ['class' => 'control-label']) !!}
        {!! Form::text('phone', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 grid_box1">
        <div class="form-group {{ $errors->has('alias') ? 'has-error' : ''}}">
            {!! Form::label('alias', 'Alias', ['class' => 'control-label']) !!}
            {!! Form::text('alias', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('alias', '<p class="help-block">:message</p>') !!}
        </div>
  </div>
  <div class="col-md-6">
        <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
            {!! Form::label('status', 'Active', ['class' => 'control-label']) !!}
                {{ Form::select('status', ['1'=> 'Enabled', '2'=> 'Disabled'], null, array('class'=>'form-control')) }}
            {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
        </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 grid_box1">
    <div class="form-group {{ $errors->has('address_line_1') ? 'has-error' : ''}}">
        {!! Form::label('address_line_1', 'Address Line 1', ['class' => 'control-label']) !!}
        {!! Form::text('address_line_1', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('address_line_1', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('address_line_2') ? 'has-error' : ''}}">
        {!! Form::label('address_line_2', 'Address Line 2', ['class' => 'control-label']) !!}
        {!! Form::text('address_line_2', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('address_line_2', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 grid_box1">
    <div class="form-group {{ $errors->has('address_line_3') ? 'has-error' : ''}}">
        {!! Form::label('address_line_3', 'Address Line 3', ['class' => 'control-label']) !!}
        {!! Form::text('address_line_3', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('address_line_3', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('address_line_4') ? 'has-error' : ''}}">
        {!! Form::label('address_line_4', 'Address Line 4', ['class' => 'control-label']) !!}
        {!! Form::text('address_line_4', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('address_line_4', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 grid_box1">
    <div class="form-group {{ $errors->has('online_form_link') ? 'has-error' : ''}}">
        {!! Form::label('online_form_link', 'Online Form Link', ['class' => 'control-label']) !!}
        {!! Form::text('online_form_link', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('online_form_link', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
    <div class="col-md-6">

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
