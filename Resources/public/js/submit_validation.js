/**
 * This is the client side validation init script, that triggers when user click on submit button
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 */
$(document).ready(function () {
    $.each($('.form_submit_button'), function (k, button) {
        $(button).unbind('click').bind('click', function (e) { // need to be found second click trigger
            $('.errors').remove();
            var $form = $(this).parent('form');
            $.each($form.find('*[data-constraint]'), function (key, val) {
                var errors = ($(val).attr('data-constraint')).split(' ');
                if (errors.length > 0) {
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
});
