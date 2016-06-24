/**
 * Created by Work on 5/31/2016.
 */



var cities = queryIdValMap('../backend/crud/city/all',"CityId","Name");
var units = queryIdValMap('../backend/crud/unit/all',"UnitId","Name");
cityEditor = new $.fn.dataTable.Editor(
    {
        ajax: {
            create: '../backend/crud/city/create', // default method is POST
            edit: {
                type: 'PUT',
                url:  '../backend/crud/city/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/city/delete'
            }
        },
        table: "#cities",
        idSrc: "CityId",
        fields: [
            {
                label: "Id:",
                name: "CityId",
                type:  "readonly"
            },  {
                label: "Name:",
                name: "Name"
            },   {
                label: "Region:",
                name: "Region"
            },{
                label: "Display",
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

tripEditor = new $.fn.dataTable.Editor(
    {
        ajax: {
            create: '../backend/crud/trip/create', // default method is POST
            edit: {
                type: 'PUT',
                url:  '../backend/crud/trip/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/trip/delete'
            }
        },
        table: "#trips",
        idSrc: "TripId",
        fields: [
            {
                label: "Id:",
                name: "TripId",
                type:  "readonly"
            }, {
                label: "From:",
                name: "CityFrom.CityId",
                type: "select",
                options: cities
            }, {
                label: "To:",
                name: "CityTo.CityId",
                type: "select",
                options: cities
            }, {
                label: "Distance:",
                name: "Distance"
            }, {
                label: "Unit:",
                name: "Unit.UnitId",
                type: "select",
                options: units
            },  {
                label: "Display:",
                name: "Display"
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
    $('#cities').dataTable({
        dom: "Bfrtip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/city/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "CityId", visible: false},
            {"data": "Name"},
            {"data": "Region"},
            {"data": "Display"},
            {"data": "UpdateTime", visible: false},
            {"data": "UpdateUser", visible: false}
        ],
        select: true,
        buttons: [
            {extend: "create", editor: cityEditor},
            {extend: "edit", editor: cityEditor},
            {extend: "remove", editor: cityEditor}
        ]
    });

    $('#trips').dataTable( {
        dom: "Bfrtip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/trip/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            { data: "TripId", visible: false },
            { data: "CityFrom.Name", editField: "CityFrom.CityId" },
            { data: "CityTo.Name", editField: "CityFrom.CityId" },
            { data: "Distance" },
            { data: "Display" },
            { data: "Unit.Name",   editField: "Unit.UnitId" },
            { data: "UpdateTime", visible: false},
            { data: "UpdateUser", visible: false }
        ],
        select: true,
        buttons: [
                { extend: "create", editor: tripEditor },
                { extend: "edit",   editor: tripEditor },
                { extend: "remove", editor: tripEditor }
        ]
    } );


});