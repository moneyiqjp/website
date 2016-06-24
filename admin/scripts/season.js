
var seasons = queryIdValMap('../backend/crud/season/all',"SeasonId","Name");
var zones = queryIdValMap('../backend/crud/zone/all',"ZoneId","Name");
var pointsystems  = queryIdValMap('../backend/crud/pointsystem/all',"PointSystemId","PointSystemName");
var seasontypes  = queryIdValMap('../backend/crud/seasontype/all',"SeasonTypeId","Name");

seasonDateEditor = new $.fn.dataTable.Editor(
    {
        ajax: {
            create: '../backend/crud/seasondate/create',
            edit: {
                type: 'PUT',
                url:  '../backend/crud/seasondate/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/seasondate/delete'
            }
        },
        table: "#seasondate",
        idSrc: "SeasonDateId",
        fields: [
            {
                label: "Id:",
                name: "SeasonDateId",
                type:  "readonly"
            }, {
                label: "Season:",
                name: "Season.SeasonId",
                type: "select",
                options: seasons
            }, {
                label: "Zone:",
                name: "Zone.ZoneId",
                type: "select",
                options: zones
            }, {
                label: "From:",
                name: "From",
                type: "date"
            }, {
                label: "To:",
                name: "To",
                type: "date"
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


seasonTypeEditor = new $.fn.dataTable.Editor(
    {
        ajax: {
            create: '../backend/crud/seasontype/create',
            edit: {
                type: 'PUT',
                url:  '../backend/crud/seasontype/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/seasontype/delete'
            }
        },
        table: "#seasontype",
        idSrc: "SeasonTypeId",
        fields: [
            {
                label: "Id:",
                name: "SeasonTypeId",
                type:  "readonly"
            }, {
                label: "Name:",
                name: "Name"
            }, {
                label: "Display:",
                name: "Display"
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


seasonEditor = new $.fn.dataTable.Editor(
    {
        ajax: {
            create: '../backend/crud/season/create',
            edit: {
                type: 'PUT',
                url:  '../backend/crud/season/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/season/delete'
            }
        },
        table: "#seasons",
        idSrc: "SeasonId",
        fields: [
            {
                label: "Id:",
                name: "SeasonId",
                type:  "readonly"
            }, {
                label: "PointSystem:",
                name: "PointSystem.PointSystemId",
                type: "select",
                options: pointsystems
            }, {
                label: "Name:",
                name: "Name"
            }, {
                label: "Type:",
                name: "Type.SeasonTypeId",
                type: "select",
                options: seasontypes
            }, {
                label: "Display:",
                name: "Display"
            }, {
                label: "Reference:",
                name: "Reference",
                type: "EditAndLink"
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

    $('#seasontype').dataTable( {
        dom: "Bfrtip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/seasontype/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            { data: "SeasonTypeId", visible: false },
            { data: "Name" },
            { data: "Display" },
            { data: "UpdateTime", visible: false},
            { data: "UpdateUser", visible: false },
            { data: "UpdateUser", visible: false}
        ],
        select: true,
        buttons: [
                { extend: "create", editor: seasonTypeEditor },
                { extend: "edit",   editor: seasonTypeEditor },
                { extend: "remove", editor: seasonTypeEditor }
        ]
    } );



    $('#seasons').dataTable( {
        dom: "Bfrtip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/season/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            { data: "SeasonId", visible: false },
            { data: "PointSystem.PointSystemName", editField: "PointSystem.PointSystemId" },
            { data: "Name" },
            { data: "Type.Name", editField: "Type.SeasonTypeId" },
            { data: "Display" },
            { data: "Reference" },
            { data: "UpdateTime", visible: false},
            { data: "UpdateUser", visible: false },
            { data: "UpdateUser", visible: false}
        ],
        select: true,
        buttons: [
                { extend: "create", editor: seasonEditor },
                { extend: "edit",   editor: seasonEditor },
                { extend: "remove", editor: seasonEditor }
        ]
    } );

    $('#seasondate').dataTable( {
        dom: "Bfrtip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/seasondate/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            { data: "SeasonDateId", visible: false },
            { data: "Season.Name", editField:"Season.SeasonId" },
            { data: "Zone.Name", editField:"Zone.ZoneId" },
            { data: "From" },
            { data: "To" },
            { data: "UpdateTime", visible: false},
            { data: "UpdateUser", visible: false},
            { data: "UpdateUser", visible: false}
        ],
        select: true,
        buttons: [
                { extend: "create", editor: seasonDateEditor },
                { extend: "edit",   editor: seasonDateEditor },
                { extend: "remove", editor: seasonDateEditor }
        ]
    } );

});