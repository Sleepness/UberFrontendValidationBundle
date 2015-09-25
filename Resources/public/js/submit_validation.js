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
                $(val).removeClass('invalid-field');
                var errors = ($(val).attr('data-constraint')).split(' ');
                if (errors.length < 1) return;
                $.each(errors, function (key, error) {
                    var name = 'Uber' + error + 'ValidationConstraint',
                        className = window[name];
                    if (typeof(className) != "function") return;
                    var constraintInstance = new className($(val), []),
                        errorMessage = constraintInstance.validate();
                    if (!errorMessage) return;
                    e.preventDefault();
                    e.stopPropagation();
                    $(val).addClass('invalid-field');
                    $(val).after("<p class='errors'>" + errorMessage + "</p>");
                });
            });
        });
    });
})(jQuery);
