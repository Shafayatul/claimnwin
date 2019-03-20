@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>List Of Settings</h4>
        </div>
        <div class="form-body">
            <div class="card">
                <div class="card-body">

          <a href="{{ url('/settings') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
          <a href="{{ url('/settings/' . $setting->id . '/edit') }}" title="Edit Setting"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
          {!! Form::open([
              'method'=>'DELETE',
              'url' => ['settings', $setting->id],
              'style' => 'display:inline'
          ]) !!}
              {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                      'type' => 'submit',
                      'class' => 'btn btn-danger btn-sm',
                      'title' => 'Delete Setting',
                      'onclick'=>'return confirm("Confirm delete?")'
              ))!!}
          {!! Form::close() !!}
          <br/>
          <br/>

          <div class="table-responsive">
              <table class="table table-borderless">
                  <tbody>
                    <tr>
                        <th> LabelName </th>
                        <td> {{ $setting->labelName }} </td>
                    </tr>
                    <tr>
                        <th> FieldKey </th>
                        <td> {{ $setting->fieldKey }} </td>
                    </tr>
                    <tr>
                        <th> FieldValue </th>
                        <td> {{ $setting->fieldValue }} </td>
                    </tr>
                    <tr>
                        <th> Status </th>
                        <td>
                            @if($setting->status == 1)
                            Enabled
                            @else
                            Disabled
                            @endif
                        </td>
                    </tr>
                  </tbody>
              </table>
          </div>

      </div>
  </div>
</div>

</div>
</div>
@endsection
