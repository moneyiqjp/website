var seasontypes = queryIdValMap('../backend/crud/seasontype/all',"SeasonTypeId","Name");
var mileagetypes = getMileageType();
var pointsystems = queryIdValMap('../backend/crud/pointsystem/all',"PointSystemId","PointSystemName");
var stores = queryIdValMap('../backend/crud/store/by/category?categoryid=1',"StoreId","StoreName");
var trips = getTrips();

mileageTypeEditor = new $.fn.dataTable.Editor(
    {
        ajax: {
            create: '../backend/crud/mileage/type/create',
            edit: {
                type: 'PUT',
                url:  '../backend/crud/mileage/type/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/mileage/type/delete'
            }
        },
        table: "#mileagetype",
        idSrc: "MileageTypeId",
        fields: [
            {
                label: "Id:",
                name: "MileageTypeId",
                type:  "readonly"
            }, {
                label: "SeasonType:",
                name: "SeasonType.SeasonTypeId",
                type: "select",
                options: seasontypes
            }, {
                label: "Class:",
                name: "Class"
            }, {
                label: "RoundTrip:",
                name: "RoundTrip"
            }, {
                label: "Ticket Type:",
                name: "TicketType"
            }, {
                label: "TripLength:",
                name: "TripLength"
            }, {
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
mileageEditor = new $.fn.dataTable.Editor(
    {
        ajax: {
            create: '../backend/crud/mileage/create',
            edit: {
                type: 'PUT',
                url:  '../backend/crud/mileage/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/mileage/delete'
            }
        },
        table: "#mileage",
        idSrc: "MileageId",
        fields: [
            {
                label: "Id:",
                name: "MileageId",
                type:  "readonly"
            }, {
                label: "MileageType:",
                name: "MileageType.MileageTypeId",
                type: "select",
                options: mileagetypes
            }, {
                label: "PointSystem:",
                name: "PointSystem.PointSystemId",
                type: "select",
                options: pointsystems
            }, {
                label: "Store:",
                name: "Store.StoreId",
                type: "select",
                options: stores
            }, {
                label: "Trip:",
                name: "Trip.TripId",
                type: "select",
                options: trips
            }, {
                label: "RequiredMiles:",
                name: "RequiredMiles"
            }, {
                label: "ValueInYen:",
                name: "ValueInYen"
            }, {
                label: "Display:",
                name: "Display"
            }, {
                label: "Display (long):",
                name: "DisplayLong"
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
    $('#mileagetype').dataTable( {
        dom: "frtTip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/mileage/type/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            { "data": "MileageTypeId", visible: false },
            { "data": "SeasonType.Name", editField: "SeasonType.SeasonTypeId" },
            { "data": "Class"},
            {
                "data": "RoundTrip",
                render: function (data, type, row) {
                    if (type === 'display') {
                        if(data)
                            return '<input type="checkbox" class="editor-afield" checked readonly>';
                        return '<input type="checkbox" class="editor-afield" readonly>';
                    }
                    return data;
                },
                className: "dt-body-center",
                width: "5"
            },
            { "data": "TicketType" },
            { "data": "TripLength" },
            { "data": "Display" },
            { "data": "UpdateTime", visible: false},
            { "data": "UpdateUser", visible: false }
        ]

        ,tableTools: {
            sRowSelect: "os",
            aButtons: [
                { sExtends: "editor_create", editor: mileageTypeEditor },
                { sExtends: "editor_edit",   editor: mileageTypeEditor },
                { sExtends: "editor_remove", editor: mileageTypeEditor }
            ]
        }

    } );


    $('#mileage').dataTable( {
        dom: "frtTip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/mileage/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            { "data": "MileageId", visible: false },
            { "data": "MileageType", editField: "MileageType.MileageTypeId",
                "render": function ( data, type, full, meta ) {
                    if ( type === 'display' && data!=null ) {
                        return data["SeasonType"]["Name"] + "/"
                            + "/" + data["Class"] + "/" + data["TicketType"];
                    }
                    return data;
                }
            },
            { "data": "PointSystem.PointSystemName", editField: "PointSystem.PointSystemId" },
            { "data": "Store.StoreName", editField: "Store.StoreId" },
            { data: "Trip",
                editField: "Trip.TripId",
                "render": function ( data, type, full, meta ) {
                    if ( type === 'display' && data!=null ) {
                        return data["CityFrom"]["Name"] + "-" + data["CityTo"]["Name"];
                    }
                    return data;
                }
            },
            { "data": "RequiredMiles" },
            { "data": "ValueInYen" },
            { "data": "Display" },
            { "data": "DisplayLong" },
            { "data": "UpdateTime", visible: false},
            { "data": "UpdateUser", visible: false }
        ]

        ,tableTools: {
            sRowSelect: "os",
            aButtons: [
                { sExtends: "editor_create", editor: mileageEditor },
                { sExtends: "editor_edit",   editor: mileageEditor },
                { sExtends: "editor_remove", editor: mileageEditor }
            ]
        }

    } );
});