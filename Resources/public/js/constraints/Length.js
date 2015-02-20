/**
 * Check if field has proper length
 *
 * @constructor
 */
function UberLengthValidationConstraint() {
    this.message = 'This {{value}} should not be longer than {{}} and shorter thatn {{}}';

    this.validate = function (value) {
        var errorsList = [];
        errorsList.push(this.message.replace('{{ value }}', String(value)));

        return errorsList;
    }
}
