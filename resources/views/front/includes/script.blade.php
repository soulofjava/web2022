<!--====== Jquery ======-->
<script src="{{ asset('assets/front/js/jquery-3.6.0.min.js') }}"></script>
<!--====== Bootstrap ======-->
<script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
<!--====== Appear Js ======-->
<script src="{{ asset('assets/front/js/appear.min.js') }}"></script>
<!--====== Slick ======-->
<script src="{{ asset('assets/front/js/slick.min.js') }}"></script>
<!--====== jQuery UI ======-->
<script src="{{ asset('assets/front/js/jquery-ui.min.js') }}"></script>
<!--====== Isotope ======-->
<script src="{{ asset('assets/front/js/isotope.pkgd.min.js') }}"></script>
<!--====== Circle Progress bar ======-->
<script src="{{ asset('assets/front/js/circle-progress.min.js') }}"></script>
<!--====== Images Loader ======-->
<script src="{{ asset('assets/front/js/imagesloaded.pkgd.min.js') }}"></script>
<!--====== Nice Select ======-->
<script src="{{ asset('assets/front/js/jquery.nice-select.min.js') }}"></script>
<!--====== Magnific Popup ======-->
<script src="{{ asset('assets/front/js/jquery.magnific-popup.min.js') }}"></script>
<!--  WOW Animation -->
<script src="{{ asset('assets/front/js/wow.min.js') }}"></script>
<!-- Custom script -->
<script src="{{ asset('assets/front/js/script.js') }}"></script>
<script>
    document.addEventListener("keydown", function (event) {
        // Check if the '`' key (key code 192) is pressed
        if (event.keyCode === 192) {
            var aku = $('#exampleModal').modal('show');
            if ($('#exampleModal').modal('show')) {
                $('#exampleModal').modal('hide')
            } else {
                $('#exampleModal').modal('show')
            }
        }
    });

    $(document).ready(function () {
        $("#exampleModal").on('shown.bs.modal', function () {
            $(this).find('#textareaID1').focus();
        });
    });
</script>