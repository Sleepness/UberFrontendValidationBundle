/**
 * Check if element value is equal to specific value
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @constructor
 */
function UberEqualToValidationConstraint(field) {
    this.message = '{{ field_name }} should be equal to {{ compared_value }}';

    this.validate = function () {
        var error = '';
        if (field.val() != field.attr('data-value-equalto') || field.val() == '') {
            error = this.message.replace('{{ field_name }}', String(parse_field_name(field.attr('name'))));
            error = error.replace('{{ compared_value }}', field.attr('data-value-equalto'));
            if (field.attr('data-message-equalto')) {
                error = field.attr('data-message-equalto');
                error = error.replace('{{ compared_value }}', field.attr('data-value-equalto'));
            }
        }

        return error;
    }
}
