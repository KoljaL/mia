export const showJSON = function(json) {
    // json = json.replace(']', '');
    // json = json.replace('[', '');
    // var result = []
    // for (var i in json) {
    //     result.push([i, json[i]]);
    // }
    // console.log(result)
    return `<pre> ${JSON.stringify(json, null, 4)}</pre>`
}