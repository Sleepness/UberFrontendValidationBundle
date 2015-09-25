/**
 * Check if element value is valid Date value
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @constructor
 */
function UberDateValidationConstraint(field) {
    this.message = 'Value of {{ field_name }} field is not a valid Date.';

    this.validate = function () {
        var pattern = /^(\d{4})-(\d{2})-(\d{2})$/,
            error = '';

        if (pattern.test(field.val())) return error;

        error = this.message.replace('{{ field_name }}', String(parse_field_name(field.attr('name'))));
        if (field.attr('data-message-date') !== '') {
            error = field.attr('data-message-date');
        }

        return error;
    };
}
