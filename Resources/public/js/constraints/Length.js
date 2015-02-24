/**
 * Check if field has proper length
 *
 * @constructor
 */
function UberLengthValidationConstraint(field) {

    this.message = 'This {{value}} should not be longer than {{min}} and shorter than {{max}}';

    this.validate = function () {
        var error = '';
        if (field.val().length < field.attr('data-min') || field.val().length > field.attr('data-max')) {
            error = this.message.replace('{{min}}', String(field.attr('data-min')));
            error = error.replace('{{max}}', String(field.attr('data-max')));
            error = error.replace('{{value}}', String(parse_field_name(field.attr('name'))));
        }

        return error;
    }
}