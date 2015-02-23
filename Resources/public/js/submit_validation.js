$(document).ready(function () {
    $('.form_submit_button').on('click', function (e) {
        $.each($('*[data-constraint]'), function (key, val) {
            var errors = ($(val).attr('data-constraint')).split(' ');
            if (errors.length > 0) {
                e.preventDefault();
                e.stopPropagation();
                $.each(errors, function (key, error) {
                    var name = 'Uber' + error + 'ValidationConstraint';
                    var className = window[name];
                    var constraintInstance = new className($(val), []);
                    var errorMessage = constraintInstance.validate();
                    $('#errors').append("<p>" + errorMessage + "</p>");
                });
            }
        });
    });
});
