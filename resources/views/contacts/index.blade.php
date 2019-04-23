@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
  <div class="forms">
      {{-- <div class="card-header">Contacts</div> --}}
      <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>Contact Messages</h4>
        </div>
        <div class="form-body">
                <div class="card">

                    <div class="card-body">
          {{-- <a href="{{ url('/contacts/create') }}" class="btn btn-success btn-sm" title="Add New Contact">
              <i class="fa fa-plus" aria-hidden="true"></i> Add New
          </a> --}}

          {{-- {!! Form::open(['method' => 'GET', 'url' => '/contacts', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
          <div class="input-group">
              <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
              <span class="input-group-append">
                  <button class="btn btn-secondary" type="submit">
                      <i class="fa fa-search"></i>
                  </button>
              </span>
          </div>
          {!! Form::close() !!} --}}


          {!! Form::open(['method' => 'GET', 'url' => '/contacts', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
          <div class="form-group mb-n">
          <div class="row">

              <div class="col-md-10 grid_box1">
              <label class="control-label">Name</label>
              <input type="text" name="search" class="form-control1" value="{{ request('search') }}">
              </div>
              {{-- <div class="col-md-2 grid_box1">
                  <label class="control-label">Iata Code</label>
                  <input type="text" name="search" class="form-control1" value="{{ $request('search') }}">
              </div>
              <div class="col-md-2 grid_box1">
                  <label class="control-label">3 Digit Code</label>
                  <input type="text" name="search" class="form-control1" value="{{ $request('search') }}">
              </div>
              <div class="col-md-2 grid_box1">
                  <label class="control-label">Continents</label>
                  <input type="text" name="search" class="form-control1" value="{{ $request('search') }}">
              </div>
              <div class="col-md-2 grid_box1">
                  <label class="control-label">Country</label>
                  <input type="text" name="search" class="form-control1" value="{{ $request('search') }}">
              </div> --}}
              <div class="col-md-1">
                  <label class="control-label"></label>
                  <input type="submit" class="btn btn-success">
              </div>
              <div class="clearfix"> </div>
          </div>
      </div>

          {!! Form::close() !!}


          <br/>
          <br/>
          <div class="table-responsive">
              <table class="table table-borderless">
                  <thead>
                      <tr>
                          <th>#</th><th>Name</th><th>Email</th><th>Subject</th><th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach($contacts as $item)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $item->name }}</td><td>{{ $item->email }}</td><td>{{ $item->subject }}</td>
                          <td>
                              <a href="{{ url('/contacts/' . $item->id) }}" title="View Contact"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                              {{-- <a href="{{ url('/contacts/' . $item->id . '/edit') }}" title="Edit Contact"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a> --}}
                              {!! Form::open([
                                  'method'=>'DELETE',
                                  'url' => ['/contacts', $item->id],
                                  'style' => 'display:inline'
                              ]) !!}
                                  {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                          'type' => 'submit',
                                          'class' => 'btn btn-danger btn-sm',
                                          'title' => 'Delete Contact',
                                          'onclick'=>'return confirm("Confirm delete?")'
                                  )) !!}
                              {!! Form::close() !!}
                          </td>
                      </tr>
                  @endforeach
                  </tbody>
              </table>
              <div class="pagination-wrapper"> {!! $contacts->appends(['search' => Request::get('search')])->render() !!} </div>
          </div>
        </div>
    </div>
  </div>
      </div>
  </div>
@endsection
