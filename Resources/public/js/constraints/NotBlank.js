/**
 * Check if field does not empty
 *
 * @constructor
 */
function UberNotBlankValidationConstraint(field, additional)
{
    this.message = 'Field {{value}} should not be blank';

    this.validate = function () {
        var errorsList = [];
        if (field.val().length === 0) {
            errorsList.push(this.message.replace('{{value}}', String(field.attr('name'))));
        }

        return errorsList;
    }
}
