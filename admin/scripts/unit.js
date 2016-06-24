unitEditor = new $.fn.dataTable.Editor( {
    ajax: {
        create: '../backend/crud/unit/create', // default method is POST
        edit: {
            type: 'PUT',
            url:  '../backend/crud/unit/update'
        },
        remove: {
            type: 'DELETE',
            url: '../backend/crud/unit/delete'
        }
    },
    table: "#units",
    idSrc: "UnitId",
    fields: [
        {
            label: "Id:",
            name: "UnitId",
            type:  "readonly"
        }, {
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
    $('#units').dataTable({
        dom: "Bfrtip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/unit/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "UnitId", edit: false},
            {"data": "Name"},
            {"data": "Description"},
            {"data": "UpdateTime", edit: false, visible: false},
            {"data": "UpdateUser", visible: false}
        ],
        select: true,
        buttons: [
                {extend: "create", editor: unitEditor},
                {extend: "edit", editor: unitEditor},
                {extend: "remove", editor: unitEditor}
        ]
    });
});