/**
 * Check if field has proper length
 *
 * @constructor
 */
function UberLengthValidationConstraint(field, additional) {

    this.message = 'This {{value}} should not be longer than {{min}} and shorter than {{max}}';

    this.validate = function () {
        var errorsList = [];
        this.message.replace('{{value}}', String(field.attr('name')));
        this.message.replace('{{min}}', String(additional['min']));
        this.message.replace('{{max}}', String(additional['max']));
        errorsList.push(this.message);

        return errorsList;
    }
}
