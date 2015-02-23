$(document).ready(function () {
    $('.form_submit_button').on('click', function (e) {
        $.each($('*[data-constraint]'), function (key, val) {
            /* // this test code need to be removed after work done
            if (errors.length > 1) {
            var errors = ($(val).attr('data-constraint')).split(' ');
            if (errors.length >= 1) {
                e.preventDefault();
                e.stopPropagation();
                $.each(errors, function (key, error) {
                    $('#errors').append("<p>field " + $(val).attr('name') + " has error " + error + "!</p>");
                });
            }*/
        });
    });
});
