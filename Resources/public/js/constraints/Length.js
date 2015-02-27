/**
 * Check if field has proper length
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
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
            if (field.attr('data-min-message') && field.attr('data-max-message')) {
                error = field.attr('data-min-message') + field.attr('data-max-message');
            }
        }

        return error;
    }
}
