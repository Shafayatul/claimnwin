@extends('layouts.admin_layout')

@section('main_content')
@section('header-css')

    <!-- Include Editor style. -->
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
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
                            <input type="text" name="from_email"  id="from_email" class="form-control" placeholder="From Email" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                            <input type="text" name="to_email" id="to_email" value="{{$ticket->from_email}}" class="form-control" placeholder="To Email" readonly/>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="sub" id="airline_sub" class="form-control" placeholder="Subject" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea name="ticket_reply_note"  class="form-control ticket_textarea" rows="5" cols="50"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="file" name="ticket_reply_files[]" id="" class="form-control" multiple/>
                                <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                            </div>
                        </div>

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
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/js/froala_editor.pkgd.min.js"></script>
<script>
// $(function() {

// });

$(function() {
    $('.ticket_textarea').froalaEditor({
        heightMin: 200,
        heightMax: 800,
    });
});
</script>
@endsection
