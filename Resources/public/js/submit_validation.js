$(document).ready(function () {
    $('.form_submit_button').on('click', function (e) {
        $.each($('input[data-constraint]'), function (key, val) {
            var errors = ($(val).attr('data-constraint')).split(' ');
//                    if ($(val).attr('data-constraint') == 'NotBlank' && $(val).val() == '') {
            if (errors.length > 1) {
                e.preventDefault();
                e.stopPropagation();
                $.each(errors, function (key, error) {
                    $('#errors').append("<p>filed" + $(val).attr('name') + "cannot be" + error + "!</p>");
                });
            }
        });
    });
});
