@extends('layouts.admin_layout')
@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>Edit {{ ucwords(str_replace('-',' ',$post->type)) }}</h4>
        </div>

        <div class="form-body">
                <div class="card">

                        <div class="card-body">
                            <a href="{{ url('/admin/posts/'.$post->type) }}" title="Back">
                                <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                            <br>
                            <br>

                            {{-- <label>Upload a Preview Image</label>
                            <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data" class="dropzone" id="dropzone">
                                @csrf
                            </form>   --}}
                            {!! Form::model($post, [
                                'method' => 'PATCH',
                                'url' => ['/posts', $post->id],
                                'class' => 'form-horizontal',
                                'files' => true
                            ]) !!}

                            @include ('posts.form-edit', ['formMode' => 'edit'])

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
        </div>
@endsection
