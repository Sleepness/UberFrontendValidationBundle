/**
 * Check if element not null
 *
 * @constructor
 */
function UberNullValidationConstraint()
{
    this.message = 'This {{value}} cannot be null';

    this.validate = function (value) {
        var errorsList = [];
        if (value === null) {
            errorsList.push(this.message.replace('{{ value }}', String(value)));
        }

        return errorsList;
    }
}
