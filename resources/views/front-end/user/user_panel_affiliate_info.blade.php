@extends('front-end.user.user_panel_layout')

@section('user_panel_main_section')
<style>
.affiliate_info_mother_div{
    margin-top: 20px;
}

table thead tr th:first-child {
    width: 0%!important;
}

.show-all{
    float: right;
    color: #337ab7;
    padding: 0px;
    margin: 0px;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" >

<div class="user_panel_main_section">
  <div class="container">
        <div class="affiliate_info_mother_div">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Latest 5 Refferals</h4>
                            </div>
                            <div class="col-md-6">
                                <a href="" class="show-all"><h4>Show All</h4></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <th>#</th>
                                            <th>DateTime</th>
                                            <th>Claim Name</th>
                                            <th>Commsion Amount</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>23-05-2019</td>
                                                <td>Lost Luggage</td>
                                                <td>560</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-group">
                    <div class="panel panel-success">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Latest 5 Commisions</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="" class="show-all"><h4>Show All</h4></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <th>#</th>
                                                <th>DateTime</th>
                                                <th>Claim Name</th>
                                                <th>Commsion Amount</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>23-05-2019</td>
                                                    <td>Lost Luggage</td>
                                                    <td>560</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="panel-group">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Latest 5 Payments</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="" class="show-all"><h4>Show All</h4></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <th>#</th>
                                                    <th>DateTime</th>
                                                    <th>Claim Name</th>
                                                    <th>Commsion Amount</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>23-05-2019</td>
                                                        <td>Lost Luggage</td>
                                                        <td>560</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

        </div>
    </div>
</div>


@endsection
