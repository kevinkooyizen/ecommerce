<!--begin::Base Scripts -->
<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="/js/jquery/jquery-2.2.4.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<!-- Popper js -->
<script src="/js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="/js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="/js/plugins.js"></script>
<!-- Classy Nav js -->
<script src="/js/classy-nav.min.js"></script>
<!-- Active js -->
<script src="/js/active.js"></script>
<script src="/js/number-check.js"></script>
<!--end::Base Scripts -->
<script src="/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
  $(document).ready(function(e){
    $('.datepicker').datepicker({
      format: 'dd M yyyy',
    });
  });
</script>
@stack('scripts')