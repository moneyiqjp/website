var pointsystems = queryIdValMap('../backend/crud/pointsystem/all',"PointSystemId","PointSystemName");
var zones = queryIdValMap('../backend/crud/zone/all',"ZoneId","Name");
var trips = getTrips();

zoneEditor = new $.fn.dataTable.Editor(
    {
        ajax: {
            create: '../backend/crud/zone/create',
            edit: {
                type: 'PUT',
                url:  '../backend/crud/zone/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/zone/delete'
            }
        },
        table: "#zone",
        idSrc: "ZoneId",
        fields: [
            {
                label: "Id:",
                name: "ZoneId",
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
                label: "Display:",
                name: "Display"
            }, /*{
             label: "Reference:",
             name: "Reference",
             type: "EditAndLink"
             }, */{
                label: "Update date:",
                name: "UpdateTime",
                type: "readonly"
            }, {
                label: "Update user:",
                name: "UpdateUser"
            }
        ]
    });


zoneTripMapEditor = new $.fn.dataTable.Editor(
    {
        ajax: {
            create: '../backend/crud/zonetripmap/create',
            edit: {
                type: 'PUT',
                url:  '../backend/crud/zonetripmap/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/zonetripmap/delete'
            }
        },
        table: "#zonetripmap",
        idSrc: "ZoneTripMapId",
        fields: [
            {
                label: "Id:",
                name: "ZoneTripMapId",
                type:  "readonly"
            }, {
                label: "Zone:",
                name: "Zone.ZoneId",
                type: "select",
                options: zones
            }, {
                label: "Trip:",
                name: "Trip.TripId",
                type: "select",
                options: trips
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
$('#zone').dataTable( {
    dom: "Bfrtip",
    "pageLength": 25,
    "ajax": {
        "url": "../backend/crud/zone/all",
        "type": "GET",
        "contentType": "application/json; charset=utf-8",
        "dataType": "json"
    },
    "columns": [
        { data: "ZoneId", visible: false },
        { data: "PointSystem.PointSystemName", editField: "PointSystem.PointSystemId" },
        { data: "Name" },
        { data: "Display" },
        { data: "UpdateTime", visible: false},
        { data: "UpdateUser", visible: false }
    ],
    select: true,
    buttons: [
        { extend: "create", editor: zoneEditor },
        { extend: "edit",   editor: zoneEditor },
        { extend: "remove", editor: zoneEditor }
    ]
} );

$('#zonetripmap').dataTable( {
    dom: "Bfrtip",
    "pageLength": 25,
    "ajax": {
        "url": "../backend/crud/zonetripmap/all",
        "type": "GET",
        "contentType": "application/json; charset=utf-8",
        "dataType": "json"
    },
    "columns": [
        { data: "ZoneTripMapId", visible: false },
        { data: "Zone.Name", editField: "Zone.ZoneId" },
        { data: "Trip",
            editField: "Trip.TripId",
            "render": function ( data, type, full, meta ) {
                if ( type === 'display' && data!=null ) {
                    return data["CityFrom"]["Name"] +  "<->" + data["CityTo"]["Name"];
                    /*
                     roundtrip = "one way";
                     if(data["MileageType"]["RoundTrip"]) {roundtrip="round trip"}
                     return data["MileageType"]["Class"] + "-" + data["MileageType"]["Season"] + "-" + roundtrip;
                     */
                }
                return data;
            }
        },
        { data: "UpdateTime", visible: false},
        { data: "UpdateUser", visible: false }
    ],
    select: true,
    buttons: [
        { extend: "create", editor: zoneTripMapEditor },
        { extend: "remove", editor: zoneTripMapEditor }
    ]
} );


});