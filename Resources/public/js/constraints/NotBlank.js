/**
 * Check if field does not empty
 *
 * @constructor
 */
function UberNotBlankValidationConstraint(field) {
    this.message = 'Field {{value}} should not be blank';

    this.validate = function () {
        var error = '';
        if (field.val().length === 0) {
            error = this.message.replace('{{value}}', String(parse_field_name(field.attr('name'))));
        }

        return error;
    }
}
