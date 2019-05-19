@extends('layouts.admin_layout')

@section('main_content')
@section('header-css')
<style>
.timeline {
    position: relative;
    padding: 21px 0px 10px;
    margin-top: 4px;
    margin-bottom: 30px;
}

.timeline .line {
    position: absolute;
    width: 4px;
    display: block;
    background: currentColor;
    top: 0px;
    bottom: 0px;
    margin-left: 30px;
}

.timeline .separator {
    border-top: 1px solid currentColor;
    padding: 5px;
    padding-left: 40px;
    font-style: italic;
    font-size: .9em;
    margin-left: 30px;
}

.timeline .line::before { top: -4px; }
.timeline .line::after { bottom: -4px; }
.timeline .line::before,
.timeline .line::after {
    content: '';
    position: absolute;
    left: -4px;
    width: 12px;
    height: 12px;
    display: block;
    border-radius: 50%;
    background: currentColor;
}

.timeline .panel {
    position: relative;
    margin: 10px 0px 21px 70px;
    clear: both;
}

.timeline .panel::before {
    position: absolute;
    display: block;
    top: 8px;
    left: -24px;
    content: '';
    width: 0px;
    height: 0px;
    border: inherit;
    border-width: 12px;
    border-top-color: transparent;
    border-bottom-color: transparent;
    border-left-color: transparent;
}

.timeline .panel .panel-heading.icon * { font-size: 20px; vertical-align: middle; line-height: 40px; }
.timeline .panel .panel-heading.icon {
    position: absolute;
    left: -59px;
    display: block;
    width: 40px;
    height: 40px;
    padding: 0px;
    border-radius: 50%;
    text-align: center;
    float: left;
}

.timeline .panel-outline {
    border-color: transparent;
    background: transparent;
    box-shadow: none;
}

.timeline .panel-outline .panel-body {
    padding: 10px 0px;
}

.timeline .panel-outline .panel-heading:not(.icon),
.timeline .panel-outline .panel-footer {
    display: none;
}
</style>
@endsection
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-body">
            <div class="card">
                <div class="card-body">


                    <div class="row">
                        <div class="col-md-12">
                             <!-- Timeline -->
                            <div class="timeline">

                                    <!-- Line component -->
                                    {{-- <div class="line text-muted"></div> --}}

                                    <!-- Separator -->
                                    {{-- <div class="separator text-muted">
                                        <time>26. 3. 2015</time>
                                    </div> --}}
                                    <!-- /Separator -->
                                    @foreach($ticket_notes as $row)
                                    <!-- Panel -->
                                    <article class="panel panel-primary">

                                        <!-- Icon -->
                                        <div class="panel-heading icon">
                                            <i class="fa fa-comment"></i>
                                        </div>
                                        <!-- /Icon -->

                                        <!-- Heading -->
                                        <div class="panel-heading">
                                            <h2 class="panel-title pull-left">{{-- Name --}}</h2>
                                        <h2 class="panel-title pull-right">{{Carbon\Carbon::parse($row->created_at)->format('d-m-Y')}} at {{Carbon\Carbon::parse($row->created_at)->format('H:i A')}}</h2>
                                        </div>
                                        <!-- /Heading -->

                                        <!-- Body -->
                                        <div class="panel-body">
                                            {!! $row->description !!}
                                        </div>
                                        <!-- /Body -->

                                        <!-- Footer -->
                                        <div class="panel-footer">
                                            <h2 class="panel-title pull-right" style="margin-top:-8px;">{{-- No File attachment --}}</h2>
                                        </div>
                                        <!-- /Footer -->

                                    </article>
                                    <!-- /Panel -->
                                    @endforeach

                                </div>
                                <!-- /Timeline -->

                            </div>
                        </div>
                        @if($ticket->status != 3)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-dark">
                                            <h4 style="color: white;">Respond</h4>
                                        </div>
                                        <div class="panel-body">
                                        <form action="{{route('ticket-description')}}" method="post" class="form-horizontal">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                                                        <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-lg btn-success">Responde Ticket</button>
                                                    <a href="{{URL::to('/close-ticket/'.$ticket->id)}}" onclick="return confirm('Are you sure close the ticket?');" class="btn btn-danger btn-sm pull-right">Close Ticket</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script>
$(function() {
    $('#description').froalaEditor()
});
</script> --}}
@endsection
