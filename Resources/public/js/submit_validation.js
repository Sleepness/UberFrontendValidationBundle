$(document).ready(function () {
    $('.form_submit_button').on('click', function (e) {
        $.each($('*[data-constraint]'), function (key, val) {
            /*var errors = ($(val).attr('data-constraint')).split(' '); // this test code need to be removed after work done
            if (errors.length > 1) {
                e.preventDefault();
                e.stopPropagation();
                $.each(errors, function (key, error) {
                    $('#errors').append("<p>filed" + $(val).attr('name') + "cannot be" + error + "!</p>");
                });
            }*/
        });
    });
});
