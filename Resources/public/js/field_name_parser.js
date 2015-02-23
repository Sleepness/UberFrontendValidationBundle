/**
 * Return pure field name without
 *
 * @param name
 * @returns {*}
 */
function parse_field_name(name) {
//    var regExp = /\(([^)]+)\)/;
    var matches = name.match(/\[(.*?)\]/);

       return matches[1];


}
