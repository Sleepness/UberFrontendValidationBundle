/**
 * Check if input value is valid URL
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @constructor
 */
function UberUrlValidationConstraint(field) {
    this.message = 'Value of {{ field_name }} field is not a valid URL.';

    this.validate = function () {
        var pattern = /^(https?:\/\/)?((([a-z\d]([a-z\d-]*[a-z\d])*)\.)+[a-z]{2,}|((\d{1,3}\.){3}\d{1,3}))(\:\d+)?(\/[-a-z\d%_.~+]*)*(\?[;&a-z\d%_.~+=-]*)?(\#[-a-z\d_]*)?$/,
            error = '';

        if (pattern.test(field.val())) return error;
        error = this.message.replace('{{ field_name }}', String(parse_field_name(field.attr('name'))));
        if (field.attr('data-message-url') !== '') {
            error = field.attr('data-message-url');
        }

        return error;
    };
}
