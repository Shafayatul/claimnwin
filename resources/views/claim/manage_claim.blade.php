
@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<style type="text/css">
  .autocomplete {
    /*the container must be positioned relative:*/
    position: relative;
    display: inline-block;
  }

  .autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff;
  border-bottom: 1px solid #d4d4d4;
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9;
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important;
  color: #ffffff;
}
</style>
<div class="forms">
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>List of Claims</h4>
            </div>

            <div class="form-body">
              <div class="card">

                    <div class="card-body">

                      {!! Form::open(['method' => 'GET', 'url' => url('/manage-claim'), 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search']) !!}
                      <div class="row">
                        <div class="col-md-2">
                          <div class="input-group">
                              <input type="text" class="form-control" name="claim_id" placeholder="Claim Id" value="{{ request('claim_id') }}">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="input-group">
                              <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ request('first_name') }}">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="input-group">
                              <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ request('last_name') }}">
                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="input-group">
                              <input type="text" class="form-control" name="email" placeholder="Email" value="{{ request('email') }}">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="input-group">
                              <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ request('phone') }}">
                          </div>
                        </div>

                        <div class="col-md-2">
                            <div class="input-group">
                                <input type="text" class="form-control" name="note" placeholder="Note" value="{{ request('note') }}">
                            </div>
                        </div>

                      </div>
                      <div class="row">

                        <div class="col-md-2">
                        <div class="input-group">
                            <input type="text" class="form-control" name="airline_ref" placeholder="Airline Reference" value="{{ request('airline_ref') }}">
                        </div>
                        </div>

                        <div class="col-md-2">
                          <div class="input-group">
                              <input type="text" class="form-control" name="caa_ref" placeholder="CAA Reference" value="{{ request('caa_ref') }}">
                          </div>
                        </div>

                        <div class="col-md-2">
                            <div class="input-group">
                                <input type="text" class="form-control" name="adr_ref" placeholder="ADR Reference" value="{{ request('adr_ref') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <input type="text" class="form-control" name="court_no" placeholder="Court No" value="{{ request('court_no') }}">
                            </div>
                        </div>

                        <div class="col-md-2">
                          <div class="input-group">
                              <input type="text" class="form-control autocomplete" id="myInput" name="s_airline" placeholder="Airline name" value="{{ request('s_airline') }}" autocomplete="off">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="input-group">
                              <input type="text" class="form-control " name="flight_number" placeholder="flight_number" value="{{ request('flight_number') }}" autocomplete="off">
                          </div>
                        </div>

                      </div>

                      <div class="row">
                        <div class="col-md-2">
                          <br>
                          <div class="input-group">
                            <select class="form-control" id="status" name="s_claim_status">
                              <option value="">-- Please select --</option>
                              @foreach($claim_status as $key=>$value)
                                <option value="{{$key}}" @if(request('s_claim_status') == $key) selected @endif>{{$value}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="input-group">
                                <label>Starting date:</label>
                              <input type="date" class="form-control" name="s_starting_date" placeholder="" value="{{ request('s_starting_date') }}">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="input-group">
                                <label>End date:</label>
                              <input type="date" class="form-control" name="s_end_date" placeholder="" value="{{ request('s_end_date') }}">
                          </div>
                        </div>

                        <div class="col-md-2">
                            <span class="input-group-append">
                                <br>
                                <button class="btn btn-secondary" type="submit" name="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                      </div>
                      {!! Form::close() !!}

                      <br>
                      <br>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>

                                        <th>CLAIM ID</th>
                                        <th>User Email</th>
                                        <th>DEPATED/FINAL DESTINATION</th>
                                        <th>CLAIM TYPE</th>
                                        <th>AIRLINE/FLIGHT NO</th>
                                        <th>Affiliate</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($claims as $row)
                                    <tr>

                                        <td>
                                            <a href="{{url('/claim-view/'.$row->id)}}">{{$row->id}}</a>
                                        </td>
                                        <td>
                                            @if(isset($passenger[$row->id]['email']))
                                                {{$passenger[$row->id]['email']}}
                                            @endif
                                            <br>
                                            <a href="#"></a>
                                        </td>

                                        <td>
                                            @if(isset($airport[$row->final_destination_id]))
                                                {{$airport[$row->departed_from_id]}}
                                            @endif
                                            <br/>
                                            @if(isset($airport[$row->final_destination_id]))
                                                {{$airport[$row->final_destination_id]}}
                                            @endif

                                        </td>


                                        <td>
                                            {{str_replace('_', ' ', ucfirst($row->claim_table_type)) }}
                                        </td>
                                         <td>

                                            @if($row->airline_id !="")
                                                {{$airline[$claim_and_airline_array[$row->id]['airline_id']]}}
                                            @endif


                                        </td>
                                        <td>
                                            @if($row->affiliate_user_id != "")
                                                <i class="fa fa-flag" aria-hidden="true"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('/claim-view/'.$row->id)}}" class="btn btn-sm btn-primary">Details</a>
                                            @if($row->is_deleted == 0)
                                            <a href="{{URL::to('/claim-archive/'.$row->id)}}" class="btn btn-sm btn-danger">Close</a>
                                            @else
                                            <a href="{{URL::to('/claim-archive/'.$row->id)}}" class="btn btn-sm btn-success">Reopen</a>
                                            @endif
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if($is_paginate)
                              <div class="pagination-wrapper"> 
                                {!! $claims->appends(['search' => Request::get('search')])->render() !!} 
                              </div>
                            @endif
                        </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection


@section('footer-script')

<script type="text/javascript">

var countries = [];
@php
  $cnt = count($airline_array);
@endphp

@for($i = $cnt - 1; $i >= 0; $i--)
  countries.push('{{ $airline_array[$i] }}');
@endfor

console.log(countries)

autocomplete(document.getElementById("myInput"), countries);

function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
      x[i].parentNode.removeChild(x[i]);
    }
  }
}
/*execute a function when someone clicks in the document:*/
document.addEventListener("click", function (e) {
    closeAllLists(e.target);
});
}
</script>
@endsection