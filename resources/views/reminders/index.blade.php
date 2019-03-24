@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>List of Reminders</h4>
            </div>

            <div class="form-body">
  <div class="card">

      <div class="card-body">

          {!! Form::open(['method' => 'GET', 'url' => '/reminders', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                                        <div class="form-group mb-n">
                                        <div class="row">

                                            <div class="col-md-3 grid_box1">
                                            <label class="control-label">Claim Id</label>
                                            <input type="text" name="search" class="form-control1" value="{{ request('search') }}">
                                            </div>
                                            <div class="col-md-2 grid_box1">
                                                <label class="control-label">Reminder Status</label>
                                                <select name="search" id="" class="form-control">
                                                    <option value="Mark as done">Mark as done</option>
                                                    <option value="Dismiss">Dismiss</option>
                                                    <option value="Reschedule">Reschedule</option>
                                                    <option value="Reminders">Reminders</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 grid_box1">
                                                <label class="control-label">From Date</label>
                                                <input type="text" name="search" class="form-control1" value="{{ request('search') }}">
                                            </div>
                                            <div class="col-md-3 grid_box1">
                                                <label class="control-label">To Date</label>
                                                <input type="text" name="search" class="form-control1" value="{{ request('search') }}">
                                            </div>
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

                          <th>Claim Id</th>
                          <th>Claim Status</th>
                          <th>Call Reminder</th>
                          <th>Snooz</th>
                          <th>Status</th>
                          <th>Notes</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach($reminders as $item)
                      <tr>

                          <td>{{ $item->claim_id }}</td>
                          <td></td>
                          <td>{{ $item->callback_date.' '.$item->callback_time }}</td>
                          <td>{{ $item->snooz }}</td>
                          <td>{{ $item->status }}</td>
                          <td>{{ $item->note }}</td>
                          <td>
                          <a type="button" data-toggle="modal" class="btn btn-sm btn-primary" title="View Reminder" data-target="#reminder-model-{{$item->id}}"><i class="fa fa-eye" aria-hidden="true"></i> View</a>


                            {{--View modal --}}
                            <div id="reminder-model-{{$item->id}}" class="modal fade" role="dialog">
                                <?php
                                    $claim=DB::table('claims')
                                    ->join('passengers','claims.id','passengers.claim_id')
                                    ->join('itinerary_details','claims.id','itinerary_details.claim_id')
                                    ->where('claims.id',$item->id)
                                ->first();
                                $passengers = DB::table('passengers')->where('claim_id',$item->id)->get();
                                ?>
                                    <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <a href="#" class="btn btn-sm btn-success">Dismiss</a>
                                        <a href="#" class="btn btn-sm btn-success">Reschedule</a>
                                        <a href="#" class="btn btn-sm btn-success">Snooze</a>
                                        <a href="#" class="btn btn-sm btn-success">Mark as done</a>
                                        <a href="#" class="btn btn-sm btn-primary">View Claim</a>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                <p style="font-weight:bold;">DEPARTED FROM: <span style="font-weight:normal;">{{$claim->departed_from_id}}</span></p>
                                                        <p style="font-weight:bold;">FINAL DESTINATION: <span style="font-weight:normal;">{{$claim->final_destination_id}}</span></p>
                                                        <p style="font-weight:bold;">Did you have any connecting flights?: <span style="font-weight:normal;"></span></p>
                                                <p style="font-weight:bold;">What happened to the flight?:  <span style="font-weight:normal;">{{$claim->what_happened_to_the_flight}}</span></p>
                                                        <p style="font-weight:bold;">Date of missed connection:  <span style="font-weight:normal;"></span></p>
                                                        <p style="font-weight:bold;">Airline:  <span style="font-weight:normal;">{{$claim->airline}}</span></p>
                                                        <p style="font-weight:bold;">Flight no:  <span style="font-weight:normal;">{{$claim->flight_number}}</span></p>
                                                        <p style="font-weight:bold;">Departure date:  <span style="font-weight:normal;">{{$claim->departure_date}}</span></p>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <h4 style="font-weight:bold;">Passenger List</h4>
                                                                <table class="table table-borderless table-hover">
                                                                    <thead>
                                                                        <th style="font-weight:bold;">First Name</th>
                                                                        <th style="font-weight:bold;">Last Name</th>
                                                                        <th style="font-weight:bold;">Ticket No</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($passengers as $pass)
                                                                        <tr>
                                                                            <td>{{$pass->first_name}}</td>
                                                                            <td>{{$pass->last_name}}</td>
                                                                            <td></td>
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <h4 style="font-weight:bold;">Other Documents</h4>
                                                                <div class="list-group">
                                                                <a href="#" class="list-group-item">{{$claim->correspondence_others_file}}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p style="font-weight:bold;">Status:  <span style="font-weight:normal;"></span></p>
                                                        <hr>
                                                        <p style="font-weight:bold;">DEPARTURE COUNTRY: <span style="font-weight:normal;"></span></p>
                                                        <p style="font-weight:bold;">ARRIVAL COUNTRY: <span style="font-weight:normal;"></span></p>
                                                        <p style="font-weight:bold;">DEPARTURE CONTINENTS: <span style="font-weight:normal;"></span></p>
                                                        <p style="font-weight:bold;">ARRIVAL CONTINENTS: <span style="font-weight:normal;"></span></p>
                                                        <p style="font-weight:bold;">AIRLINE CONTINENTS: <span style="font-weight:normal;"></span></p>
                                                        <p style="font-weight:bold;">DISTANCE:  <span style="font-weight:normal;"></span></p>
                                                        <p style="font-weight:bold;">COMPENSATION AMOUNT:  <span style="font-weight:normal;"></span></p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                          <!--------------------End View Modal-------------------->




                            <a  type="button" data-toggle="modal" title="Edit Reminder" class="btn btn-sm btn-dark reminder-edit-view" data-target="#reminder-edit-model-{{$item->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                          <!--------------------Edit Modal-------------------->
                          <div id="reminder-edit-model-{{$item->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Set Reminder</h4>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{route('update-reminder')}}" method="post">
                                            {{ csrf_field() }}
                                       <div class="row">
                                           <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Reminder Date</label>
                                                <input type="date" name="callback_date" class="form-control" id="exampleInputEmail1" value="{{$item->callback_date}}"  placeholder="Enter email">
                                                    <input type="hidden" name="id" value="{{$item->id}}">
                                                </div>
                                           </div>

                                           <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Reminder Time</label>
                                                    <input type="time" name="callback_time" class="form-control" value="{{$item->callback_time}}" id="exampleInputEmail1"  placeholder="Enter email">
                                                </div>
                                           </div>

                                       </div>

                                       <div class="row">
                                            <div class="col-md-12">
                                                 <div class="form-group">
                                                     <label for="exampleInputEmail1" class="control-label">Note</label>
                                                 <textarea name="note" class="form-control" id="exampleInputEmail1" cols="30" rows="3">{{$item->note}}</textarea>
                                                 </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-success">Reminder</button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                    </div>

                                </div>
                                </div>
                          <!--------------------End Edit Modal----------------->
                              {!! Form::open([
                                  'method'=>'DELETE',
                                  'url' => ['/reminders', $item->id],
                                  'style' => 'display:inline'
                              ]) !!}
                                  {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                          'type' => 'submit',
                                          'class' => 'btn btn-danger btn-sm',
                                          'title' => 'Delete Reminder',
                                          'onclick'=>'return confirm("Confirm delete?")'
                                  )) !!}
                              {!! Form::close() !!}
                          </td>
                      </tr>
                  @endforeach
                  </tbody>
              </table>
              <div class="pagination-wrapper"> {!! $reminders->appends(['search' => Request::get('search')])->render() !!} </div>
          </div>

      </div>
  </div>
</div>
</div>
</div>


@endsection

{{-- @section('footer-script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        // $('#assign-user-model').modal({
        //    show:false,
        //    backdrop:'static'
        // });


        //  //now on button click
         var claim_id = "";
        $(document).on('click', '.reminder-view', function(){
            claim_id = $(this).attr('claim_id');
            $('#reminder-view-model').modal('show');
        });

        $(document).on('click', '.reminder-edit-view', function(){
            claim_id = $(this).attr('claim_id');
            $('#reminder-edit-model').modal('show');
        });



        // $(document).on('click', '#assign-role-submit', function(){
        //     var role = $('#role option:selected').val();
        //     $.ajax({
        //          type:'POST',
        //          url:'{{ url("/admin/assignRole") }}',
        //          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //          data:{
        //             'role' : role,
        //             'user_id' : user_id
        //          },
        //          success:function(data){
        //             if(data.msg=="Success"){
        //                 $('#assign-user-model').modal('hide');
        //                 var str = '["'+role+'"]';
        //                 $('#role_'+user_id).html(str);
        //                 location.reload('{{url("/admin/role")}}');
        //             }
        //          }
        //     });
        // });




    });
</script>

@endsection --}}
