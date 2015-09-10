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
        var categories = [];
        var tmp = $.ajax({
            url: '../backend/crud/storecategory/all',
            data: {
                format: 'json',
                "contentType": "application/json; charset=utf-8",
                "dataType": "json"
            },
            type: 'GET',
            async: false
        }).responseText;

        if(tmp) {
            var jason = JSON.parse(tmp);
            if(jason["data"]!=undefined) {
                var tmpStore = jason["data"];
                var index;
                for (index = 0; index < tmpStore.length; ++index) {
                    categories.push({
                        value: tmpStore[index]["StoreCategoryId"],
                        label: tmpStore[index]["Name"]
                    })
                }
            }
        }


        storeEditor = new $.fn.dataTable.Editor(
            {
                ajax: {
                    create: '../backend/crud/store/create', // default method is POST
                    edit: {
                        type: 'PUT',
                        url:  '../backend/crud/store/update'
                    },
                    remove: {
                        type: 'DELETE',
                        url: '../backend/crud/store/delete'
                    }
                },
                table: "#stores",
                idSrc: "StoreId",
                fields: [
                    {
                        label: "Id:",
                        name: "StoreId",
                        type:  "readonly"
                    },  {
                        label: "Category:",
                        name: "StoreCategory.Id",
                        type: "select",
                        options:categories

                    },  {
                        label: "Name:",
                        name: "StoreName"
                    },   {
                        label: "Description:",
                        name: "Description"
                    },{
                        label: "Is Major:",
                        name: "IsMajor",
                        type: "select",
                        options: [
                            { label: "Yes", value: 1 },
                            { label: "No", value: 0 }
                        ]
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

        storeCategoryEditor = new $.fn.dataTable.Editor(
            {
                ajax: {
                    create: '../backend/crud/storecategory/create', // default method is POST
                    edit: {
                        type: 'PUT',
                        url:  '../backend/crud/storecategory/update'
                    },
                    remove: {
                        type: 'DELETE',
                        url: '../backend/crud/storecategory/delete'
                    }
                },
                table: "#categories",
                idSrc: "StoreCategoryId",
                fields: [
                    {
                        label: "Id:",
                        name: "StoreCategoryId",
                        type:  "readonly"
                    },  {
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
            $('#stores').dataTable( {
                dom: "frtTip",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/crud/store/all",
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    { "data": "StoreId", visible: false },
                    { "data": "StoreName" },
                    { "data": "StoreCategory.Name", editField:"StoreCategory.StoreCategoryId" },
                    { "data": "Description" },
                    { "data": "IsMajor" },
                    { "data": "UpdateTime", visible: false},
                    { "data": "UpdateUser", visible: false }
                ]
                ,tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        { sExtends: "editor_create", editor: storeEditor },
                        { sExtends: "editor_edit",   editor: storeEditor },
                        { sExtends: "editor_remove", editor: storeEditor }
                    ]
                }
            } );

            $('#categories').dataTable( {
                dom: "frtTip",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/crud/storecategory/all",
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    { "data": "StoreCategoryId", visible: false },
                    { "data": "Name" },
                    { "data": "Description" },
                    { "data": "UpdateTime", visible: false},
                    { "data": "UpdateUser", visible: false }
                ]
                ,tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        { sExtends: "editor_create", editor: storeCategoryEditor },
                        { sExtends: "editor_edit",   editor: storeCategoryEditor },
                        { sExtends: "editor_remove", editor: storeCategoryEditor }
                    ]
                }
            } );
        })



    </script>
</head>

<body class="dt-other">
<div style="width: 45%;margin: 25px 25px 25px 25px;float: left">
    <div class="table-headline"><a name="store">Stores</a></div>
    <!--
    <a href="#issuers" class="subheader">Issuers</a>
    <a href="#affiliates" class="subheader">Affiliates</a>
    <a href="#insurance_type" class="subheader">Insurance Type</a>
    <a href="#feature_type" class="subheader">Feature Type</a>
    -->
    <table id="stores" class="display" cellspacing="0" width="98%">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Major</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </thead>

        <tfoot>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Major</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </tfoot>
    </table>
</div>

<div style="width: 45%;margin: 25px 25px 25px 25px;float: left">
    <div class="table-headline"><a name="store">Categories</a></div>
    <!--
    <a href="#issuers" class="subheader">Issuers</a>
    <a href="#affiliates" class="subheader">Affiliates</a>
    <a href="#insurance_type" class="subheader">Insurance Type</a>
    <a href="#feature_type" class="subheader">Feature Type</a>
    -->
    <table id="categories" class="display" cellspacing="0" width="98%">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </thead>

        <tfoot>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Updated</th>
            <th>User</th>
        </tr>
        </tfoot>
    </table>
</div>
<br>
<br>
<br>

</body>
</html>