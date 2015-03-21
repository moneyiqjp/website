<html>
<head>
    <meta charset="utf-8">
    <title>DataTables example - Ajax data source (objects)</title>
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
        featureEditor = new $.fn.dataTable.Editor(
            {
                ajax: {
                    create: '../backend/crud/feature/create', // default method is POST
                    edit: {
                        type: 'PUT',
                        url:  '../backend/crud/feature/update'
                    },
                    remove: {
                        type: 'DELETE',
                        url: '../backend/crud/feature/delete'
                    }
                },
                table: "#featuresTable",
                idSrc: "FeatureId",
                fields: [
                    {
                        label: "Id:",
                        name: "FeatureId",
                        type:  "readonly"
                    }, {
                        label: "Card:",
                        name: "CreditCard.Id"
                    }, {
                        label: "Type:",
                        name: "FeatureType.Id"
                    },   {
                        label: "Description:",
                        name: "Description"
                    },  {
                        label: "Cost:",
                        name: "FeatureCost"
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
            $('#featuresTable').dataTable( {
                dom: "Tfrtip",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/crud/feature/all",
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    { "data": "FeatureId",edit: false },
                    { "data": "CreditCard.Name", editField: "CreditCard.Id" },
                    { "data": "FeatureType.Name", editField: "FeatureType.Id" },
                    { "data": "Description" },
                    { "data": "FeatureCost" },
                    { "data": "UpdateTime",edit: false  },
                    { "data": "UpdateUser" }
                ]
                
                ,tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        { sExtends: "editor_create", editor: featureEditor },
                        { sExtends: "editor_edit",   editor: featureEditor },
                        { sExtends: "editor_remove", editor: featureEditor }
                    ]
                }
            } );
        });
    </script>
</head>

<body class="dt-other">
<div class="table-headline"><a name="issuers">Card features</a></div>
<a href="creditcard_overview.php" class="subheader">Back</a>
<a href="#" class="subheader">#2</a>
<a href="#" class="subheader">#4</a>
<a href="#" class="subheader">#4</a>
<table id="featuresTable" class="display" cellspacing="0" width="98%">
    <thead>
    <tr>
        <th>Id</th>
        <th>Card</th>
        <th>Type</th>
        <th>Description</th>
        <th>Cost</th>
        <th>Update</th>
        <th>User</th>
    </tr>
    </thead>

    <tfoot>
    <tr>
        <th>Id</th>
        <th>Card</th>
        <th>Type</th>
        <th>Description</th>
        <th>Cost</th>
        <th>Update</th>
        <th>User</th>
    </tr>
    </tfoot>
</table>