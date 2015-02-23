/**
 * Check if field has proper length
 *
 * @constructor
 */
function UberLengthValidationConstraint(field, additional) {

    this.message = 'This {{value}} should not be longer than {{min}} and shorter than {{max}}';

    this.validate = function () {
        var error = '';
        if (field.val().length < additional['min'] || field.val().length > additional['max']) {
            error = this.message.replace('{{min}}', String(additional['min']));
            error = error.replace('{{max}}', String(additional['max']));
            error = error.replace('{{value}}', String(parse_field_name(field.attr('name'))));
        }

        return error;
    }
}
