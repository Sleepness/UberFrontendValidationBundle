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
        var field_id = field.attr('id');
        if (((document.getElementById(field_id).files.length) == 0) || field.val() == '') {
            error = this.message.replace('{{value}}', String(parse_field_name(field.attr('name'))));
        }

        return error;
    }
}
