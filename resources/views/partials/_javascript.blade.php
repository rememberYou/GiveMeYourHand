<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>

<!-- Bootstrap's JavaScript plugins -->
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- Appear JavaScript (Needed for the counter) -->
<script type="text/javascript" src="{{ asset('plugins/jquery.appear.js') }}"></script>

<!-- Initialization of Plugins -->
<script type="text/javascript" src="{{ asset('js/template.js') }}"></script>

<!-- Useful for the counter -->
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

<!-- Reveal animations when scrolling (with animate.css) -->
<script type="text/javascript" src="{{ asset('js/wow.min.js') }}"></script>

<!-- Activate wow.js -->
<script type="text/javascript">
 new WOW().init();
</script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
@yield('scripts')
