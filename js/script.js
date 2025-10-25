$(document).ready(function() {
    $('#tombolCari').hide();    

    // event ketika berinteraksi dengan keyword
    $('#keyword').on('keyup', function() {

        // munculkan icon loading
        $('.loader').show();

        // ajax menggunakan load
        // $('#container').load('ajax/game.php?keyword=' + $('#keyword').val());

        // ajax menggunakan $.get | data menggantikan xhr.responeTeks
        $.get('ajax/game.php?keyword=' + $('#keyword').val(), function(data) {
            $('#container').html(data);
            $('.loader').hide();
        })
    });
});