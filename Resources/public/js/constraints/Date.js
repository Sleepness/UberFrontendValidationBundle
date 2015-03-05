/**
 * Check if element value is valid Date value
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @constructor
 */
function UberDateValidationConstraint(field) {
    this.message = 'This {{value}} is not valid date';

    this.validate = function () {
        var pattern = /^(\d{4})-(\d{2})-(\d{2})$/;
        var error = '';
        if (!pattern.test(field.val())) {
            error = this.message.replace('{{value}}', String(parse_field_name(field.attr('name'))));
            if (field.attr('data-message-date') != '') {
                error = field.attr('data-message-date');
            }
        }

        return error;
    }
}
