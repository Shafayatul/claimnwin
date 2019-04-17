@extends('layouts.admin_layout')
@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
        <h4>{{$post->title}}</h4>
        </div>

        <div class="form-body">
                <div class="card">
                        <div class="card-body">
                            <a href="{{ url('/admin/posts/'.$post->type) }}" title="Back">
                                <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                            <a href="{{ url('/posts/' . $post->id . '/edit') }}" title="Edit Post"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['posts', $post->id],
                                'style' => 'display:inline'
                            ]) !!}
                                {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Delete Post',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                ))!!}
                            {!! Form::close() !!}
                            <br/>
                            <br/>

                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th>ID</th><td>{{ $post->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Slug</th><td>{{ $post->slug }}</td>
                                        </tr>
                                        <tr>
                                            <th> Title </th>
                                            <td> {{ $post->title }} </td>
                                        </tr>

                                        <tr>
                                            <th>Image </th>
                                            <td> <img src="{{asset($post->image)}}" class="img-thumbnail img-responsive" alt="Econosurance"> </td>
                                        </tr>

                                        <tr>
                                            <th> Type </th>
                                            <td> {{ $post->type }} </td>
                                        </tr>
                                        <tr>
                                            <th> Body </th>
                                            <td> {!! $post->body !!} </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
        </div>
@endsection
