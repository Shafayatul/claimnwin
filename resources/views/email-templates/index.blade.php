@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>EmailTemplate</h4>
        </div>
        <div class="form-body">
            <div class="card">
                <div class="card-body">

          <br/>
          <br/>
          <div class="table-responsive">
              <table class="table table-borderless">
                  <thead>
                      <tr>
                          <th>#</th><th>Id</th><th>Title</th><th>Content</th><th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach($emailtemplates as $item)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $item->id }}</td><td>{{ $item->title }}</td><td>{!! $item->content !!}</td>
                          <td>
                              <a href="{{ url('/email-templates/' . $item->id) }}" title="View EmailTemplate"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                              <a href="{{ url('/email-templates/' . $item->id . '/edit') }}" title="Edit EmailTemplate"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                              {!! Form::open([
                                  'method'=>'DELETE',
                                  'url' => ['/email-templates', $item->id],
                                  'style' => 'display:inline'
                              ]) !!}
                                  {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                          'type' => 'submit',
                                          'class' => 'btn btn-danger btn-sm',
                                          'title' => 'Delete EmailTemplate',
                                          'onclick'=>'return confirm("Confirm delete?")'
                                  )) !!}
                              {!! Form::close() !!}
                          </td>
                      </tr>
                  @endforeach
                  </tbody>
              </table>
              <div class="pagination-wrapper"> {!! $emailtemplates->appends(['search' => Request::get('search')])->render() !!} </div>
          </div>


      </div>
  </div>
</div>
  </div>
</div>
@endsection