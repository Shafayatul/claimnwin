@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>List of Claims</h4>
            </div>

            <div class="form-body">
                    <div class="card">
                            <div class="card-body">
                                <div class=" table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>

                                                <th>Date</th>
                                                <th>CLAIM ID</th>
                                                <th>Client</th>
                                                <th>Referred By</th>
                                                <th>Claim Amount</th>
                                                <th>Admin Commission</th>
                                                <th>Affiliate Commission</th>
                                                <th>Claim Status</th>
                                                {{-- <th>Pay Out</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($claims as $row)
                                            <tr>
                                           		<td>
                                           			{{ Carbon\Carbon::parse($row->created_at)->format('d-m-Y') }}
	                                           	</td>

                                            	<td>
                                            		<a href="{{url('/claim-view/'.$row->id)}}">{{$row->id}}</a>
	                                            </td>
                                                <td>
                                                    {{$user_all[$row->user_id]}}
                                                </td>

                                                <td>
                                                    {{$user_all[$row->affiliate_user_id]}}
                                                </td>
                                                 <td>
                                                    {{$row->amount}}
                                                </td>
                                                <td>
                                                    {{$row->admin_commision}}%
                                                </td>
                                                <td>
                                                    {{$row->affiliate_commision}}%
                                                </td>
                                                <td>
                                                    {{$claim_status[$row->claim_status_id]}}
                                                </td>
                                                {{-- <td>
                                                    --
                                                </td> --}}

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
	                                <div class="pagination-wrapper">{{$claims->links()}}</div>
                                </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
