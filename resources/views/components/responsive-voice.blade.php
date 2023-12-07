<!-- voice -->
<script src='https://code.responsivevoice.org/responsivevoice.js'></script>
<script>
    $(document).ready(function () {
        $web = document.getElementById('websitename').innerText;
        suara('Selamat datang di website ' + $web);

        // Tag a dan h3 saat di hover
        $("a, h3").mouseover(function (e) {
            $text = e.target.innerText;
            suara($text);
        });

        // saat blok text pada tag p
        $('body').mouseup(function () {
            $text = getSelectedText();
            suara($text);
        });

        function getSelectedText() {
            if (window.getSelection) {
                return window.getSelection().toString();
            } else if (document.selection) {
                return document.selection.createRange().text;
            }
            return '';
        }

        function suara($text) {
            responsiveVoice.speak(
                $text,
                "Indonesian Female",
                {
                    pitch: 1,
                    rate: 1,
                    volume: 1
                }
            );
        }
    });
</script>