@extends('layouts.admin_layout')
@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>Add {{ ucwords(str_replace('-',' ',$type)) }}</h4>
        </div>

        <div class="form-body">
                <div class="card">

                        <div class="card-body">


                            <!--<form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data" class="dropzone" id="dropzone">

                            </form> -->
                            {!! Form::open(['url' => '/posts', 'class' => 'form-horizontal', 'files' => true,'enctype'=>'multipart/form-data']) !!}

                            @include ('posts.form', ['formMode' => 'create'])

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
        </div>
@endsection
