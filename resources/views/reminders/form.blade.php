<div class="grids widget-shadow">
    <div class="row">
        <div class="col-md-6 grid-box1">
            <div class="form-group {{ $errors->has('claim_id') ? 'has-error' : ''}}">
                {!! Form::label('claim_id', 'Claim Id', ['class' => 'control-label']) !!}
                {!! Form::text('claim_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                {!! $errors->first('claim_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('callback_date') ? 'has-error' : ''}}">
                {!! Form::label('callback_date', 'Callback Date', ['class' => 'control-label']) !!}
                {!! Form::date('callback_date', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                {!! $errors->first('callback_date', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-box1">
            <div class="form-group {{ $errors->has('callback_time') ? 'has-error' : ''}}">
                {!! Form::label('callback_time', 'Callback Time', ['class' => 'control-label']) !!}
                {!! Form::text('callback_time', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                {!! $errors->first('callback_time', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('note') ? 'has-error' : ''}}">
                {!! Form::label('note', 'Note', ['class' => 'control-label']) !!}
                {!! Form::textarea('note', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-box1">
            <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
                {!! Form::text('status', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-6 grid-box1">
            <div class="form-group {{ $errors->has('snooze') ? 'has-error' : ''}}">
                {!! Form::label('snooze', 'Snooze', ['class' => 'control-label']) !!}
                {!! Form::text('snooze', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                {!! $errors->first('snooze', '<p class="help-block">:message</p>') !!}
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
