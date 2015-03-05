/**
 * Check if field has proper length
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @constructor
 */
function UberLengthValidationConstraint(field) {
    this.message = 'Field {{ field_name }} should have more than {{ min }} characters and less than {{ max }} characters.';

    this.validate = function () {
        var error = '';
        var preparedMaxMessage = '';

        if (field.val().length < field.attr('data-min')) {
            error = this.message.replace('{{ min }}', String(field.attr('data-min')));
            error = error.replace('{{ max }}', String(field.attr('data-max')));
            error = error.replace('{{ field_name }}', String(parse_field_name(field.attr('name'))));
            if (field.attr('data-min-message')) {
                error = field.attr('data-min-message');
            }
        }

        if (field.val().length > field.attr('data-max')) {
            error = this.message.replace('{{ min }}', String(field.attr('data-min')));
            error = error.replace('{{ max }}', String(field.attr('data-max')));
            error = error.replace('{{ field_name }}', String(parse_field_name(field.attr('name'))));
            if (field.attr('data-min-message') && field.attr('data-max-message')) {
                preparedMaxMessage = (field.attr('data-max-message')).split('|')[0];
                error = preparedMaxMessage.replace('{{ limit }}', field.attr('data-max'));
            }
        }

        return error;
    }
}
