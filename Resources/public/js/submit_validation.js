/**
 * This is the client side validation init script, that triggers when user click on submit button
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 */
(function ($) {
    $(function () {
        $('.form_submit_button').on('click', function (e) {
            var $form = $(this).closest('form');
            $form.find(".errors").remove();
            $form.find('*[data-constraint]').each(function (key, val) {
                var errors = ($(val).attr('data-constraint')).split(' ');
                if (errors.length > 0) {
                    $.each(errors, function (key, error) {
                        $(val).removeClass('invalid-field');
                        var name = 'Uber' + error + 'ValidationConstraint';
                        var className = window[name];
                        if (typeof(className) == "function") {
                            var constraintInstance = new className($(val), []);
                            var errorMessage = constraintInstance.validate();
                            if (errorMessage) {
                                e.preventDefault();
                                e.stopPropagation();
                                $(val).addClass('invalid-field');
                                $(val).after("<p class='errors'>" + errorMessage + "</p>");
                            }
                        }
                    });
                }
            });
        });
    });
})(jQuery);
