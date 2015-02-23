/**
 * Check if element is file
 *
 * @constructor
 */
function UberFileValidationConstraint(field)
{
    this.message = 'This {{value}} must be a file!';

    this.validate = function () {
        var error = '';
        if (!field.val() instanceof File) {
            error = this.message.replace('{{value}}', String(parse_field_name(field.attr('name'))));
        }

        return error;
    }
}
