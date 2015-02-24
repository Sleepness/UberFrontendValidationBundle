/**
 * Check if email address is valid
 *
 * @constructor
 */
function UberEmailValidationConstraint(field)
{
    this.message = 'Value of {{value}} field is not a valid email address';

    this.validate = function () {
        var error = '';
        var pattern = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
        if (!pattern.test(field.val())) {
            error = this.message.replace('{{value}}', String(parse_field_name(field.attr('name'))));
        }

        return error;
    }
}
