/**
 * Check if element is file
 *
 * @constructor
 */
function UberFileValidationConstraint()
{
    this.message = 'This {{value}} must be a file!';

    this.validate = function (value) {
        var errorsList = [];
        if (!value instanceof File) {
            errorsList.push(this.message.replace('{{ value }}', String(value)));
        }

        return errorsList;
    }
}
