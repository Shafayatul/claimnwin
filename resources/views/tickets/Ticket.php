@extends('layouts.admin_layout')

@section('main_content')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>Send New Email</h4>
        </div>

        <div class="form-body">
            <div class="card">
                <div class="card-body">
                    <a href="{{ url('/tickets') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br />
                    <br />

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {!! Form::open(['url' => '/send-email', 'class' => 'form-horizontal', 'files' => true]) !!}
                        @method('POST')
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="from_name" id="from_name" value="Claim'N Win" class="form-control" placeholder="From Name" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                            <input type="text" name="from_email"  id="from_email" value="info@claimnwin.com" class="form-control" placeholder="From Email" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                            <input type="text" name="to_email" id="to_email" class="form-control" placeholder="To Email" />
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="sub" class="form-control" placeholder="Subject" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <select id="select-template" class="form-control">
                                    <option value="0">Email template</option>
                                    @foreach($EmailTemplate as $key=>$val)
                                        <option value="{{$key}}">{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea name="description" id="description"  class="form-control tinymce-editor description" rows="5" cols="50">
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="file" name="new_email_files[]" id="" class="form-control" multiple/>
                            </div>
                        </div>

                        {{-- <div class="main-email-html-body" style="display: none;">

                            {!! $main_email !!}
                        </div> --}}

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-success">Send</button>
                            </div>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer-script')
<script>
$(function() {
    $('#select-template').change(function(){
        var current_option_value = $(this).val();
        if (current_option_value != 0) {
            $.ajax({
                type:'POST',
                url:'{{ url("/ajax/get-email-template") }}',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{
                'id'          : current_option_value
                },
                success:function(data){
                    var current_data = $('.description').val();
                    var newEmailBody = data + current_data;
                    tinyMCE.get('description').setContent(newEmailBody);

                }
            });
        }
    });

});
</script>
@endsection