/**
 * Check if element value is valid DateTime value
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @constructor
 */
function UberDateTimeValidationConstraint(field) {
    this.message = 'Value of {{ field_name }} field is not a valid DateTime.';

    this.validate = function () {
        var pattern = /^(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})$/;
        var error = '';
        if (!pattern.test(field.val())) {
            error = this.message.replace('{{ field_name }}', String(parse_field_name(field.attr('name'))));
            if (field.attr('data-message-datetime') != '') {
                error = field.attr('data-message-datetime');
            }
        }

        return error;
    }
}
