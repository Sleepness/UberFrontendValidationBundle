/**
 * Check if element value is true
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @constructor
 */
function UberTrueValidationConstraint(field) {
    this.message = 'Value of {{ field_name }} should be TRUE.';

    this.validate = function () {
        var error = '';
        if (field.val() != true) {
            error = this.message.replace('{{ field_name }}', String(parse_field_name(field.attr('name'))));
            if (field.attr('data-message-true') != '') {
                error = field.attr('data-message-true');
            }
        }

        return error;
    }
}
