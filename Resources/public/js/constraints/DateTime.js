/**
 * Check if element value is valid DateTime value
 *
 * @constructor
 */
function UberDateTimeValidationConstraint()
{
    this.message = 'This {{value}} is not valid DateTime value';

    this.validate = function (value) {
        var pattern = /^(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})$/;
        var errorsList = [];
        if (!pattern.test(value)) {
            errorsList.push(this.message.replace('{{ value }}', String(value)));
        }

        return errorsList;
    }
}
