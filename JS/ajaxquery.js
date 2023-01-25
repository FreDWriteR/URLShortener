$(document).ready(function () {
    $("#formToShort").on('submit', function (e){
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: 'CreateShortURL.php',
            type: 'post',
            data: form.serialize(),
            success: function(response) {
                $('#result_form').html('Твой новый короткий URL: '+response);
            }
        });
        e.preventDefault();
    });
});


