@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
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
                          <input type="text" class="form-control" name="name" placeholder="Name" value="{{ request('name') }}">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="input-group">
                          <input type="text" class="form-control" name="alias" placeholder="Alias" value="{{ request('alias') }}">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="input-group">
                          <input type="text" class="form-control" name="iata_code" placeholder="Iata-Code" value="{{ request('iata_code') }}">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="input-group">
                          <input type="text" class="form-control" name="icao_code" placeholder="ICAO-Code" value="{{ request('icao_code') }}">
                      </div>
                    </div>
                    
                    <div class="col-md-2">
                      <div class="input-group">
                          <input type="text" class="form-control" name="email" placeholder="Email" value="{{ request('email') }}">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="input-group">
                          <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ request('phone') }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2">
                      <div class="input-group">
                          <input type="text" class="form-control" name="country" placeholder="Country" value="{{ request('country') }}">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="input-group">
                        <select class="form-control" id="status" name="status">
                          <option value="1" @if(request('status')==1) selected="selected" @endif>Enabled</option>
                          <option value="0" @if(request('status')==0) selected="selected" @endif>Disabled</option>
                        </select>
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
                                    <th>Name</th>
                                    <th>Alias</th>
                                    <th>Iata Code</th>
                                    <th>Iata Code</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Country</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($airlines as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->alias }}</td>
                                    <td>{{ $item->iata_code }}</td>
                                    <td>{{ $item->icao_code }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->country }}</td>
                                    @if($item->status == 1)
                                    <td>Enabled</td>
                                    @else
                                    <td>Disabled</td>
                                    @endif
                                    <td>
                                        <a href="{{ url('/airlines/' . $item->id) }}" title="View Airline"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href="{{ url('/airlines/' . $item->id . '/edit') }}" title="Edit Airline"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['/airlines', $item->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
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
