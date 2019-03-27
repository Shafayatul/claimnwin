@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>Assign User</h4>
        </div>

        <div class="form-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos" id="users-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $row)
                                        <tr>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->getRoleNames()}}</td>
                                        <td>
                                        <a href="#" class="btn btn-sm btn-primary">View Claims</a>
                                        <a href="{{url('/user-info/'.$row->id)}}" class="btn btn-sm btn-success">View/Edit</a>
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['/user-delete', $row->id],
                                            'style' => 'display:inline'
                                            ]) !!}
                                        {!! Form::button('<i class="fa fa-trash"></i>', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-sm',
                                            'title' => 'Delete User',
                                            'onclick'=>'return confirm("Confirm delete?")'
                                            )) !!}
                                            {!! Form::close() !!}
                                        <a title="Change Role" type="button" data-toggle="modal" user_id="{{$row->id}}" class="btn btn-sm btn-dark change-user-role"  data-target="#assign-user-model"><i class="fa fa-edit"></i></a>

                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Modal -->

            </div>
        </div>


{{-- modal --}}
<div id="assign-user-model" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Assign Specialist</h4>
            </div>
            <div class="modal-body">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                          <label for="role">Select list:</label>
                            <select class="form-control" id="role">
                                @foreach($roles as $role)
                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                          </div>
                          <br>
                          <button type="button" id="assign-role-submit" class="btn bg-cyan btn-block btn-lg waves-effect">Submit</button>
                      </div>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>

@endsection



@section('footer-script')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<script type="text/javascript">
    $(function(){
        // $('#assign-user-model').modal({
        //    show:false,
        //    backdrop:'static'
        // });


        //  //now on button click
         var user_id = "";
        $(document).on('click', '.change-user-role', function(){
            user_id = $(this).attr('user_id');
            $('#assign-user-model').modal('show');
        });



        $(document).on('click', '#assign-role-submit', function(){
            var role = $('#role option:selected').val();
            $.ajax({
                 type:'POST',
                 url:'{{ url("/admin/assignRole") }}',
                 headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                 data:{
                    'role' : role,
                    'user_id' : user_id
                 },
                 success:function(data){
                    if(data.msg=="Success"){
                        $('#assign-user-model').modal('hide');
                        var str = '["'+role+'"]';
                        $('#role_'+user_id).html(str);
                        location.reload('{{url("/admin/role")}}');
                    }
                 }
            });
        });




    });
</script>

@endsection