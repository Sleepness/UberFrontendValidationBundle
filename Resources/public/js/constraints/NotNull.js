/**
 * Check if element is not equal to null
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @author Alexandr Zhulev <alexandrzhulev@gmail.com>
 * @constructor
 */
function UberNotNullValidationConstraint(field) {
    this.message = 'This {{value}} should not be null';

    this.validate = function () {
        var error = '';
        if (field.val() === null) {
            error = this.message.replace('{{value}}', String(parse_field_name(field.attr('name'))));
            if (field.attr('data-message') != '') {
                error = field.attr('data-message');
            }
        }

        return error;
    }
}
