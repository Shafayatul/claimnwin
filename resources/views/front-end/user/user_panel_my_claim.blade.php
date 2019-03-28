@extends('FrontEnd.user.user_panel_layout')

@section('user_panel_main_section')
<div class="container">

  <div class="row">
    <div class="col-md-12">
      <div class="parent_div">
        <div class="user_panel_h1">
          <h1>Claim abcd1235</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-3">
      <div class="parent_div text-center">
        <span class="bold_span">Claim:</span> Cancelled Flight
      </div>
    </div>
    <div class="col-md-3 text-center">
      <div class="parent_div text-center">
        <span class="bold_span">Defendant:</span> British Airway
      </div>
    </div>
    <div class="col-md-2">
      <div class="parent_div text-center">
        <span class="bold_span">Value:</span> $1234.56
      </div>
    </div>
    <div class="col-md-4">
      <div class="parent_div text-center">
        <span class="bold_span">Status:</span> Claim assessment in progress
      </div>
    </div>
  </div>
  <div class="underline_row">

  </div>

  <div class="claim_options">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item claim_options_ul_li active">
        <a class="nav-link active text-center" id="claim-status-tab" data-toggle="tab" href="#claim-status" role="tab" aria-controls="claim-status" aria-selected="true"><i class="fas fa-signature"></i> Claim status</a>
      </li>
      <li class="nav-item claim_options_ul_li">
        <a class="nav-link text-center" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false"><i class="fas fa-list"></i> History</a>
      </li>
      <li class="nav-item claim_options_ul_li">
        <a class="nav-link text-center" id="claim-details-tab" data-toggle="tab" href="#claim-details" role="tab" aria-controls="claim-details" aria-selected="false"><i class="fas fa-bolt"></i> Claim details</a>
      </li>
      <li class="nav-item claim_options_ul_li">
        <a class="nav-link text-center" id="message-tab" data-toggle="tab" href="#message" role="tab" aria-controls="message" aria-selected="false"><i class="far fa-comment-alt"></i> Message</a>
      </li>
      <li class="nav-item claim_options_ul_li">
        <a class="nav-link text-center" id="document-tab" data-toggle="tab" href="#document" role="tab" aria-controls="document" aria-selected="false"><i class="far fa-file-alt"></i> Document</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade active in" id="claim-status" role="tabpanel" aria-labelledby="claim-status-tab">
        <div class="wrapper">
          <div class="claim_status_refresh_icon text-center">
            <i class="fas fa-sync"></i>
          </div>
          <div class="claim_status_refresh_text text-center">
            <p>Claim assessment in progress</p>
          </div>
          <div class="claim_status_message text-center">
            <p>Your claim is under review. Our legal team will contact you if we require any further information</p>
          </div>
          <div class="claim_status_box_message text-center">
            <p>NO ACTION IS REQUIRED FROM YOU</p>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
        <div class="wrapper">


          <div class="container mt-5 mb-5">
            <div class="row">
              <div class="col-md-6 offset-md-3 text-center">
                <ul class="timeline">
                  <li>
                    <a target="_blank" href="https://www.totoprayogo.com/#">New Web Design</a>
                    <a href="#" class="float-right">21 March, 2014</a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....</p>
                  </li>
                  <li>
                    <a href="#">21 000 Job Seekers</a>
                    <a href="#" class="float-right">4 March, 2014</a>
                    <p>Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
                  </li>
                  <li>
                    <a href="#">Awesome Employers</a>
                    <a href="#" class="float-right">1 April, 2014</a>
                    <p>Fusce ullamcorper ligula sit amet quam accumsan aliquet. Sed nulla odio, tincidunt vitae nunc vitae, mollis pharetra velit. Sed nec tempor nibh...</p>
                  </li>
                </ul>
              </div>
            </div>
          </div>


        </div>
      </div>
      <div class="tab-pane fade" id="claim-details" role="tabpanel" aria-labelledby="claim-details-tab">
        <div class="wrapper">
          <div class="parent_div">
            <div class="user_panel_h2">
              <h2>Claim properties</h2>
            </div>
          </div>
          <div class="parent_div">
            <div class="compensation_table">
              <table class="table">
                <thead>
                  <tr class="compensation_table_background">
                    <th scope="col">Head of damages</th>
                    <th scope="col">Initial Claim</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>EU 261 Compensation</td>
                    <td>$ 6000</td>
                  </tr>
                  <tr>
                    <td>EU 261 Customer Care</td>
                    <td>$ 2975.50</td>
                  </tr>
                  <tr>
                    <td>Others</td>
                    <td>-</td>
                  </tr>
                  <tr class="compensation_table_background">
                    <th scope="col">Compensation from British Airways</th>
                    <th scope="col">$ 3500.50</th>
                  </tr>
                  <tr>
                    <td>Welcome Success Fee</td>
                    <td>- $ 893.50</td>
                  </tr>
                  <tr class="compensation_table_result_row">
                    <td>Your Compensation</td>
                    <td>$ 2681.50</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="parent_div">
            <div class="row">
              <div class="col-md-4 col-sm-6 col-xs-6">
                <div class="defandant_title">
                  Defandant
                </div>
                <div class="underline_row">

                </div>
                <div class="defandant_body">
                  1. British Airways
                </div>
              </div>
              <div class="col-md-4 col-sm-6 col-xs-6">
                <div class="defandant_title">
                  Extra Claimant
                </div>
                <div class="underline_row">

                </div>
                <div class="defandant_body">
                  No extra claimant added.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="message" role="tabpanel" aria-labelledby="message-tab">
        <div class="wrapper">
          <div class="message_icon text-center">
            <i class="far fa-comment-alt"></i>
          </div>
          <div class="message_text text-center">
            <p>How can we help you today?</p>
          </div>
          <div class="message_underline_row">

          </div>
          <div class="user_message">
            <form class="user_message_form" action="index.html" method="post">
              <i class="fas fa-pencil-alt prefix"></i>
              <textarea id="" class="" placeholder="Write a message"></textarea>
              <div class="row">
                <div class="col-md-12 text-right">
                  <button type="button" name="button">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="document" role="tabpanel" aria-labelledby="document-tab">
        <div class="wrapper">
          <div class="parent_div">
            <div class="row">
              <div class="col-md-4 col-md-offset-4">
                <div class="document_submit_div text-center">
                  <form action="#" class="">
                    <div class="input-file-container">
                      <input class="input-file" id="my-file" type="file">
                      <label tabindex="0" for="my-file" class="input-file-trigger">Upload Document</label>
                    </div>
                    <p class="file-return"></p>
                  </form>
                </div>
                <div class="document_underline_row">

                </div>
                <div class="uploaded_documents text-center">
                  wwwwwpdf
                </div>
                <div class="document_underline_row">

                </div>
                <div class="uploaded_documents text-center">
                  wwwwwpdf
                </div>
                <div class="document_underline_row">

                </div>
                <div class="uploaded_documents text-center">
                  wwwwwpdf
                </div>
                <div class="document_underline_row">

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