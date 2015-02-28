/**
 * Check if element not null
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @constructor
 */
function UberNullValidationConstraint(field) {
    this.message = 'This {{value}} cannot be null';

    this.validate = function () {
        var error = '';
        if (field.val() === null) {
            error = this.message.replace('{{value}}', String(parse_field_name(field.attr('name'))));
        }

        return error;
    }
}
