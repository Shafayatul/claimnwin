@extends('layouts.admin_layout')

@section('main_content')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>List of Airline</h4>
        </div>

        <div class="form-body">
            <div class="card">
                <div class="card-body">
                  {!! Form::open(['method' => 'GET', 'url' => '/airlines', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search']) !!}
                  <div class="row">
                    <div class="col-md-2">
                      <div class="input-group">
                          <input type="text" class="form-control" name="name" placeholder="Name" value="{{ request('search') }}">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="input-group">
                          <input type="text" class="form-control" name="email" placeholder="Email" value="{{ request('search') }}">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="input-group">
                          <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ request('search') }}">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="input-group">
                          <input type="text" class="form-control" name="iata_code" placeholder="Iata-Code" value="{{ request('search') }}">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="input-group">
                          <input type="text" class="form-control" name="country" placeholder="Country" value="{{ request('search') }}">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <span class="input-group-append">
                          <button class="btn btn-secondary" type="submit">
                              <i class="fa fa-search"></i>
                          </button>
                      </span>
                    </div>

                  </div>
                  {!! Form::close() !!}

                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($airlines as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user_id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <a href="{{ url('/airlines/' . $item->id) }}" title="View Airline"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href="{{ url('/airlines/' . $item->id . '/edit') }}" title="Edit Airline"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['/airlines', $item->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Delete Airline',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                        )) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $airlines->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
