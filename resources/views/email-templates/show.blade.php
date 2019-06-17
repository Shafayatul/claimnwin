@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>EmailTemplate {{ $emailtemplate->id }}</h4>
        </div>
        <div class="form-body">
            <div class="card">
                <div class="card-body">

          <a href="{{ url('/email-templates') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
          <a href="{{ url('/email-templates/' . $emailtemplate->id . '/edit') }}" title="Edit EmailTemplate"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
          {!! Form::open([
              'method'=>'DELETE',
              'url' => ['emailtemplates', $emailtemplate->id],
              'style' => 'display:inline'
          ]) !!}
              {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                      'type' => 'submit',
                      'class' => 'btn btn-danger btn-sm',
                      'title' => 'Delete EmailTemplate',
                      'onclick'=>'return confirm("Confirm delete?")'
              ))!!}
          {!! Form::close() !!}
          <br/>
          <br/>

          <div class="table-responsive">
              <table class="table table-borderless">
                  <tbody>
                      <tr>
                          <th>ID</th><td>{{ $emailtemplate->id }}</td>
                      </tr>
                      <tr><th> Id </th><td> {{ $emailtemplate->id }} </td></tr><tr><th> Title </th><td> {{ $emailtemplate->title }} </td></tr><tr><th> Content </th><td> {{ $emailtemplate->content }} </td></tr>
                  </tbody>
              </table>
          </div>

      </div>
  </div>
</div>
  </div>
</div>
@endsection




@extends('layouts.admin_layout')

@section('main_content')
  <div class="card">
      <div class="card-header"></div>
      <div class="card-body">



      </div>
  </div>
@endsection
