/**
 * Created by Work on 6/9/2016.
 */
restrictionTypeEditor = new $.fn.dataTable.Editor(
    {
        ajax: {
            create: '../backend/crud/restriction/type/create', // default method is POST
            edit: {
                type: 'PUT',
                url:  '../backend/crud/restriction/type/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/restriction/type/delete'
            }
        },
        table: "#restrictionType",
        idSrc: "RestrictionTypeId",
        fields: [
            {
                label: "Id:",
                name: "RestrictionTypeId",
                type:  "readonly"
            }, {
                label: "Name:",
                name: "Name"
            }, {
                label: "Description:",
                name: "Description"
            }, {
                label: "Display:",
                name: "Display"
            }, {
                label: "Path:",
                name: "Path"
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

$(document).ready(function() {
    $('#restrictionType').dataTable({
        dom: "BrtTip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/restriction/type/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "RestrictionTypeId", edit: false},
            {"data": "Name", width: "15%"},
            {"data": "Description", width: "25%"},
            {"data": "Display", width: "30%"},
            {"data": "Path", width: "30%"},
            {"data": "UpdateTime", edit: false, visible: false},
            {"data": "UpdateUser", visible: false}
        ],
        select: true,
        buttons: [
                {extend: "create", editor: restrictionTypeEditor},
                {extend: "edit", editor: restrictionTypeEditor},
                {extend: "remove", editor: restrictionTypeEditor}
        ]
    });
});