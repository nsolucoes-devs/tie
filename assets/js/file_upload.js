$(document).ready(function() {

    var readUrl = function(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.readAsDataURL(input.files[0]);

            reader.onload = function(e) {
                $(".capa_1").attr('src', e.target.result);
            }

        }
    }

    $(".file-upload_1").on('change', function() {
        readUrl(this);
    });

    $(".capa_1").click(function() {
        var btn = $(".file-upload_1");
        btn.trigger('click');
    });


    var readUrl_2 = function(input) {

        if (input.files && input.files[0]) {

            var reader_2 = new FileReader();

            reader_2.readAsDataURL(input.files[0]);

            reader_2.onload = function(e) {
                $(".capa_2").attr('src', e.target.result);
            }

        }
    }

    $(".file-upload_2").on('change', function() {
        readUrl_2(this);
    });

    $(".capa_2").click(function() {
        var btn_2 = $(".file-upload_2");
        btn_2.trigger('click');
    });

    var readUrl_3 = function(input) {

        if (input.files && input.files[0]) {

            var reader_3 = new FileReader();

            reader_3.readAsDataURL(input.files[0]);

            reader_3.onload = function(e) {
                $(".capa_3").attr('src', e.target.result);
            }

        }
    }

    $(".file-upload_3").on('change', function() {
        readUrl_3(this);
    });

    $(".capa_3").click(function() {
        var btn_3 = $(".file-upload_3");
        btn_3.trigger('click');
    });

    var readUrl_4 = function(input) {

        if (input.files && input.files[0]) {

            var reader_4 = new FileReader();

            reader_4.readAsDataURL(input.files[0]);

            reader_4.onload = function(e) {
                $(".capa_4").attr('src', e.target.result);
            }

        }
    }

    $(".file-upload_4").on('change', function() {
        readUrl_4(this);
    });

    $(".capa_4").click(function() {
        var btn_4 = $(".file-upload_4");
        btn_4.trigger('click');
    });

    var readUrl_5 = function(input) {

        if (input.files && input.files[0]) {

            var reader_5 = new FileReader();

            reader_5.readAsDataURL(input.files[0]);

            reader_5.onload = function(e) {
                $(".capa_5").attr('src', e.target.result);
            }

        }
    }

    $(".file-upload_5").on('change', function() {
        readUrl_5(this);
    });

    $(".capa_5").click(function() {
        var btn_5 = $(".file-upload_5");
        btn_5.trigger('click');
    });

    var readUrl_6 = function(input) {

        if (input.files && input.files[0]) {

            var reader_6 = new FileReader();

            reader_6.readAsDataURL(input.files[0]);

            reader_6.onload = function(e) {
                $(".capa_6").attr('src', e.target.result);
            }

        }
    }

    $(".file-upload_6").on('change', function() {
        readUrl_6(this);
    });

    $(".capa_6").click(function() {
        var btn_6 = $(".file-upload_6");
        btn_6.trigger('click');
    });


    var readUrl_7 = function(input) {

        if (input.files && input.files[0]) {

            var reader_7 = new FileReader();

            reader_7.readAsDataURL(input.files[0]);

            reader_7.onload = function(e) {
                $(".capa_7").attr('src', e.target.result);
            }

        }
    }

    $(".file-upload_7").on('change', function() {
        readUrl_7(this);
    });

    $(".capa_7").click(function() {
        var btn_7 = $(".file-upload_7");
        btn_7.trigger('click');
    });

    var readUrl_8 = function(input) {

        if (input.files && input.files[0]) {

            var reader_8 = new FileReader();

            reader_8.readAsDataURL(input.files[0]);

            reader_8.onload = function(e) {
                $(".capa_8").attr('src', e.target.result);
            }

        }
    }

    $(".file-upload_8").on('change', function() {
        readUrl_8(this);
    });

    $(".capa_8").click(function() {
        var btn_8 = $(".file-upload_8");
        btn_8.trigger('click');
    });


});
function removeIMG($img) {
    const meuImput = document.getElementById("remove_"+$img);

    meuImput.value = "1";
    $(".capa_"+$img).attr('src',"https://i0.wp.com/imgonline.com.br/site/wp-content/uploads/2019/08/Logo-IMG.png?ssl=1");
    //alert(meuImput);
}
