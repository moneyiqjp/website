/**
 * Created by Work on 6/7/2016.
 */
featureTypeEditor = new $.fn.dataTable.Editor(
    {
        ajax: {
            create: '../backend/crud/feature/type/create', // default method is POST
            edit: {
                type: 'PUT',
                url:  '../backend/crud/feature/type/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/feature/type/delete'
            }
        },
        table: "#featureType",
        idSrc: "FeatureTypeId",
        fields: [
            {
                label: "Id:",
                name: "FeatureTypeId",
                type:  "readonly"
            }, {
                label: "Type:",
                name: "Name"
            },   {
                label: "Description:",
                name: "Description"
            },  {
                label: "Category:",
                name: "Category"
            }, {
                label: "Foreground Color:",
                name: "ForegroundColor"
            }, {
                label: "Background Color:",
                name: "BackgroundColor"
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
    $('#featureType').dataTable( {//BTfrtip
        dom: "BlfrtTip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/feature/type/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            { "data": "FeatureTypeId",edit: false },
            { "data": "Name" },
            { "data": "Description" },
            { "data": "Category" },
            { "data": "ForegroundColor" },
            { "data": "BackgroundColor" },
            { "data": "UpdateTime",edit: false, visible: false  },
            { "data": "UpdateUser", visible: false }
    ],
    select: true,
        buttons: [
                { extend: "create", editor: featureTypeEditor },
                { extend: "edit",   editor: featureTypeEditor },
                { extend: "remove", editor: featureTypeEditor }
    ]

    } );
});