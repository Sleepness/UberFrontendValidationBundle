/**
 * Check if field has proper length
 *
 * @constructor
 */
function UberLengthValidationConstraint(field, additional) {

    this.message = 'This {{value}} should not be longer than {{min}} and shorter than {{max}}';

    this.validate = function () {
//        this.message.replace('{{min}}', String(additional['min'])); // @TODO
//        this.message.replace('{{max}}', String(additional['max']));
        var error = this.message.replace('{{value}}', String(field.attr('name')));

        return error;
    }
}
