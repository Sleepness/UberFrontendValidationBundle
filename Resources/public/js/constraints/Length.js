/**
 * Check if field has proper length
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @constructor
 */
function UberLengthValidationConstraint(field) {
    this.message = 'Field {{ field_name }} should have more than {{ min }} characters and less than {{ max }} characters.';

    this.validate = function () {
        var error = '',
            definedDataMin = field.attr('data-min'),
            definedDataMax = field.attr('data-max'),
            fieldName = parse_field_name(field.attr('name')),
            fieldLength = field.val().length;

        if (fieldLength < definedDataMin) {
            error = this.message.replace('{{ min }}', definedDataMin);
            error = error.replace('{{ max }}', definedDataMax);
            error = error.replace('{{ field_name }}', fieldName);
            if (field.attr('data-min-message')) {
                error = field.attr('data-min-message');
            }
        }

        if (fieldLength > definedDataMax) {
            error = this.message.replace('{{ min }}', definedDataMin);
            error = error.replace('{{ max }}', definedDataMax);
            error = error.replace('{{ field_name }}', fieldName);
            if (field.attr('data-max-message')) {
                error = field.attr('data-max-message');
            }
        }

        if (definedDataMin == definedDataMax && fieldLength != definedDataMin) {
            error = 'Field ' + fieldName + ' should have exactly ' + definedDataMin + ' character(s)';
            if (field.attr('data-exact-message')) {
                error = field.attr('data-exact-message');
            }
        }

        return error;
    };
}
