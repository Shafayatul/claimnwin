<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Claim - Claimnwin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('front_asset/user_panel/css/style.css')}}">
</head>

<body>
    <div class="container-fluid menu">
        <nav class="navbar navbar-inverse menu_navbar">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand menu_brand" href="#"> Claimnwin</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav menu_nav">
                        <li><a href="{{ URL::to('/user-home') }}">My Claims</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right menu_nav">
                        <li><a href="#"><img src="{{asset('front_asset/user_panel/img/')}}/notification.svg" alt="country"></a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right menu_nav">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <img src="{{asset('front_asset/user_panel/img/')}}/united-kingdom.svg" alt="country">
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><img src="{{asset('front_asset/user_panel/img/')}}/flag.svg" alt="country" class="country_img"> Francais</a> </li>
                                <li><a href="#"><img src="{{asset('front_asset/user_panel/img/')}}/belgium.svg" alt="country" class="country_img"> Francais (BE)</a> </li>
                                <li><a href="#"><img src="{{asset('front_asset/user_panel/img/')}}/united-kingdom.svg" alt="country" class="country_img"> English</a></li>
                            </ul>
                        </li>
                    </ul>


                    <ul class="nav navbar-nav navbar-right menu_nav">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">User Name
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">My Claims</a></li>
                                <li><a href="#">Sign Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    @yield('user_panel_main_section')

    <footer class="container-fluid text-center">

    </footer>
    <script type="text/javascript">

      document.querySelector("html").classList.add('js');
      var fileInput  = document.querySelector( ".input-file" ),
        button     = document.querySelector( ".input-file-trigger" ),
        the_return = document.querySelector(".file-return");

      button.addEventListener( "keydown", function( event ) {
        if ( event.keyCode == 13 || event.keyCode == 32 ) {
            fileInput.focus();
        }
      });
      button.addEventListener( "click", function( event ) {
       fileInput.focus();
       return false;
      });
      fileInput.addEventListener( "change", function( event ) {
        the_return.innerHTML = this.value;
      });

    </script>


</body>

</html>