/**
 * Created by Work on 6/7/2016.
 */
var editor = new $.fn.dataTable.Editor(
    {
        ajax: {
            create: '../backend/crud/issuer/create', // default method is POST
            edit: {
                type: 'PUT',
                url:  '../backend/crud/issuer/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/issuer/delete'
            }
        },
        table: "#issuer",
        idSrc: "IssuerId",
        fields: [
            {
                label: "Id:",
                name: "IssuerId",
                type:  "readonly"
            }, {
                label: "Name:",
                name: "IssuerName"
            },  {
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
    $('#issuer').dataTable( {
        autoWidth: false,
        dom: "BlrtTp",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/issuer/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            { "data": "IssuerId",edit: false, width:"20px" },
            { "data": "IssuerName", width:"200px" },
            { "data": "UpdateTime",visible: false  },
            { "data": "UpdateUser",visible: false }
        ],
        select: true,
        buttons: [
                { extend: "create", editor: editor },
                { extend: "edit",   editor: editor },
                { extend: "remove", editor: editor }
        ]
    } );
});