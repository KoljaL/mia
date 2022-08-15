/**
 * showJSON(JSON)
 * 
 * just a little helper to display a JSON object as formatted HTML
 * 
 * @param object  JSON
 * @return HTML element `<pre>...</pre>`
 */

export const showJSON = function(json) {
    return `<pre> ${JSON.stringify(json, null, 4)}</pre>`
}