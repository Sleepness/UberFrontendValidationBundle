/**
 * Check if field does not empty
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @constructor
 */
function UberNotBlankValidationConstraint(field) {
    this.message = 'Field {{value}} should not be blank';

    this.validate = function () {
        var error = '';
        if (field.val().length === 0) {
            error = this.message.replace('{{value}}', String(parse_field_name(field.attr('name'))));
            if (field.attr('data-message') != '') {
                error = field.attr('data-message');
            }
        }

        return error;
    }
}
