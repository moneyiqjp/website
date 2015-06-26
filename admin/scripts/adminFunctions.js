/**
 * Created by Work on 2015/06/26.
 */

function adminGetissuers() {
    var values = [];
    var tmp = $.ajax({
        url: '../backend/display/issuers',
        data: {
            format: 'json',
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        type: 'GET',
        async: false
    }).responseText;

    if(tmp) {
        values = JSON.parse(tmp);
    }

    return values;
}