/**
 * Check if element is a file
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @constructor
 */
function UberFileValidationConstraint(field) {
    this.message = 'Field {{ field_name }} should be a file.';

    this.validate = function () {
        var field_id = field.attr('id'),
            error = '';

        if (((document.getElementById(field_id).files.length) === 0) || field.val() === '') {
            error = this.message.replace('{{ field_name }}', String(parse_field_name(field.attr('name'))));
            if (field.attr('data-message') !== '') {
                error = field.attr('data-message');
            }
        } else {
            var chosenFileSize = document.getElementById(field_id).files[0].size,
                definedFileSize = field.attr('data-maxsize');

            if (chosenFileSize > definedFileSize) {
                error = field.attr('data-size-message');
                chosenFileSize = bytesToMetric(chosenFileSize);
                definedFileSize = bytesToMetric(definedFileSize);
                error = error.replace('{{ size }}', chosenFileSize[0]);
                error = error.replace('{{ suffix }}', chosenFileSize[1]);
                error = error.replace('{{ limit }}', definedFileSize[0]);
                error = error.replace('{{ suffix }}', definedFileSize[1]);
            }
        }

        return error;
    };
}

/**
 * Convert file bytes
 *
 * @param bytes
 * @returns {*[]}
 */
function bytesToMetric(bytes) {
    var sizes = ['bytes', 'kB', 'MB', 'GB', 'TB'];
    if (bytes === 0) return [0, 'byte'];
    var k = 1000,
        i = Math.floor(Math.log(bytes) / Math.log(k));

    return [(bytes / Math.pow(k, i)).toPrecision(3), sizes[i]];
}
