/**
 * Created by Work on 6/9/2016.
 */

storeCategoryEditor = new $.fn.dataTable.Editor(
    {
        ajax: {
            create: '../backend/crud/storecategory/create', // default method is POST
            edit: {
                type: 'PUT',
                url:  '../backend/crud/storecategory/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/storecategory/delete'
            }
        },
        table: "#categories",
        idSrc: "StoreCategoryId",
        fields: [
            {
                label: "Id:",
                name: "StoreCategoryId",
                type:  "readonly"
            },  {
                label: "Name:",
                name: "Name"
            },   {
                label: "Description:",
                name: "Description"
            },{
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

    $('#categories').dataTable( {
        dom: "BfrtTip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/storecategory/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            { "data": "StoreCategoryId", visible: false },
            { "data": "Name" },
            { "data": "Description" },
            { "data": "UpdateTime", visible: false},
            { "data": "UpdateUser", visible: false }
        ],
        select: true,
        buttons: [
                { extend: "create", editor: storeCategoryEditor },
                { extend: "edit",   editor: storeCategoryEditor },
                { extend: "remove", editor: storeCategoryEditor }
        ]
    } );
});

