/**
 * Check if element value is not equal to specific value
 *
 * @author Alexandr Zhulev <alexandrzhulev@gmail.com>
 * @constructor
 */
function UberNotEqualToValidationConstraint(field) {
    this.message = 'Field {{ field_name }} should not be equal to {{ compared_value }}.';

    this.validate = function () {
        var error = '';
        if (field.val() == field.attr('data-value-notequalto')) {
            error = this.message.replace('{{ field_name }}', String(parse_field_name(field.attr('name'))));
            error = error.replace('{{ compared_value }}', field.attr('data-value-notequalto'));
            if (field.attr('data-message-notequalto')) {
                error = field.attr('data-message-notequalto');
                error = error.replace('{{ compared_value }}', field.attr('data-value-notequalto'));
            }
        }

        return error;
    }
}
