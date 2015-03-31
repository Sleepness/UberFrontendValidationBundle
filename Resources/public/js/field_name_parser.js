/**
 * Return pure field name
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 * @param name
 * @returns {*}
 */
function parse_field_name(name) {
    var matches = name.match(/\[(.*?)\]/);

    return matches[1];
}
