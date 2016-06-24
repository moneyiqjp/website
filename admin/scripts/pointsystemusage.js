/**
 * Created by Work on 6/12/2016.
 */
var stores = getStores();
$(document).ready(function () {
    var pointSystemId = getQueryVariable("id");
    var  pointUsageEditor = new $.fn.dataTable.Editor(
        {
            ajax: {
                create: '../backend/crud/pointusage/create', // default method is POST
                edit: {
                    type: 'PUT',
                    url:  '../backend/crud/pointusage/update'
                },
                remove: {
                    type: 'DELETE',
                    url: '../backend/crud/pointusage/delete'
                }
            },
            table: "#pointUsageTable",
            idSrc: "PointUsageId",
            fields: [
                {
                    label: "Id:",
                    name: "PointUsageId",
                    type:  "readonly"
                },{
                    label: "PointSystem:",
                    name: "PointSystem.Id",
                    type:  "readonly",
                    def: pointSystemId
                }, {
                    label: "YenPerPoint:",
                    name: "YenPerPoint",
                    def: 1.0
                }, {
                    label: "Category/Store:",
                    name: "Store.Id",
                    type:  "select",
                    options: stores
                }, {
                    label: "Reference",
                    name:  "Reference",
                    type:"EditAndLink"
                }, {
                    label: "Update date:",
                    name: "UpdateTime",
                    type: "readonly"
                }, {
                    label: "Update user:",
                    name: "UpdateUser"
                }
            ]
        });

    $('#pointUsageTable').dataTable({
        dom: "BrtT",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/pointusage/by/pointsystem?Id=" + pointSystemId,
            "type": "GET",
                "contentType": "application/json; charset=utf-8",
                "dataType": "json"
        },
        "columns": [
            {"data": "PointUsageId",width:1},
            {"data": "PointSystem.Id", visible: false,width:1},

            {"data": "Store.Id",width:1,visible: false},
            {"data": "Store.Name",width:1},
            {"data": "YenPerPoint",width:2},
            {"data": "Reference", visible:false},
            {"data": "UpdateTime", visible:false,width:2},
            {"data": "UpdateUser",  visible:false,width:2}
        ],
        select: true,
        buttons: [
                {extend: "create", editor: pointUsageEditor},
                {extend: "edit", editor: pointUsageEditor},
                {extend: "remove", editor: pointUsageEditor}
            ]
});

});
