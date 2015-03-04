/**
 * This is the client side validation init script, that triggers when user click on submit button
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 */
(function ($) {
    $(document).ready(function () {
        $('.form_submit_button').on('click', function (e) {
            $.each($('*[data-constraint]'), function (key, val) {
                var errors = ($(val).attr('data-constraint')).split(' ');
                if (errors.length > 0) { // for now we cant submit form even if it valid, I'll fix that in future
                    $.each(errors, function (key, error) {
                        var name = 'Uber' + error + 'ValidationConstraint';
                        var className = window[name];
                        if (typeof(className) == "function") {
                            var constraintInstance = new className($(val), []);
                            var errorMessage = constraintInstance.validate();
                            if (!errorMessage == '') {
                                e.preventDefault();
                                e.stopPropagation();
                                $(val).addClass('invalid-field');
                                $(val).parent('div').append("<p class='errors'>" + errorMessage + "</p>");
                            }
                        }
                    });
                }
            });
        });
    });
})(jQuery);
