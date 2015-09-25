/**
 * Check if field does not empty
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @constructor
 */
function UberNotBlankValidationConstraint(field) {
    this.message = 'Field {{ field_name }} should not be blank.';

    this.validate = function () {
        var error = '';

        if (field.val().length !== 0) return error;
        error = this.message.replace('{{ field_name }}', String(parse_field_name(field.attr('name'))));
        if (field.attr('data-message-notblank') !== '') {
            error = field.attr('data-message-notblank');
        }

        return error;
    };
}
