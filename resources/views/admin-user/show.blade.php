@extends('layouts.admin_layout')

@section('main_content')
  <div class="card">
      <div class="card-header">admin-user {{ $admin-user->id }}</div>
      <div class="card-body">

          <a href="{{ url('/admin-user') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
          <a href="{{ url('/admin-user/' . $admin-user->id . '/edit') }}" title="Edit admin-user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
          {!! Form::open([
              'method'=>'DELETE',
              'url' => ['admin-user', $admin-user->id],
              'style' => 'display:inline'
          ]) !!}
              {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                      'type' => 'submit',
                      'class' => 'btn btn-danger btn-sm',
                      'title' => 'Delete admin-user',
                      'onclick'=>'return confirm("Confirm delete?")'
              ))!!}
          {!! Form::close() !!}
          <br/>
          <br/>

          <div class="table-responsive">
              <table class="table table-borderless">
                  <tbody>
                      <tr>
                          <th>ID</th><td>{{ $admin-user->id }}</td>
                      </tr>
                      <tr><th> Name </th><td> {{ $admin-user->name }} </td></tr><tr><th> Email </th><td> {{ $admin-user->email }} </td></tr><tr><th> Password </th><td> {{ $admin-user->password }} </td></tr>
                  </tbody>
              </table>
          </div>

      </div>
  </div>
@endsection
