<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-migrate-3.1.0.min.js"
  integrity="sha256-ycJeXbll9m7dHKeaPbXBkZH8BuP99SmPm/8q5O+SbBc="
  crossorigin="anonymous"></script>
<script src="{{asset('front_asset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front_asset/js/jquery.malihu.PageScroll2id.min.js')}}"></script>
{{-- <script src="{{asset('front_asset/js/SmoothScroll.js')}}"></script> --}}
<script src="{{asset('front_asset/js/main.js')}}"></script>
<script src="{{asset('front_asset/js/modal-loading.js')}}"></script>
<script src="{{asset('front_asset/front_pages_asset/js/slick.js')}}"></script>
<script src="{{asset('autocomplete/jquery.auto-complete.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
	  $(document).on('click', '.js-change-lang', function (e) {
	      var lang = $(this).attr('lang');
	      window.location.href = window.location.hostname+'/change-language/'+lang;
	  });
	});
</script>