/**
 * Check if email address is valid
 *
 * @constructor
 */
function UberEmailValidationConstraint()
{
    this.message = 'This {{value}} is not a valid email address';

    this.validate = function (value) {
        var errorsList = [];
        var pattern = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
        if (!pattern.test(value)) {
            errorsList.push(this.message.replace('{{ value }}', String(value)));
        }

        return errorsList;
    }
}
