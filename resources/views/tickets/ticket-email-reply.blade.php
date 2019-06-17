@extends('layouts.admin_layout')

@section('main_content')

@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>Ticket #{{$ticket->id}}</h4>
        </div>

        <div class="form-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('ticket-reply-data')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="from_name" id="from_name" value="Claimand Win" class="form-control" placeholder="From Name" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                            <input type="text" name="from_email"  id="from_email" value="{{$ticket->to_email}}" class="form-control" placeholder="From Email" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                            <input type="text" name="to_email" id="to_email" value="{{$ticket->from_email}}" class="form-control" placeholder="To Email" />
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="sub" id="airline_sub" class="form-control" placeholder="Subject" required/>
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
                                <textarea name="ticket_reply_note" id="ticket_reply_note"  class="form-control tinymce-editor" rows="5" cols="50">

                                    <div class="main-email-html-body">
                                    {!! $main_email !!}
                                    </div>
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="file" name="ticket_reply_files[]" id="" class="form-control" multiple/>
                                <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
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
                    </form>
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
                    var newEmailBody = data + $('.main-email-html-body').html();
                    console.log(newEmailBody);
                    $(".fr-view").html(newEmailBody);

                }
            });
        }
    });

});
</script>
@endsection
