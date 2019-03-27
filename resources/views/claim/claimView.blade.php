@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        {{-- <div class="form-title">
            <h4>List of Claims</h4>
        </div> --}}
        <div class="form-body">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-2">
                            <div class="panel bg-dark ">
                                <div class="panel-heading cus_pan_heading">
                                    <p class="text-center">Claim Id</p>
                                <h5 class="text-center">{{$claim->id}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="panel" style="background-color: #4894a5;">
                                <div class="panel-heading cus_pan_heading">
                                    <p class="text-center">Passenger</p>
                                    <h5 class="text-center">{{$claim->first_name.' '.$claim->last_name}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="panel" style="background-color: #006057;">
                                <div class="panel-heading cus_pan_heading">
                                    <p class="text-center">Airline</p>
                                    <h5 class="text-center">{{$claim->name}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="panel" style="background-color: #d8a72b;">
                                <div class="panel-heading cus_pan_heading">
                                    <p class="text-center">Claim Status</p>
                                    <h5 class="text-center">Determination Started</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="panel panel-primary">
                                <div class="panel-heading cus_pan_heading">
                                    <p class="text-center">Claim With</p>
                                    <h5 class="text-center">AD</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="panel" style="background-color: #486f84;">
                                <div class="panel-heading cus_pan_heading">
                                    <p class="text-center">Claim Category</p>
                                <h5 class="text-center">{{$claim->claim_table_type}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-md-12 widget-shadow">
                                <ul id="myTabs" class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#claim_overview" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false"><i class="fa fa-bookmark" aria-hidden="true"></i> Claim Overview</a></li>
                                    <li role="presentation"><a href="#messaging" role="tab" id="messaging-tab" data-toggle="tab" aria-controls="messaging" aria-expanded="true"><i class="fa fa-envelope" aria-hidden="true"></i> Messaging</a></li>
                                    <li role="presentation"><a href="#airline_response" role="tab" id="airline_response-tab" data-toggle="tab" aria-controls="airline_response" aria-expanded="true"><i class="fa fa-info-circle" aria-hidden="true"></i> Airline Response</a></li>
                                    <li role="presentation"><a href="#customer_final_comm" role="tab" id="customer_final_comm-tab" data-toggle="tab" aria-controls="customer_final_comm" aria-expanded="true"><i class="fa fa-info-circle" aria-hidden="true"></i> Customer Final Comments</a></li>
                                    <li role="presentation"><a href="#reminder" role="tab" id="reminder-tab" data-toggle="tab" aria-controls="reminder" aria-expanded="true"><i class="fa fa-bell" aria-hidden="true"></i> Reminders</a></li>
                                    <li role="presentation"><a href="#required-details" role="tab" id="required-details-tab" data-toggle="tab" aria-controls="required-details" aria-expanded="true"><i class="fa fa-bell" aria-hidden="true"></i> Required Details</a></li>
                                    <li role="presentation"><a href="#claim-status" role="tab" id="claim-status-tab" data-toggle="tab" aria-controls="claim-status" aria-expanded="true"><i class="fa fa-bell" aria-hidden="true"></i> Status</a></li>

                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="claim_overview" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-2" style="margin-top: 5px;">
                                                <ul class="nav nav-tabs left_row" id="myTab" role="tablist">
                                                    <li class="nav-item active">
                                                        <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="home">Claim Overview</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#flight_detail" role="tab" aria-controls="profile">Flight Details</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#claim_detail" role="tab" aria-controls="messages">Claim Details</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#add_claim_files" role="tab" aria-controls="settings">Add Claim Files</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#view_claim_files" role="tab" aria-controls="settings">View Claim Files</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#claim_eligib" role="tab" aria-controls="settings">Claim Eligibility</a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="col-md-10" style="margin-top: 5px;">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="overview" role="tabpanel">
                                                        <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading">
                                                                           <i class="fa fa-comments"></i> Claims Overview
                                                                        </div>
                                                                        <!-- /.panel-heading -->
                                                                        <div class="panel-body">
                                                                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                                                                                <tbody>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Claim ID</th>
                                                                                    <td>{{$claim->id}}</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Passenger Representative</th>
                                                                                        <td>Claimnwins</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Passenger Full Name</th>
                                                                                        <td>{{$claim->first_name.' '.$claim->last_name}}</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Passenger Tel</th>
                                                                                        <td>.</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Passenger Email</th>
                                                                                        <td>{{$claim->email}}</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Passenger Address</th>
                                                                                        <td>{{$claim->address}}</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Claim Referance Number</th>
                                                                                    <td>{{$claim->booking_refernece}}</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Claim Create Date</th>
                                                                                    <td>{{Carbon\Carbon::parse($claim->created_at)->format('d-m-Y')}}</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Next Action Date</th>
                                                                                        <td>{{Carbon\Carbon::parse()->format('d-m-Y')}}</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Member Name</th>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Claim Status</th>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Claim With</th>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Claim Type</th>
                                                                                        <td>{{$claim->claim_table_type}}</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Legacy Case</th>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Claim Closed Date</th>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Claim Summary</th>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Claim Outcome</th>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <!-- /.panel-body -->
                                                                    </div>
                                                                    <!-- /.panel -->
                                                                </div>
                                                                <!-- /.col-lg-12 -->
                                                            </div>
                                                    </div>
                                                    <div class="tab-pane" id="flight_detail" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <i class="fa fa-comments"></i> Fligh Details
                                                                    </div>
                                                                    <!-- /.panel-heading -->
                                                                    <div class="panel-body">
                                                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                                                                            <tbody>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Claim ID</th>
                                                                                <td>{{$claim->id}}</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Date Of Disrupted</th>
                                                                                <td>{{$claim->departure_date}}</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Scheduled Date & Time Of Departure</th>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Airline</th>
                                                                                <td>{{$claim->name}}</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Number Of Flight Journey</th>
                                                                                <td>{{$flightCount}}</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Departure Airport</th>
                                                                                    <td>{{$departed->departed_name}}</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Destination Airport</th>
                                                                                    <td>{{$final_destination->destination_name}}</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Flight Number</th>
                                                                                <td>{{$claim->name.' '.$claim->flight_number}}</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Booking Ref</th>
                                                                                    <td>{{$claim->booking_refernece}}</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Scheduled Date & Time Of Departure</th>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Actual Date & Time Of Arrival</th>
                                                                                    <td></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <!-- /.panel-body -->
                                                                </div>
                                                                <!-- /.panel -->
                                                            </div>
                                                            <!-- /.col-lg-12 -->
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="claim_detail" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <i class="fa fa-comments"></i> Claim Details
                                                                    </div>
                                                                    <!-- /.panel-heading -->
                                                                    <div class="panel-body">
                                                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                                                                            <tbody>
                                                                                <tr class="odd gradeX">
                                                                                    <th>What reason was given for the delay</th>
                                                                                <td>{{$claim->reason}}</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Do you dispute the reason</th>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Refreshments</th>
                                                                                <td>{{$claim->is_obtain_full_reimbursement}}</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Telephone Call</th>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>If delayed overnight - Hotel accomodation</th>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>If applicable - transport between the airport and hote</th>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Did you incur any such expenditure</th>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Have you received any compensation (money/vouchers) already?</th>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Number of passengers:</th>
                                                                                <td>{{$passCount}}</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Passengers Name</th>
                                                                                <td>{{$claim->first_name.' '.$claim->last_name}}</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <!-- /.panel-body -->
                                                                </div>
                                                                <!-- /.panel -->
                                                            </div>
                                                            <!-- /.col-lg-12 -->
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="add_claim_files" role="tabpanel">
                                                        <p>
                                                            Your file submission allowance has now passed and you are no longer able to upload any more files to your case.
                                                            We will now request the Defence from the airline.
                                                        </p>
                                                    </div>
                                                    <div class="tab-pane" id="view_claim_files" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <p>
                                                                    You have successfully uploaded your files.On this screen you can organise your files to enable other parties to understand the significance of the file to the case.
                                                                    Please give the file description and a time line date to show the chronological ordering of your files.
                                                                </p>
                                                                <button>Save Changes</button>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">

                                                                        <div class="panel panel-default">
                                                                            <!-- /.panel-heading -->
                                                                            <div class="panel-body">
                                                                            <a href="{{URL::to('/letter-before-action/'.$claim->id)}}" class="btn btn-success btn-sm">Download Pdf</a>
                                                                                <div class="table-responsive">


                                                                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>File Name</th>
                                                                                            <th>Upload Date</th>
                                                                                            <th>Description</th>
                                                                                            <th>File Type</th>
                                                                                            <th>File Category</th>
                                                                                            <th>Uploaded By</th>
                                                                                            <th>Time line date</th>
                                                                                            <th>Delete</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td><input type="text" name="" id="" placeholder="Filter"></td>
                                                                                            <td><input type="text" name="" id="" placeholder="Filter"></td>
                                                                                            <td><input type="text" name="" id="" placeholder="Filter"></td>
                                                                                            <td><input type="text" name="" id="" placeholder="Filter"></td>
                                                                                            <td>
                                                                                                <select name="" id="" class="form-control">
                                                                                                    <option value="">All</option>
                                                                                                    <option value="">Lugguage-lost</option>
                                                                                                    <option value="">Lugguage-damaged</option>
                                                                                                    <option value="">Fight delay</option>
                                                                                                </select>
                                                                                            </td>
                                                                                            <td>
                                                                                                <select name="" id="" class="form-control">
                                                                                                    <option value="">All</option>
                                                                                                    <option value="">Passenger</option>
                                                                                                    <option value="">Initial Assessment</option>
                                                                                                </select>
                                                                                            </td>
                                                                                            <td><input type="text" name="" id="" placeholder="Filter"></td>
                                                                                            <td></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>claim_file_jsagdhsagjd</td>
                                                                                            <td>14-03-2019</td>
                                                                                            <td><input type="text" name="" id=""></td>
                                                                                            <td>pdf</td>
                                                                                            <td>
                                                                                                <select name="" id="" class="form-control">
                                                                                                    <option value="">All</option>
                                                                                                    <option value="">Lugguage-lost</option>
                                                                                                    <option value="">Lugguage-damaged</option>
                                                                                                    <option value="">Fight delay</option>
                                                                                                </select>
                                                                                            </td>
                                                                                            <td>Passenger</td>
                                                                                            <td>05/03/2019</td>
                                                                                            <td>
                                                                                                <input type="checkbox" name="" id="">
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                            <!-- /.panel-body -->
                                                                        </div>
                                                                        <!-- /.panel -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="claim_eligib" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <i class="fa fa-comments"></i> Claim Eligibility
                                                                    </div>
                                                                    <!-- /.panel-heading -->
                                                                    <div class="panel-body">
                                                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                                                                            <tbody>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Claim ID</th>
                                                                                <td>{{$claim->id}}</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Have you complained direct to the airline writing?</th>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Has the airline provided their final response?</th>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>What date did you complain to the airline?</th>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Did they reject your complain?</th>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Have you reject the final response?</th>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Airline response</th>
                                                                                    <td></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <!-- /.panel-body -->
                                                                </div>
                                                                <!-- /.panel -->
                                                            </div>
                                                            <!-- /.col-lg-12 -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane" id="messaging" aria-labelledby="messaging-tab">
                                        <div class="row">

                                            <div class="col-md-2" style="margin-top: 10px;">
                                                <h4 class="compose bg-primary">Compose</h4>
                                                <ul class="nav nav-tabs left_row" id="myTab" role="tablist">
                                                    <li class="nav-item active">
                                                        <a class="nav-link active" data-toggle="tab" href="#conversation" role="tab" aria-controls="conversation">Coversation</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#inbox" role="tab" aria-controls="inbox">Inbox</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#sent" role="tab" aria-controls="settings">Sent</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#case_history" role="tab" aria-controls="settings">Case History</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#note_phone" role="tab" aria-controls="settings">Notes & Phone Call</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-10" style="margin-top: 10px;">
                                                <div class="tab-content">
                                                <!-------------------Conversation----------------------->
                                                <div class="tab-pane active" id="conversation" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="panel panel-default">
                                                                {{-- <div class="panel-heading">
                                                                    <i class="fa fa-comments"></i> Conversation
                                                                </div> --}}
                                                                <!-- /.panel-heading -->
                                                                <div class="panel-body">
                                                                    <table width="100%" class="table table-striped table-borderless" id="dataTables-example">
                                                                        <thead>
                                                                            <th>From</th>
                                                                            <th>Subject</th>
                                                                            <th>Message</th>
                                                                            <th>Date</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="width: 330px;">Pre Investigation</td>
                                                                                <td style="width: 330px;">2 to 3(NP)</td>
                                                                                <td style="width: 200px; overflow:hidden; word-break:break-all;">
                                                                                    kjshjkdfshjkhfdkjhbdkjgjkghtfduighfduygfdsjgdfjhudfgjdsfgjhufgjdfsghujgjhgsjhgjhgdf.
                                                                                </td>
                                                                                <td>23/03/2019</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <!-- /.panel-body -->
                                                            </div>
                                                            <!-- /.panel -->
                                                        </div>
                                                        <!-- /.col-lg-12 -->
                                                    </div>
                                                </div>
                                                <!---------------------End Conversation------------------->
                                                <!---------------------Inbox------------------------------>
                                                <div class="tab-pane" id="inbox" role="tabpanel">

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <i class="fa fa-comments"></i> Inbox
                                                                </div>
                                                                <!-- /.panel-heading -->
                                                                <div class="panel-body">
                                                                    <table width="100%" class="table table-striped table-borderless" id="dataTables-example">
                                                                        <thead>
                                                                            <th>From</th>
                                                                            <th>(Role) Message Subject</th>
                                                                            <th>Received</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><input type="checkbox" name="" id=""> Dipto Shome</td>
                                                                                <td>2 to 3(NP)</td>
                                                                                <td>23/03/2019</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <!-- /.panel-body -->
                                                            </div>
                                                            <!-- /.panel -->
                                                        </div>
                                                        <!-- /.col-lg-12 -->
                                                    </div>
                                                </div>
                                            <!---------------------End Inbox------------------------------>
                                            <!---------------------Sent------------------------------>
                                            <div class="tab-pane" id="sent" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <i class="fa fa-comments"></i> Sent
                                                            </div>
                                                                <!-- /.panel-heading -->
                                                            <div class="panel-body">
                                                                <table width="100%" class="table table-striped table-borderless" id="dataTables-example">
                                                                    <thead>
                                                                        <th>To</th>
                                                                        <th>(Role) Message Subject</th>
                                                                        <th>Received</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input type="checkbox" name="" id=""> Dipto Shome</td>
                                                                            <td>2 to 3(NP)</td>
                                                                            <td>23/03/2019</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                                    <!-- /.panel-body -->
                                                        </div>
                                                                <!-- /.panel -->
                                                    </div>
                                                            <!-- /.col-lg-12 -->
                                                </div>
                                            </div>
                                            <!------------------------------End Sent------------------------->
                                            <!---------------------Case History------------------------------>
                                            <div class="tab-pane" id="case_history" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <i class="fa fa-comments"></i> Case History
                                                            </div>
                                                                <!-- /.panel-heading -->
                                                            <div class="panel-body">

                                                            </div>
                                                                    <!-- /.panel-body -->
                                                        </div>
                                                                <!-- /.panel -->
                                                    </div>
                                                            <!-- /.col-lg-12 -->
                                                </div>

                                            </div>
                                            <!------------------------------End Case History------------------------->
                                            <!---------------------Note & Phone Call------------------------------>
                                            <div class="tab-pane" id="note_phone" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                            <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <i class="fa fa-comments"></i> Note & Phone Call
                                                            </div>
                                                                    <!-- /.panel-heading -->
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                    <form action="{{route('save-note')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                                            {{ csrf_field() }}

                                                                            <div class="form-group">
                                                                                <label for="note" class="control-label col-md-3">Note:</label>
                                                                                <div class="col-md-9">
                                                                                    <textarea name="note" id="note" rows="3" class="form-control" required></textarea>
                                                                                <input type="hidden" name="claim_id" value="100276">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="note" class="control-label col-md-3">Select Note Source/Ref.:</label>
                                                                                <div class="col-md-9">
                                                                                <select name="note_status" id="note_status" class="form-control">
                                                                                    <option value="1">Emails From Airline</option>
                                                                                    <option value="2">Emails From Passenger</option>
                                                                                    <option value="3">Phone Calls</option>
                                                                                </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="note" class="control-label col-md-3">Airline Referance:</label>
                                                                                <div class="col-md-9">
                                                                                <input type="text" name="airline_ref" class="form-control" placeholder="Airline Referance">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <div class="col-md-6 col-md-offset-3">
                                                                                    <button type="submit" class="btn btn-primary btn-sm"> Create Note</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-12">

                                                                            <ul class="timeline">
                                                                                <li class="time-label"> <span class="bg-red"> 23 Mar 19 </span> </li>
                                                                                <li> <i class="fa  fa-angle-double-right bg-blue"></i>
                                                                                <div class="timeline-item"> <span class="time"><i class="fa fa-clock-o"></i> 08:25:55 am</span>
                                                                                    <h3 class="timeline-header"><a href="#">Admin</a> created a note via <span class="label label-success">Emails From Airline</span></h3>
                                                                                    <div class="timeline-body"><p><br></p>				   				   </div>
                                                                                </div>
                                                                                </li>

                                                                                <li class="time-label"><span class="bg-red"> 28 Jan 19 </span> </li>
                                                                                <li> <i class="fa  fa-angle-double-right bg-blue"></i>
                                                                                <div class="timeline-item"> <span class="time"><i class="fa fa-clock-o"></i> 11:17:51 am</span>
                                                                                    <h3 class="timeline-header"><a href="#">Admin</a> created a note via <span class="label label-success">Emails From Airline</span></h3>
                                                                                    <div class="timeline-body"><p><br></p></div>
                                                                                </div>
                                                                                </li>
                                                                            </ul>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                                    <!-- /.panel-body -->
                                                        </div>
                                                                <!-- /.panel -->
                                                    </div>
                                                    <!-- /.col-lg-12 -->
                                                </div>

                                            </div>
                                            <!------------------------------End Note & Phone Call------------------------->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div role="tabpanel" class="tab-pane" id="airline_response" aria-labelledby="airline_response-tab">

                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="customer_final_comm" aria-labelledby="customer_final_comm-tab">

                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="reminder" aria-labelledby="reminder-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <br>
                                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal">Reminder</button>
                                                    <div id="myModal" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Set Reminder</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="{{route('reminder-create')}}" method="post">
                                                                {{ csrf_field() }}
                                                           <div class="row">
                                                               <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Reminder Date</label>
                                                                        <input type="date" name="callback_date" class="form-control" id="exampleInputEmail1"  placeholder="Enter email">
                                                                        <input type="hidden" name="claim_id" value="100276">
                                                                    </div>
                                                               </div>

                                                               <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Reminder Time</label>
                                                                        <input type="time" name="callback_time" class="form-control" id="exampleInputEmail1"  placeholder="Enter email">
                                                                    </div>
                                                               </div>

                                                           </div>

                                                           <div class="row">
                                                                <div class="col-md-12">
                                                                     <div class="form-group">
                                                                         <label for="exampleInputEmail1" class="control-label">Note</label>
                                                                         <textarea name="note" class="form-control" id="exampleInputEmail1" cols="30" rows="3"></textarea>
                                                                     </div>
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <button type="submit" class="btn btn-success">Reminder</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        </div>
                                                        <div class="modal-footer">

                                                        </div>
                                                        </div>

                                                    </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-hover ">
                                                            <thead>
                                                                <th>CLAIM ID</th>
                                                                <th>CLAIM STATUS</th>
                                                                <th>CALL REMINDER</th>
                                                                <th>SNOOZE</th>
                                                                <th>STATUS</th>
                                                                <th>NOTES</th>
                                                                <th>Action</th>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($reminders as $item)
                                                                <tr>
                                                                    <td>{{$item->claim_id}}</td>
                                                                    <td>claim document sent</td>
                                                                    <td>{{$item->callback_date.' '.$item->callback_time}}</td>
                                                                    <td>{{$item->snooze}}</td>
                                                                    <td>{{$item->status}}</td>
                                                                    <td>{{$item->note}}</td>
                                                                    <td>
                                                                        <a type="button" data-toggle="modal" class="btn btn-sm btn-primary" title="View Reminder" data-target="#reminder-model-{{$item->id}}"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                                                        {{--View modal --}}
                                                                        <div id="reminder-model-{{$item->id}}" class="modal fade" role="dialog">
                                                                                <?php
                                                                                    $claim=DB::table('claims')
                                                                                    ->join('passengers','claims.id','passengers.claim_id')
                                                                                    ->join('itinerary_details','claims.id','itinerary_details.claim_id')
                                                                                    ->where('claims.id',$item->id)
                                                                                ->first();
                                                                                $passengers = DB::table('passengers')->where('claim_id',$item->id)->get();
                                                                                ?>
                                                                                    <div class="modal-dialog">

                                                                                    <!-- Modal content-->
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                        <a href="#" class="btn btn-sm btn-success">Dismiss</a>
                                                                                        <a href="#" class="btn btn-sm btn-success">Reschedule</a>
                                                                                        <a href="#" class="btn btn-sm btn-success">Snooze</a>
                                                                                        <a href="#" class="btn btn-sm btn-success">Mark as done</a>
                                                                                        <a href="#" class="btn btn-sm btn-primary">View Claim</a>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                <p style="font-weight:bold;">DEPARTED FROM: <span style="font-weight:normal;">{{$claim->departed_from_id}}</span></p>
                                                                                                        <p style="font-weight:bold;">FINAL DESTINATION: <span style="font-weight:normal;">{{$claim->final_destination_id}}</span></p>
                                                                                                        <p style="font-weight:bold;">Did you have any connecting flights?: <span style="font-weight:normal;"></span></p>
                                                                                                <p style="font-weight:bold;">What happened to the flight?:  <span style="font-weight:normal;">{{$claim->what_happened_to_the_flight}}</span></p>
                                                                                                        <p style="font-weight:bold;">Date of missed connection:  <span style="font-weight:normal;"></span></p>
                                                                                                        <p style="font-weight:bold;">Airline:  <span style="font-weight:normal;">{{$claim->airline}}</span></p>
                                                                                                        <p style="font-weight:bold;">Flight no:  <span style="font-weight:normal;">{{$claim->flight_number}}</span></p>
                                                                                                        <p style="font-weight:bold;">Departure date:  <span style="font-weight:normal;">{{$claim->departure_date}}</span></p>
                                                                                                        <hr>
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-8">
                                                                                                                <h4 style="font-weight:bold;">Passenger List</h4>
                                                                                                                <table class="table table-borderless table-hover">
                                                                                                                    <thead>
                                                                                                                        <th style="font-weight:bold;">First Name</th>
                                                                                                                        <th style="font-weight:bold;">Last Name</th>
                                                                                                                        <th style="font-weight:bold;">Ticket No</th>
                                                                                                                    </thead>
                                                                                                                    <tbody>
                                                                                                                        @foreach($passengers as $pass)
                                                                                                                        <tr>
                                                                                                                            <td>{{$pass->first_name}}</td>
                                                                                                                            <td>{{$pass->last_name}}</td>
                                                                                                                            <td></td>
                                                                                                                        </tr>
                                                                                                                        @endforeach
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </div>
                                                                                                            <div class="col-md-4">
                                                                                                                <h4 style="font-weight:bold;">Other Documents</h4>
                                                                                                                <div class="list-group">
                                                                                                                <a href="#" class="list-group-item">{{$claim->correspondence_others_file}}</a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <p style="font-weight:bold;">Status:  <span style="font-weight:normal;"></span></p>
                                                                                                        <hr>
                                                                                                        <p style="font-weight:bold;">DEPARTURE COUNTRY: <span style="font-weight:normal;"></span></p>
                                                                                                        <p style="font-weight:bold;">ARRIVAL COUNTRY: <span style="font-weight:normal;"></span></p>
                                                                                                        <p style="font-weight:bold;">DEPARTURE CONTINENTS: <span style="font-weight:normal;"></span></p>
                                                                                                        <p style="font-weight:bold;">ARRIVAL CONTINENTS: <span style="font-weight:normal;"></span></p>
                                                                                                        <p style="font-weight:bold;">AIRLINE CONTINENTS: <span style="font-weight:normal;"></span></p>
                                                                                                        <p style="font-weight:bold;">DISTANCE:  <span style="font-weight:normal;"></span></p>
                                                                                                        <p style="font-weight:bold;">COMPENSATION AMOUNT:  <span style="font-weight:normal;"></span></p>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                        </div>
                                                                                    </div>

                                                                                    </div>
                                                                                </div>
                                                                        <!--------------------End View Modal-------------------->
                                                                        <a  type="button" data-toggle="modal" title="Edit Reminder" class="btn btn-sm btn-dark reminder-edit-view" data-target="#reminder-edit-model-{{$item->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                                                                <!--------------------Edit Modal-------------------->
                                                                                <div id="reminder-edit-model-{{$item->id}}" class="modal fade" role="dialog">
                                                                                        <div class="modal-dialog">

                                                                                            <!-- Modal content-->
                                                                                            <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                <h4 class="modal-title">Set Reminder</h4>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                            <form action="{{route('update-reminder')}}" method="post">
                                                                                                    {{ csrf_field() }}
                                                                                            <div class="row">
                                                                                                <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label for="exampleInputEmail1">Reminder Date</label>
                                                                                                        <input type="date" name="callback_date" class="form-control" id="exampleInputEmail1" value="{{$item->callback_date}}"  placeholder="Enter email">
                                                                                                            <input type="hidden" name="id" value="{{$item->id}}">
                                                                                                        </div>
                                                                                                </div>

                                                                                                <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label for="exampleInputEmail1">Reminder Time</label>
                                                                                                            <input type="time" name="callback_time" class="form-control" value="{{$item->callback_time}}" id="exampleInputEmail1"  placeholder="Enter email">
                                                                                                        </div>
                                                                                                </div>

                                                                                            </div>

                                                                                            <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="form-group">
                                                                                                            <label for="exampleInputEmail1" class="control-label">Note</label>
                                                                                                        <textarea name="note" class="form-control" id="exampleInputEmail1" cols="30" rows="3">{{$item->note}}</textarea>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>

                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <button type="submit" class="btn btn-success">Reminder</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </form>
                                                                                            </div>
                                                                                            <div class="modal-footer">

                                                                                            </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        </div>
                                                                                <!--------------------End Edit Modal----------------->




                                                                                {!! Form::open([
                                                                                    'method'=>'DELETE',
                                                                                    'url' => ['/reminders-delete/', $item->id],
                                                                                    'style' => 'display:inline'
                                                                                ]) !!}
                                                                                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                                                                            'type' => 'submit',
                                                                                            'class' => 'btn btn-danger btn-sm',
                                                                                            'title' => 'Delete Reminder',
                                                                                            'onclick'=>'return confirm("Confirm delete?")'
                                                                                    )) !!}
                                                                                {!! Form::close() !!}                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>


                                    <div role="tabpanel" class="tab-pane" id="required-details" aria-labelledby="required-details-tab">

                                            <form action="#" method="post">
                                                <div class="row" style="margin-top:1%;">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label> Bank Details </label>
                                                        <select class="form-control" id="status">
                                                            <option value="">Select Status</option>
                                                            @foreach($banks as $bank)
                                                            <option value="{{$bank->id}}">{{$bank->account_name.' '.'('.$bank->title.')'}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label> Affiliate Commision </label>
                                                        <input type="text" class="form-control" name="" id="">
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label> Admin Commision </label>
                                                        <input type="text" class="form-control" name="" id="">
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>

                                            <div class="row" style="margin-top:1%;">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label> Additional Details For LBA </label>
                                                        <textarea name="" class="form-control" id="" cols="30" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label> Expected Compensation Amount </label>
                                                        <input type="text" class="form-control" name="" id="">
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                            </form>


                                        </div>


                                    <div role="tabpanel" class="tab-pane" id="claim-status" aria-labelledby="claim-status-tab">
                                        <div class="row" style="margin-top:1%;">
                                        <form action="#" method="post">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label> Status </label>
                                                    <select class="form-control" id="status">
                                                        <option value="">Select Status</option>
                                                        @foreach($claimStatus as $claim_status)
                                                        <option value="{{$claim_status->id}}">{{$claim_status->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label> Next Step </label>
                                                    <select class="form-control" id="next_step">
                                                        <option value="">Select Next Step</option>
                                                        @foreach($nextSteps as $nextStep)
                                                        <option value="{{$nextStep->id}}">{{$nextStep->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <button type="submit" class="btn btn-success" id="status_btn">Submit</button>
                                            </div>
                                            <div class="clearfix"></div>
                                        </form>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script>
$(function() {
    $('#note').froalaEditor()
});
</script> --}}
@endsection
