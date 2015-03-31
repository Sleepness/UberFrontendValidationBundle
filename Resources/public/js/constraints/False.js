/**
 * Check if element value is false
 *
 * @author Alexandr Zhulev <alexandrzhulev@gmail.com>
 * @constructor
 */
function UberFalseValidationConstraint(field) {
    this.message = 'Value of {{ field_name }} field should be FALSE.';

    this.validate = function () {
        var error = '';
        if (field.val() != false) {
            error = this.message.replace('{{ field_name }}', String(parse_field_name(field.attr('name'))));
            if (field.attr('data-message-false') != '') {
                error = field.attr('data-message-false');
            }
        }

        return error;
    }
}
