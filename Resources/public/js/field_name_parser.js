/**
 * Return pure field name without
 *
 * @param name
 * @returns {*}
 */
function parse_field_name(name) {
    var matches = name.match(/\[(.*?)\]/);

    return matches[1];
}
