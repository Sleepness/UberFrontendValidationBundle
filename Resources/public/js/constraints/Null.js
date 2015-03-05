/**
 * Check if element is equal to null
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @author Alexandr Zhulev <alexandrzhulev@gmail.com>
 * @constructor
 */
function UberNullValidationConstraint(field) {
    this.message = 'Field {{ field_name }} should be null.';

    this.validate = function () {
        var error = '';
        if (field.val() !== null) {
            error = this.message.replace('{{ field_name }}', String(parse_field_name(field.attr('name'))));
            if (field.attr('data-message-null') != '') {
                error = field.attr('data-message-null');
            }
        }

        return error;
    }
}
