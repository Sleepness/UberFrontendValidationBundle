/**
 * Check if field is empty
 *
 * @author Alexandr Zhulev <alexandrzhulev@gmail.com>
 * @constructor
 */
function UberBlankValidationConstraint(field) {
    this.message = 'Field {{value}} should be blank';

    this.validate = function () {
        var error = '';
        if (field.val().length > 0) {
            error = this.message.replace('{{value}}', String(parse_field_name(field.attr('name'))));
            if (field.attr('data-message-blank') != '') {
                error = field.attr('data-message-blank');
            }
        }

        return error;
    }
}
