/**
 * Check if field does not empty
 *
 * @constructor
 */
function UberBlankValidationConstraint()
{
    this.message = 'This {{value}} should not be blank';

    this.validate = function (value) {
        var errorsList = [];
        if (value.length === 0) {
            errorsList.push(this.message.replace('{{ value }}', String(value)));
        }

        return errorsList;
    }
}
