@extends('layouts.admin_layout')

@section('main_content')
  <div class="card">
      <div class="card-header">Faq {{ $faq->id }}</div>
      <div class="card-body">

          <a href="{{ url('/faqs') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
          <a href="{{ url('/faqs/' . $faq->id . '/edit') }}" title="Edit Faq"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
          {!! Form::open([
              'method'=>'DELETE',
              'url' => ['faqs', $faq->id],
              'style' => 'display:inline'
          ]) !!}
              {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                      'type' => 'submit',
                      'class' => 'btn btn-danger btn-sm',
                      'title' => 'Delete Faq',
                      'onclick'=>'return confirm("Confirm delete?")'
              ))!!}
          {!! Form::close() !!}
          <br/>
          <br/>

          <div class="table-responsive">
              <table class="table table-borderless">
                  <tbody>
                      <tr>
                          <th>ID</th><td>{{ $faq->id }}</td>
                      </tr>
                      <tr><th> Title </th><td> {{ $faq->title }} </td></tr><tr><th> Content </th><td> {{ $faq->content }} </td></tr>
                  </tbody>
              </table>
          </div>

      </div>
  </div>
@endsection
