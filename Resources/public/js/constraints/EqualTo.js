/**
 * Check if element value equal to specific value
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @constructor
 */
function UberEqualToValidationConstraint(field) {
    this.message = 'This {{value}} must be equal to {{ value }}';

    this.validate = function () {
        var error = '';
        if (field.val() != field.attr('data-value') || field.val() == '') {
            var message = field.attr('data-message');
            error = message.replace('{{ compared_value }}', field.attr('data-value'));
        }

        return error;
    }
}
