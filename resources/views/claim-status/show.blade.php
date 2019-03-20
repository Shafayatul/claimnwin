@extends('layouts.admin_layout')
@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>Claim Status</h4>
        </div>
        <div class="form-body">
            <div class="card">
                <div class="card-body">

          <a href="{{ url('/claim-status') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
          <a href="{{ url('/claim-status/' . $claimstatus->id . '/edit') }}" title="Edit ClaimStatus"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
          {!! Form::open([
              'method'=>'DELETE',
              'url' => ['claimstatus', $claimstatus->id],
              'style' => 'display:inline'
          ]) !!}
              {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                      'type' => 'submit',
                      'class' => 'btn btn-danger btn-sm',
                      'title' => 'Delete ClaimStatus',
                      'onclick'=>'return confirm("Confirm delete?")'
              ))!!}
          {!! Form::close() !!}
          <br/>
          <br/>

          <div class="table-responsive">
              <table class="table table-borderless">
                  <tbody>
                      <tr>
                          <th> Name </th>
                          <td> {{ $claimstatus->name }} </td>
                        </tr>
                        <tr>
                            <th> Description </th>
                            <td> {{ $claimstatus->description }} </td>
                        </tr>
                  </tbody>
              </table>
          </div>

      </div>
  </div>
</div>

</div>
</div>
@endsection
