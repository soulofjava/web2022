<!-- Vendor JS Files -->
<script src="{{ asset('assets/front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/front/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/front/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/front/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/front/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/front/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('assets/front/assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/front/assets/js/main.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- accessibility widget -->
<script src="https://website-widgets.pages.dev/dist/sienna.min.js" defer></script>

<!-- tombol C ditekan -->
<script>
    document.addEventListener("keydown", function (event) {
        // Check if the 'T' key (key code 84) is pressed
        if (event.keyCode === 192) {
            $('#exampleModal').modal('show');

            if ($('#exampleModal').modal('show')) {
                $('#exampleModal').modal('hide')
            } else {
                $('#exampleModal').modal('show')
                // $('#exampleModal').on('shown.bs.modal', function () {
                //     $('#textareaID1').focus();
                // })
            }
        }
    });

    $(document).ready(function () {
        $("#exampleModal").on('shown.bs.modal', function () {
            $(this).find('#textareaID1').focus();
        });
    });

    let carikan = document.getElementById("carikan");

    function handleClick() {
        $('#exampleModal').modal('show');
    }

    carikan.onclick = handleClick;
</script>