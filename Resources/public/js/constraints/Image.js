/**
 * Check if element is image
 *
 * @constructor
 */
function UberImageValidationConstraint(field)
{
    this.message = 'This {{value}} is not image!';

    this.validate = function () {
        var error = '';
        if (!field.val() instanceof HTMLImageElement) {
            error = this.message.replace('{{ value }}', String(value));
        }

        return error;
    }
}
