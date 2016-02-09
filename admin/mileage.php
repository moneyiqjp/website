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
    <script type="text/javascript" language="javascript" class="init">
        var cities = [];
        var units = [];
        var trips = [];
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


        mileageEditor = new $.fn.dataTable.Editor(
            {
                ajax: {
                    create: '../backend/crud/mileage/create', // default method is POST
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
                    { "data": "TripId", visible: false },
                    { "data": "CityFrom.Name", editField: "CityFrom.CityId" },
                    { "data": "CityTo.Name", editField: "CityFrom.CityId" },
                    { "data": "Distance" },
                    { "data": "Display" },
                    { data: "Unit.Name",   editField: "Unit.UnitId" },
                    { "data": "UpdateTime", visible: false},
                    { "data": "UpdateUser", visible: false }
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
        });



        $('#mileage').dataTable( {
            dom: "frtTip",
            "pageLength": 25,
            "ajax": {
                "url": "../backend/crud/trip/all",
                "type": "GET",
                "contentType": "application/json; charset=utf-8",
                "dataType": "json"
            },
            "columns": [
                { "data": "MilageId", visible: false },
                { "data": "Store.StoreName", editField: "Store.StoreId" },
                { data: "Trip",
                  editField: "Trip.TripId",
                  "render": function ( data, type, full, meta ) {
                        if ( type === 'display' ) {
                            return data["CityFrom"]["Name"] + "-" + data["CityTo"]["Name"];
                        }
                        return data;
                  }
                },
                { "data": "RequiredMiles" },
                { "data": "ValueInYen" },
                { "data": "Display" },
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
<div style="width: 45%;margin: 25px 25px 25px 25px;float: left">
    <div class="table-headline"><a name="store">City</a></div>
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
    <a href="http://localhost/backend/crud/store/all" class="source">Source</a>
</div>

<div style="width: 45%;margin: 25px 25px 25px 25px;float: left">
    <div class="table-headline"><a name="trips">Trips</a></div>
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
            <th>Unit</th>
            <th>Display</th>
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
            <th>Unit</th>
            <th>Display</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </tfoot>
    </table>
</div>


<div style="width: 45%;margin: 25px 25px 25px 25px;float: left">
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
            <th>Store</th>
            <th>Trips</th>
            <th>RequiredMiles</th>
            <th>ValueInYen</th>
            <th>Display</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </thead>

        <tfoot>
        <tr>
            <th>Id</th>
            <th>Store</th>
            <th>Trips</th>
            <th>RequiredMiles</th>
            <th>ValueInYen</th>
            <th>Display</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </tfoot>
    </table

<br>
<br>
<br>

</body>
</html>