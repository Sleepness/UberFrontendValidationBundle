(function($) {
    $(document).ready(function () {
        $('.form_submit_button').on('click', function (e) {
            $('#errors').html("");
            $.each($('*[data-constraint]'), function (key, val) {
                var errors = ($(val).attr('data-constraint')).split(' ');
                if (errors.length > 0) { // for now we cant submit form even if it valid, I'll fix that in future
                    e.preventDefault();
                    e.stopPropagation();
                    $.each(errors, function (key, error) {
                        var name = 'Uber' + error + 'ValidationConstraint';
                        var className = window[name];
                        var constraintInstance = new className($(val), []);
                        var errorMessage = constraintInstance.validate();
                        if (!errorMessage == '') {
                            $(val).addClass('invalid-field');
                            $('#errors').append("<p>" + errorMessage + "</p>");
                        }
                    });
                }
            });
        });
    });
})(jQuery);
