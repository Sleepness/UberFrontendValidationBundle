/**
 * Check if element is image
 *
 * @constructor
 */
function UberImageValidationConstraint()
{
    this.message = 'This {{value}} is not image!';

    this.validate = function (value) {
        var errorsList = [];
        if (!value instanceof HTMLImageElement) {
            errorsList.push(this.message.replace('{{ value }}', String(value)));
        }

        return errorsList;
    }
}
