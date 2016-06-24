/**
 * Created by Work on 6/7/2016.
 */
insuranceTypeEditor = new $.fn.dataTable.Editor(
    {
        ajax: {
            create: '../backend/crud/insurance/type/create', // default method is POST
            edit: {
                type: 'PUT',
                url:  '../backend/crud/insurance/type/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/insurance/type/delete'
            }
        },
        table: "#insuranceType",
        idSrc: "InsuranceTypeId",
        fields: [
            {
                label: "Id:",
                name: "InsuranceTypeId",
                type:  "readonly"
            }, {
                label: "Type:",
                name: "TypeName"
            },  {
                label: "Type (Japanese):",
                name: "TypeDisplay"
            },  {
                label: "Subtype:",
                name: "SubtypeName"
            },  {
                label: "Subtype (Japanese):",
                name: "SubtypeDisplay"
            },  {
                label: "Description:",
                name: "Description"
            },  {
                label: "Region:",
                name: "Region"
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
    $('#insuranceType').dataTable( {
        dom: "lfrtTip",
        "ajax": {
            "url": "../backend/crud/insurance/type/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            { "data": "InsuranceTypeId",edit: false },
            { "data": "TypeName" },
            { "data": "TypeDisplay" },
            { "data": "SubtypeName" },
            { "data": "SubtypeDisplay" },
            { "data": "Description" },
            { "data": "Region" },
            { "data": "UpdateTime",visible: false  },
            { "data": "UpdateUser",visible: false  }
        ],
        select: true,
        buttons: [
                { extend: "create", editor: insuranceTypeEditor },
                { extend: "edit",   editor: insuranceTypeEditor },
                { extend: "remove", editor: insuranceTypeEditor }
        ]
    } );
});