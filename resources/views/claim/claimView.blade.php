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
                                    <h5 class="text-center">100276</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="panel" style="background-color: #4894a5;">
                                <div class="panel-heading cus_pan_heading">
                                    <p class="text-center">Passenger</p>
                                    <h5 class="text-center">Dipto Shome</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="panel" style="background-color: #006057;">
                                <div class="panel-heading cus_pan_heading">
                                    <p class="text-center">Airline</p>
                                    <h5 class="text-center">Norwegian</h5>
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
                                    <h5 class="text-center">Delay</h5>
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
                                                                                        <td>#000370</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Passenger Representative</th>
                                                                                        <td>Claimnwins</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Passenger Full Name</th>
                                                                                        <td>Dipto Shome</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Passenger Tel</th>
                                                                                        <td>.</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Passenger Email</th>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Passenger Address</th>
                                                                                        <td>..</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Claim Referance Number</th>
                                                                                        <td>190101-000744</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Claim Create Date</th>
                                                                                        <td>22/03/2019</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Next Action Date</th>
                                                                                        <td>22/07/2019</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Member Name</th>
                                                                                        <td>Norwegian</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Claim Status</th>
                                                                                        <td>Determination Started</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Claim With</th>
                                                                                        <td>AD</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Claim Type</th>
                                                                                        <td>Delay</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Legacy Case</th>
                                                                                        <td>No</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Claim Closed Date</th>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Claim Summary</th>
                                                                                        <td>I am seeking 600.00 Euro compensation per passenger under EC Regulation 261/2004.</td>
                                                                                    </tr>
                                                                                    <tr class="odd gradeX">
                                                                                        <th>Claim Outcome</th>
                                                                                        <td>1200.00 Euro</td>
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
                                                                                    <td>#000370</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Date Of Disrupted</th>
                                                                                    <td>00/00/0000</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Scheduled Date & Time Of Departure</th>
                                                                                    <td>14/08/2018 17:05</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Airline</th>
                                                                                    <td>Norwegian</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Number Of Flight Journey</th>
                                                                                    <td>1</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Departure Airport</th>
                                                                                    <td>London Gatwick Airport - United Kingdom</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Destination Airport</th>
                                                                                    <td>John F.Kennedy International Airport - United States</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Flight Number</th>
                                                                                    <td>DI 7015</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Booking Ref</th>
                                                                                    <td>PIJAY5</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Scheduled Date & Time Of Departure</th>
                                                                                    <td>14/08/2018 20:05</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Actual Date & Time Of Arrival</th>
                                                                                    <td>15/08/2018 00:05</td>
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
                                                                                    <td>Security issues</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Do you dispute the reason</th>
                                                                                    <td>No</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Refreshments</th>
                                                                                    <td>No</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Telephone Call</th>
                                                                                    <td>No</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>If delayed overnight - Hotel accomodation</th>
                                                                                    <td>No</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>If applicable - transport between the airport and hote</th>
                                                                                    <td>No</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Did you incur any such expenditure</th>
                                                                                    <td>No</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Have you received any compensation (money/vouchers) already?</th>
                                                                                    <td>No</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Number of passengers:</th>
                                                                                    <td>2</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Passengers Name</th>
                                                                                    <td>Dipto Shome Sajal Kundu</td>
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
                                                                                            <td><input type="text" name="" id="" placeholder="Filter"></td>
                                                                                            <td><input type="text" name="" id="" placeholder="Filter"></td>
                                                                                            <td><input type="text" name="" id="" placeholder="Filter"></td>
                                                                                            <td></td>
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
                                                    <div class="tab-pane" id="claim_eligib" role="tabpanel">.6..</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane" id="messaging" aria-labelledby="messaging-tab">
                                        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
                                            Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee.
                                            Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown.
                                            Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel.
                                            Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.
                                        </p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="airline_response" aria-labelledby="airline_response-tab">
                                        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
                                        </p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="customer_final_comm" aria-labelledby="customer_final_comm-tab">
                                        <p>
                                            Food truck fixie locavore,
                                        </p>
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
@endsection
