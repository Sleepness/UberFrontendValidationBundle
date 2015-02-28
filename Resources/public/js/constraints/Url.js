/**
 * Check if input value is valid URL
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @constructor
 */
function UberUrlValidationConstraint(field) {
    this.message = 'This {{value}} is not valid URL';

    this.validate = function () {
        var error = '';
        var pattern = ''; // need to be implemented reg exp for url validation
        if (!pattern.test(field.val())) {
            error = this.message.replace('{{value}}', String(parse_field_name(field.attr('name'))));
            if (field.attr('data-message') != '') {
                error = field.attr('data-message');
            }
        }

        return error;
    }
}
