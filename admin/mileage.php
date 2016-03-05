<html>
<head>
    <meta charset="utf-8">
    <title>MoneyIQ Stores</title>
    <link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.css">
    <script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/tabletools/2.2.3/css/dataTables.tableTools.css">
    <link rel="stylesheet" type="text/css" href="media/css/dataTables.editor.css">
    <link rel="stylesheet" type="text/css" href="media/css/admin_editor.css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">

    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/tabletools/2.2.3/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" language="javascript" src="scripts/dataTables.editor.js"></script>
    <script type="text/javascript" language="javascript" src="scripts/datatables_ext.js"></script>
    <script type="text/javascript" language="javascript" class="init">
        var cities = [];
        var units = [];
        var trips = [];
        var stores = [];
        var pointsystems = [];
        var mileagetypes = [];
        var seasontypes = [];
        var zones = [];
        var seasons = [];
        var tmpStore;
        var index;
        var jason;

        var tmp = $.ajax({
            url: '../backend/crud/city/all',
            data: {
                format: 'json',
                "contentType": "application/json; charset=utf-8",
                "dataType": "json"
            },
            type: 'GET',
            async: false
        }).responseText;

        if(tmp) {
            jason = JSON.parse(tmp);
            if(jason["data"]!=undefined) {
                tmpStore = jason["data"];
                for (index = 0; index < tmpStore.length; ++index) {
                    cities.push({
                        value: tmpStore[index]["CityId"],
                        label: tmpStore[index]["Name"]
                    })
                }
            }
        }

        tmp = $.ajax({
            url: '../backend/crud/unit/all',
            data: {
                format: 'json',
                "contentType": "application/json; charset=utf-8",
                "dataType": "json"
            },
            type: 'GET',
            async: false
        }).responseText;

        if(tmp) {
            jason = JSON.parse(tmp);
            if(jason["data"]!=undefined) {
                tmpStore = jason["data"];
                for (index = 0; index < tmpStore.length; ++index) {
                    units.push({
                        value: tmpStore[index]["UnitId"],
                        label: tmpStore[index]["Name"]
                    })
                }
            }
        }


        tmp = $.ajax({
            url: '../backend/crud/trip/all',
            data: {
                format: 'json',
                "contentType": "application/json; charset=utf-8",
                "dataType": "json"
            },
            type: 'GET',
            async: false
        }).responseText;

        if(tmp) {
            jason = JSON.parse(tmp);
            if(jason["data"]!=undefined) {
                tmpStore = jason["data"];
                for (index = 0; index < tmpStore.length; ++index) {
                    trips.push({
                        value: tmpStore[index]["TripId"],
                        label: tmpStore[index]["CityFrom"]["Name"] + "-" + tmpStore[index]["CityTo"]["Name"]
                    })
                }
            }
        }

        tmp = $.ajax({
            url: '../backend/crud/store/by/category?categoryid=1',
            data: {
                format: 'json',
                "contentType": "application/json; charset=utf-8",
                "dataType": "json"
            },
            type: 'GET',
            async: false
        }).responseText;

        if(tmp) {
            jason = JSON.parse(tmp);
            if(jason["data"]!=undefined) {
                tmpStore = jason["data"];
                for (index = 0; index < tmpStore.length; ++index) {
                    stores.push({
                        value: tmpStore[index]["StoreId"],
                        label: tmpStore[index]["StoreName"]
                    })
                }
            }
        }

        tmp = $.ajax({
            url: '../backend/crud/pointsystem/all',
            data: {
                format: 'json',
                "contentType": "application/json; charset=utf-8",
                "dataType": "json"
            },
            type: 'GET',
            async: false
        }).responseText;

        if(tmp) {
            jason = JSON.parse(tmp);
            if(jason["data"]!=undefined) {
                tmpStore = jason["data"];
                for (index = 0; index < tmpStore.length; ++index) {
                    pointsystems.push({
                        value: tmpStore[index]["PointSystemId"],
                        label: tmpStore[index]["PointSystemName"]
                    })
                }
            }
        }

        tmp = $.ajax({
            url: '../backend/crud/season/all',
            data: {
                format: 'json',
                "contentType": "application/json; charset=utf-8",
                "dataType": "json"
            },
            type: 'GET',
            async: false
        }).responseText;

        if(tmp) {
            jason = JSON.parse(tmp);
            if(jason["data"]!=undefined) {
                tmpStore = jason["data"];
                for (index = 0; index < tmpStore.length; ++index) {
                    seasons.push({
                        value: tmpStore[index]["SeasonId"],
                        label: tmpStore[index]["Name"]
                    })
                }
            }
        }

        tmp = $.ajax({
            url: '../backend/crud/seasontype/all',
            data: {
                format: 'json',
                "contentType": "application/json; charset=utf-8",
                "dataType": "json"
            },
            type: 'GET',
            async: false
        }).responseText;

        if(tmp) {
            jason = JSON.parse(tmp);
            if(jason["data"]!=undefined) {
                tmpStore = jason["data"];
                for (index = 0; index < tmpStore.length; ++index) {
                    seasontypes.push({
                        value: tmpStore[index]["SeasonTypeId"],
                        label: tmpStore[index]["Name"]
                    })
                }
            }
        }


        tmp = $.ajax({
            url: '../backend/crud/mileage/type/all',
            data: {
                format: 'json',
                "contentType": "application/json; charset=utf-8",
                "dataType": "json"
            },
            type: 'GET',
            async: false
        }).responseText;

        if(tmp) {
            jason = JSON.parse(tmp);
            if(jason["data"]!=undefined) {
                tmpStore = jason["data"];
                for (index = 0; index < tmpStore.length; ++index) {
                    mileagetypes.push({
                        value: tmpStore[index]["MileageTypeId"],
                        label: tmpStore[index]["SeasonType"]["Name"] + "/" + "/" + tmpStore[index]["Class"] + "/" + tmpStore[index]["TicketType"]
                    })
                }
            }
        }


        tmp = $.ajax({
            url: '../backend/crud/zone/all',
            data: {
                format: 'json',
                "contentType": "application/json; charset=utf-8",
                "dataType": "json"
            },
            type: 'GET',
            async: false
        }).responseText;

        if(tmp) {
            jason = JSON.parse(tmp);
            if(jason["data"]!=undefined) {
                tmpStore = jason["data"];
                for (index = 0; index < tmpStore.length; ++index) {
                    zones.push({
                        value: tmpStore[index]["ZoneId"],
                        label: tmpStore[index]["Name"]
                    })
                }
            }
        }


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

        zoneCityMapEditor = new $.fn.dataTable.Editor(
            {
                ajax: {
                    create: '../backend/crud/zonecitymap/create',
                    edit: {
                        type: 'PUT',
                        url:  '../backend/crud/zonecitymap/update'
                    },
                    remove: {
                        type: 'DELETE',
                        url: '../backend/crud/zonecitymap/delete'
                    }
                },
                table: "#zonecitymap",
                idSrc: "ZoneCityMapId",
                fields: [
                    {
                        label: "Id:",
                        name: "ZoneCityMapId",
                        type:  "readonly"
                    }, {
                        label: "Zone:",
                        name: "Zone.ZoneId",
                        type: "select",
                        options: zones
                    }, {
                        label: "City:",
                        name: "City.CityId",
                        type: "select",
                        options: cities
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
            $('#cities').dataTable( {
                dom: "frtTip",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/crud/city/all",
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    { "data": "CityId", visible: false },
                    { "data": "Name" },
                    { "data": "Region" },
                    { "data": "Display" },
                    { "data": "UpdateTime", visible: false},
                    { "data": "UpdateUser", visible: false }
                ]
                ,tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        { sExtends: "editor_create", editor: cityEditor },
                        { sExtends: "editor_edit",   editor: cityEditor },
                        { sExtends: "editor_remove", editor: cityEditor }
                    ]
                }
            } );

            $('#trips').dataTable( {
                dom: "frtTip",
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
                ]
                ,tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        { sExtends: "editor_create", editor: tripEditor },
                        { sExtends: "editor_edit",   editor: tripEditor },
                        { sExtends: "editor_remove", editor: tripEditor }
                    ]
                }
            } );


            $('#seasontype').dataTable( {
                dom: "frtTip",
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
                    { data: "UpdateUser", visible: false }
                ]
                ,tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        { sExtends: "editor_create", editor: seasonTypeEditor },
                        { sExtends: "editor_edit",   editor: seasonTypeEditor },
                        { sExtends: "editor_remove", editor: seasonTypeEditor }
                    ]
                }
            } );




            $('#seasondate').dataTable( {
                dom: "frtTip",
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
                    { data: "UpdateUser", visible: false }
                ]
                ,tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        { sExtends: "editor_create", editor: seasonDateEditor },
                        { sExtends: "editor_edit",   editor: seasonDateEditor },
                        { sExtends: "editor_remove", editor: seasonDateEditor }
                    ]
                }
            } );


            $('#zone').dataTable( {
                dom: "frtTip",
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
                ]
                ,tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        { sExtends: "editor_create", editor: zoneEditor },
                        { sExtends: "editor_edit",   editor: zoneEditor },
                        { sExtends: "editor_remove", editor: zoneEditor }
                    ]
                }
            } );


            $('#zonecitymap').dataTable( {
                dom: "frtTip",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/crud/zonecitymap/all",
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    { data: "ZoneCityMapId", visible: false },
                    { data: "Zone.Name", editField: "Zone.ZoneId" },
                    { data: "City.Name", editField: "City.CityId" },
                    { data: "UpdateTime", visible: false},
                    { data: "UpdateUser", visible: false }
                ]
                ,tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        { sExtends: "editor_create", editor: zoneCityMapEditor },
                        { sExtends: "editor_remove", editor: zoneCityMapEditor }
                    ]
                }
            } );


            $('#seasons').dataTable( {
                dom: "frtTip",
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
                    { data: "UpdateUser", visible: false }
                ]
                ,tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        { sExtends: "editor_create", editor: seasonEditor },
                        { sExtends: "editor_edit",   editor: seasonEditor },
                        { sExtends: "editor_remove", editor: seasonEditor }
                    ]
                }
            } );

            $('#flightcost').dataTable( {
                dom: "lfrtip",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/crud/flightcost/all",
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    { "data": "FlightCostId", visible: false },
                    { "data": "RetrievalDate"},
                    { "data": "PointSystem.PointSystemName", editField: "PointSystem.PointSystemId" },
                    {
                        "data": "MileageType",
                        editField: "MileageType.MileageTypeId",
                        "render": function ( data, type, full, meta ) {
                            if ( type === 'display' && data!=null ) {
                                roundtrip = "one way";
                                if(data["MileageType"]["RoundTrip"]) {roundtrip="round trip"}
                                return data["MileageType"]["Class"] + "-" + data["MileageType"]["Season"] + "-" + roundtrip;
                            }
                            return data;
                        }
                    },
                    { data: "Trip",
                        editField: "Trip.TripId",
                        "render": function ( data, type, full, meta ) {
                            if ( type === 'display' && data!=null ) {
                                return data["CityFrom"]["Name"] + "-" + data["CityTo"]["Name"];
                            }
                            return data;
                        }
                    },
                    { "data": "FareType" },
                    { "data": "DepartDate" },
                    { "data": "DepartFlightNo" },
                    { "data": "ReturnDate" },
                    { "data": "ReturnFlightNo" },
                    { "data": "Reference" },
                    { "data": "Price" }
                ]

            } );


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
        })
    </script>
</head>

<body class="dt-other">
<div style="min-width: 500px; width: 45%;margin: 25px 25px 25px 25px;float: left">
    <div class="table-headline-staticconfig"><a name="city">City</a></div>
    <table id="cities" class="display" cellspacing="0" width="98%">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Region</th>
            <th>Display</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </thead>

        <tfoot>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Region</th>
            <th>Display</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </tfoot>
    </table>
    <a href="../backend/crud/city/all" class="source">Source</a>
</div>

<div style="min-width: 500px; width: 45%;margin: 25px 25px 25px 25px;float: left">
    <div class="table-headline-staticconfig"><a name="zone">Zone</a></div>
    <table id="zone" class="display" cellspacing="0" width="98%">
        <thead>
        <tr>
            <th>Id</th>
            <th>PointSystem</th>
            <th>Name</th>
            <th>Display</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </thead>

        <tfoot>
        <tr>
            <th>Id</th>
            <th>PointSystem</th>
            <th>Name</th>
            <th>Display</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </tfoot>
    </table>
    <a href="../backend/crud/zone/all" class="source">Source</a>
</div>

<div style="min-width: 500px; width: 45%;margin: 25px 25px 25px 25px;float: left">
    <div class="table-headline-staticconfig"><a name="zonecitymap">ZoneCityMap</a></div>
    <table id="zonecitymap" class="display" cellspacing="0" width="98%">
        <thead>
        <tr>
            <th>Id</th>
            <th>Zone</th>
            <th>City</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </thead>

        <tfoot>
        <tr>
            <th>Id</th>
            <th>Zone</th>
            <th>City</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </tfoot>
    </table>
    <a href="../backend/crud/zonecitymap/all" class="source">Source</a>
</div>

<div style="min-width: 500px; width: 45%;margin: 25px 25px 25px 25px;float: left">
    <div class="table-headline-staticconfig"><a name="trips">Trips</a></div>
    <!--
    <a href="#issuers" class="subheader">Issuers</a>
    <a href="#affiliates" class="subheader">Affiliates</a>
    <a href="#insurance_type" class="subheader">Insurance Type</a>
    <a href="#feature_type" class="subheader">Feature Type</a>
    -->
    <table id="trips" class="display" cellspacing="0" width="98%">
        <thead>
        <tr>
            <th>Id</th>
            <th>From</th>
            <th>To</th>
            <th>Distance</th>
            <th>Display</th>
            <th>Unit</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </thead>

        <tfoot>
        <tr>
            <th>Id</th>
            <th>From</th>
            <th>To</th>
            <th>Distance</th>
            <th>Display</th>
            <th>Unit</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </tfoot>
    </table>
</div>

<div style="min-width: 500px; width: 45%;margin: 25px 25px 25px 25px;float: left">
    <div class="table-headline-staticconfig"><a name="season">SeasonType</a></div>
    <!--
    <a href="#issuers" class="subheader">Issuers</a>
    <a href="#affiliates" class="subheader">Affiliates</a>
    <a href="#insurance_type" class="subheader">Insurance Type</a>
    <a href="#feature_type" class="subheader">Feature Type</a>
    -->
    <table id="seasontype" class="display" cellspacing="0" width="98%">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Display</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </thead>

        <tfoot>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Display</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </tfoot>
    </table>
</div>

<div style="min-width: 500px; width: 45%;margin: 25px 25px 25px 25px;float: left">
    <div class="table-headline-auto"><a name="season">SeasonDates</a></div>
    <!--
    <a href="#issuers" class="subheader">Issuers</a>
    <a href="#affiliates" class="subheader">Affiliates</a>
    <a href="#insurance_type" class="subheader">Insurance Type</a>
    <a href="#feature_type" class="subheader">Feature Type</a>
    -->
    <table id="seasondate" class="display" cellspacing="0" width="98%">
        <thead>
        <tr>
            <th>Id</th>
            <th>Zone</th>
            <th>From</th>
            <th>To</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </thead>

        <tfoot>
        <tr>
            <th>Id</th>
            <th>Zone</th>
            <th>From</th>
            <th>To</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </tfoot>
    </table>
</div>

<div style="min-width: 500px; width: 45%;margin: 25px 25px 25px 25px;float: left">
    <div class="table-headline-staticconfig"><a name="season">Seasons</a></div>
    <!--
    <a href="#issuers" class="subheader">Issuers</a>
    <a href="#affiliates" class="subheader">Affiliates</a>
    <a href="#insurance_type" class="subheader">Insurance Type</a>
    <a href="#feature_type" class="subheader">Feature Type</a>
    -->
    <table id="seasons" class="display" cellspacing="0" width="98%">
        <thead>
        <tr>
            <th>Id</th>
            <th>PointSystem</th>
            <th>Name</th>
            <th>Type</th>
            <th>Display</th>
            <th>Reference</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </thead>

        <tfoot>
        <tr>
            <th>Id</th>
            <th>PointSystem</th>
            <th>Name</th>
            <th>Type</th>
            <th>Display</th>
            <th>Reference</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </tfoot>
    </table>
</div>


<div style="min-width: 500px; width: 45%;margin: 25px 25px 25px 25px;float: left">
    <div class="table-headline-staticconfig"><a name="mileagetype">MileageType</a></div>
    <!--
    <a href="#issuers" class="subheader">Issuers</a>
    <a href="#affiliates" class="subheader">Affiliates</a>
    <a href="#insurance_type" class="subheader">Insurance Type</a>
    <a href="#feature_type" class="subheader">Feature Type</a>
    -->
    <table id="mileagetype" class="display" cellspacing="0" width="98%">
        <thead>
        <tr>
            <th>Id</th>
            <th>Season</th>
            <th>Class</th>
            <th>Round Trip</th>
            <th>Ticket Type</th>
            <th>Trip Length</th>
            <th>Display</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </thead>

        <tfoot>
        <tr>
            <th>Id</th>
            <th>Season</th>
            <th>Class</th>
            <th>Round Trip</th>
            <th>Ticket Type</th>
            <th>Trip Length</th>
            <th>Display</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </tfoot>
    </table>
</div>

<div style="min-width: 1000px; width: 90%;margin: 25px 25px 25px 25px;float: left">
    <div class="table-headline"><a name="mileage">Mileage</a></div>
    <!--
    <a href="#issuers" class="subheader">Issuers</a>
    <a href="#affiliates" class="subheader">Affiliates</a>
    <a href="#insurance_type" class="subheader">Insurance Type</a>
    <a href="#feature_type" class="subheader">Feature Type</a>
    -->
    <table id="mileage" class="display" cellspacing="0" width="98%">
        <thead>
        <tr>
            <th>Id</th>
            <th>Mileage Type</th>
            <th>Point System</th>
            <th>Store</th>
            <th>Trips</th>
            <th>Required Miles</th>
            <th>Value In Yen</th>
            <th>Display</th>
            <th>Long</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </thead>

        <tfoot>
        <tr>
            <th>Id</th>
            <th>Mileage Type</th>
            <th>Point System</th>
            <th>Store</th>
            <th>Trips</th>
            <th>Required Miles</th>
            <th>Value In Yen</th>
            <th>Display</th>
            <th>Long</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </tfoot>
    </table>
</div>



<div style="min-width: 1000px; width: 90%;margin: 25px 25px 25px 25px;float: left">
    <div class="table-headline-auto"><a name="flightcost">FlightCost</a></div>
    <!--
    <a href="#issuers" class="subheader">Issuers</a>
    <a href="#affiliates" class="subheader">Affiliates</a>
    <a href="#insurance_type" class="subheader">Insurance Type</a>
    <a href="#feature_type" class="subheader">Feature Type</a>
    -->
    <table id="flightcost" class="display" cellspacing="0" width="98%">
        <thead>
        <tr>
            <th>Id</th>
            <th>RetrievalDate</th>
            <th>PointSystem</th>
            <th>MilageType</th>
            <th>Trip</th>
            <th>FareType</th>
            <th>Departure<br>Date</th>
            <th><br>Flight#</th>
            <th>Return<br>Date</th>
            <th><br>Flight#</th>
            <th>Price</th>
            <th>Reference</th>
        </tr>
        </thead>

        <tfoot>
        <tr>
            <th>Id</th>
            <th>RetrievalDate</th>
            <th>PointSystem</th>
            <th>MilageType</th>
            <th>Trip</th>
            <th>FareType</th>
            <th>Departure<br>Date</th>
            <th><br>Flight#</th>
            <th>Return<br>Date</th>
            <th><br>Flight#</th>
            <th>Price</th>
            <th>Reference</th>
        </tr>
        </tfoot>
    </table>
    <p>
        Flight Cost is an automatically generated table that is only included for
    </p>
</div>

<br>
<br>
<br>

</body>
</html>