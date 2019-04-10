@extends('layouts.front_layout')
@section('header-script')
<link  href="{{asset('front_asset/front_pages_asset/css/affiliate_page.css')}}" rel="stylesheet" />
@endsection

@section('page-title')
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page_title">
                <h1>Get paid if you're in travel</h1>
            </div>
            <div class="page_p">
                <p>
                    Join our affiliate program and begin earning money while helping
                    fellow travellers in need.
                </p>
            </div>
            <div class="page_btn">
                <a href="#" class="btn text-uppercase">sign up</a>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('content')
<div class="container">
    <!-- How it works div starts -->
    <div class="how_it_works_div">
        <div class="row">
            <div class="col-md-12">
                <div class="how_it_works_lower_div">
                <div class="row">
                    <div class="col-md-4 text-center margin_bottom">
                    <div class="how_it_works_background_icon_div">
                        <div class="how_it_works_icon_div">
                        <img src="{{ asset('/front_asset/front_pages_asset/img/us-doller.png') }}" alt="">
                        </div>
                    </div>
                    <div class="how_it_works_text_div">
                        <p class="how_it_works_text_upper_p_div">HIGH COMMISSION RATES</p>
                        <p class="how_it_works_text_lower_p_div text-center">Claim'N Win Offers some of the highest <br> commision rates in the industry <br> Earn up to €185 per referral!</p>
                    </div>
                    </div>
                    <div class="col-md-4 text-center margin_bottom">
                    <div class="how_it_works_background_icon_div">
                        <div class="how_it_works_icon_div">
                        <img src="{{ asset('/front_asset/front_pages_asset/img/setting.png') }}" alt="">
                        </div>
                    </div>
                    <div class="how_it_works_text_div">
                        <p class="how_it_works_text_upper_p_div">EASY TO SET UP</p>
                        <p class="how_it_works_text_lower_p_div text-center">No programming knowledge needed. Simply <br> sign up and pick the option you prefer.</p>
                    </div>
                    </div>
                    <div class="col-md-4 text-center margin_bottom">
                    <div class="how_it_works_background_icon_div">
                        <div class="how_it_works_icon_div">
                        <img src="{{ asset('/front_asset/front_pages_asset/img/search.png') }}" alt="">
                        </div>
                    </div>
                    <div class="how_it_works_text_div">
                        <p class="how_it_works_text_upper_p_div">LONGEST LASTING COOKIES</p>
                        <p class="how_it_works_text_lower_p_div text-center">Our cookie data lasts for 3 months! <br> So even if users come back at a later point, <br> we'll still allocate them to you.</p>
                    </div>
                    </div>
                </div>
                </div>

                <div class="how_it_works_lower_div">
                    <div class="row">
                        <div class="col-md-4 text-center margin_bottom">
                        <div class="how_it_works_background_icon_div">
                            <div class="how_it_works_icon_div">
                            <img src="{{ asset('/front_asset/front_pages_asset/img/like.png') }}" alt="">
                            </div>
                        </div>
                        <div class="how_it_works_text_div">
                            <p class="how_it_works_text_upper_p_div">LOVED BY TRAVELLERS</p>
                            <p class="how_it_works_text_lower_p_div text-center">Claim'N Win is rated 4.9 out of <br> 5 stars. Show your visitors that you care <br> about them too!</p>
                        </div>
                        </div>
                        <div class="col-md-4 text-center margin_bottom">
                        <div class="how_it_works_background_icon_div">
                            <div class="how_it_works_icon_div">
                            <img src="{{ asset('/front_asset/front_pages_asset/img/globe.png') }}" alt="">
                            </div>
                        </div>
                        <div class="how_it_works_text_div">
                            <p class="how_it_works_text_upper_p_div">WE ARE GLOBAL</p>
                            <p class="how_it_works_text_lower_p_div text-center">We are a truly global team and support <br> travellers in 17 different languages. <br> It's a small world, after all.</p>
                        </div>
                        </div>
                        <div class="col-md-4 text-center margin_bottom">
                        <div class="how_it_works_background_icon_div">
                            <div class="how_it_works_icon_div">
                            <img src="{{ asset('/front_asset/front_pages_asset/img/online_support.png') }}" alt="">
                            </div>
                        </div>
                        <div class="how_it_works_text_div">
                            <p class="how_it_works_text_upper_p_div">WE SUPPORT YOU</p>
                            <p class="how_it_works_text_lower_p_div text-center">Just as we do for our customers, <br> we're here to offer the support you need <br> to get you started!</p>
                        </div>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<div class="travel">
    <div class="container">
        <div class="row margin_bottom">
            <div class="col-md-6">
                <div class="travel_title">
                    <h1>Get paid if you're in travel</h1>
                </div>
                <div class="travel_p">
                    <p>
                        Our affiliate program aims at reaching and helping even more <br>
                        passengers get compensated when their flights are disrupted.
                    </p>
                </div>
                <div class="travel_p">
                    <p>
                        If you have a travel related website, a blog, or you are an influencer, <br>
                        you can now earn money while providing even more value to your <br>
                        audience. Simply sign up and get your unique link to post on <br>
                        your website.
                    </p>
                </div>
                <div class="travel_p">
                    <p>
                        We'll still do all the work, but you'll get all the credit.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- What customer say div starts -->
<div class="container">
<div class="what_customer_say_div">

        <div class="row">
            <div class="col-md-12">
                <div class="what_customer_say_title_div text-center">
                <h1>HOW IT WORKS</h1>
                </div>
            </div>
        </div>
        <div class="works">
            <div class="row">
                <div class="col-md-4">
                    <div class="work_first_column">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="work_number">
                                    <span>1</span>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="work_text">
                                    <div class="work_text_h1">
                                        <h1>SIGN UP</h1>
                                    </div>
                                    <div class="work_text_p">
                                        <p>
                                            Register in just a few simple steps and get
                                            access to your dashboard
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="work_first_column">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="work_number">
                                    <span>2</span>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="work_text">
                                    <div class="work_text_h1">
                                        <h1>PICK A REFERRAL METHOD</h1>
                                    </div>
                                    <div class="work_text_p">
                                        <p>
                                            Register in just a few simple steps and get
                                            a referral link.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="work_first_column">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="work_number">
                                    <span>3</span>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="work_text">
                                    <div class="work_text_h1">
                                        <h1>BEGIN EARNING MONEY</h1>
                                    </div>
                                    <div class="work_text_p">
                                        <p>
                                            Promote your new service to your users
                                            and begin earning money!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- What customer say div ends -->

<div class="become_an_affiliate">
    <div class="container">
        <div class="row margin_top_70">
            <div class="col-md-6">
                <div class="become_an_affiliate_title">
                    <h1>Help fellow travellers and earn money</h1>
                </div>
                <div class="become_an_affiliate_p">
                    <p>
                        Claim'N Win helps passengers get compensated when their flights <br>
                        are disrupted. Join one of the best affiliate programs in travel <br>
                        today! Our affiliate program aims at reaching and helping even <br>
                        more passengers get compensated when their flights are disrupted.
                    </p>
                </div>
                <div class="become_an_affiliate_btn">
                    <a href="#" class="btn">BECOME AN AFFILIATE</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
