/**
 * Check if email address is valid
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @constructor
 */
function UberEmailValidationConstraint(field) {
    this.message = 'Value of {{ field_name }} field is not a valid email address.';

    this.validate = function () {
        var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
            error = '';

        if (pattern.test(field.val())) return error;
        error = this.message.replace('{{ field_name }}', String(parse_field_name(field.attr('name'))));
        if (field.attr('data-message-email') !== '') {
            error = field.attr('data-message-email');
        }


        return error;
    };
}
