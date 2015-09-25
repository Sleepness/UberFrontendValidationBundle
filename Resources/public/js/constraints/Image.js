/**
 * Check if element is image
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @constructor
 */
function UberImageValidationConstraint(field) {
    this.message = 'Field {{ field_name }} is not an image.';

    this.validate = function () {
        var error = '';
        var field_id = field.attr('id');
        if (((document.getElementById(field_id).files.length) === 0) || (!fileInput.files[0].fileName.match(/\.(jpg|jpeg|png|gif)$/))) {
            error = this.message.replace('{{ field_name }}', String(parse_field_name(field.attr('name'))));
            if (field.attr('data-message') !== '') {
                error = field.attr('data-message');
            }
        }

        return error;
    };
}
