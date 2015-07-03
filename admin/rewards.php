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

        var rewardTypes = [];
        var index;
        tmp = $.ajax({
            url: '../backend/display/reward/type/all',
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
                    rewardTypes.push({
                        value: tmpStore[index]["value"],
                        label: tmpStore[index]["label"]
                    })
                }
            }
        }

        var rewardCategories = [];
        tmp = $.ajax({
            url: '../backend/display/reward/category/all',
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
                    rewardCategories.push({
                        value: tmpStore[index]["value"],
                        label: tmpStore[index]["label"]
                    })
                }
            }
        }

        rewardCategoryEditor = new $.fn.dataTable.Editor(
            {
                ajax: {
                    create: '../backend/crud/reward/category/create', // default method is POST
                    edit: {
                        type: 'PUT',
                        url:  '../backend/crud/reward/category/update'
                    },
                    remove: {
                        type: 'DELETE',
                        url: '../backend/crud/reward/category/delete'
                    }
                },
                table: "#rewardcategory",
                idSrc: "RewardCategoryId",
                fields: [
                    {
                        label: "Id:",
                        name: "RewardCategoryId",
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
            $('#rewardcategory').dataTable( {
                dom: "rtTip",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/crud/reward/category/all",
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    { "data": "RewardCategoryId",edit: false },
                    { "data": "Name" },
                    { "data": "Description" },
                    { "data": "UpdateTime",edit: false, visible: false  },
                    { "data": "UpdateUser", visible: false }
                ]
                ,tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        { sExtends: "editor_create", editor: rewardCategoryEditor },
                        { sExtends: "editor_edit",   editor: rewardCategoryEditor },
                        { sExtends: "editor_remove", editor: rewardCategoryEditor }
                    ]
                }
            } );
        });


        rewardTypeEditor = new $.fn.dataTable.Editor(
            {
                ajax: {
                    create: '../backend/crud/reward/type/create', // default method is POST
                    edit: {
                        type: 'PUT',
                        url:  '../backend/crud/reward/type/update'
                    },
                    remove: {
                        type: 'DELETE',
                        url: '../backend/crud/reward/type/delete'
                    }
                },
                table: "#rewardtype",
                idSrc: "RewardTypeId",
                fields: [
                    {
                        label: "Id:",
                        name: "RewardTypeId",
                        type:  "readonly"
                    }, {
                        label: "Name:",
                        name: "Name"
                    },   {
                        label: "Description:",
                        name: "Description"
                    }, {
                        label: "IsFinite:",
                        name: "IsFinite",
                        type: "select",
                        options: [0,1]
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

        rewardEditor = new $.fn.dataTable.Editor(
            {
                ajax: {
                    create: '../backend/crud/reward/create', // default method is POST
                    edit: {
                        type: 'PUT',
                        url:  '../backend/crud/reward/update'
                    },
                    remove: {
                        type: 'DELETE',
                        url: '../backend/crud/reward/delete'
                    }
                },
                table: "#rewardTable",
                idSrc: "RewardId",
                fields: [
                    {
                        label: "Id:",
                        name: "RewardId",
                        type:  "readonly"
                    },{
                        label: "PointSystem:",
                        name: "PointSystemId",
                        type:  "readonly"
                    },{
                        label: "Type:",
                        name: "Type.RewardTypeId",
                        type:  "select",
                        options: rewardTypes
                    }, {
                        label: "Category:",
                        name: "Category.RewardCategoryId",
                        type:  "select",
                        options: rewardCategories
                    },  {
                        label: "Title:",
                        name: "Title"
                    },  {
                        label: "Description:",
                        name: "Description"
                    },  {
                        label: "Icon:",
                        name: "Icon"
                    },  {
                        label: "YenPerPoint:",
                        name: "YenPerPoint",
                        def: 1.0
                    },  {
                        label: "PricePerUnit:",
                        name: "PricePerUnit",
                        def: 1.0
                    },{
                        label: "MinPoints:",
                        name: "MinPoints"
                    },  {
                        label: "MaxPoints:",
                        name: "MaxPoints"
                    },  {
                        label: "RequiredPoints:",
                        name: "RequiredPoints"
                    },  {
                        label: "MaxPeriod:",
                        name: "MaxPeriod"
                    },  {
                        label: "Update date:",
                        name: "update_time",
                        type: "readonly"
                    }, {
                        label: "Update user:",
                        name: "update_user"
                    }
                ]
            });

        $(document).ready(function() {
            $('#rewardtype').dataTable( {
                dom: "rtTip",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/crud/reward/type/all",
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    { "data": "RewardTypeId",edit: false },
                    { "data": "Name" },
                    { "data": "Description" },
                    { "data": "IsFinite" },
                    { "data": "UpdateTime",edit: false, visible: false  },
                    { "data": "UpdateUser", visible: false }
                ]
                ,tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        { sExtends: "editor_create", editor: rewardTypeEditor },
                        { sExtends: "editor_edit",   editor: rewardTypeEditor },
                        { sExtends: "editor_remove", editor: rewardTypeEditor }
                    ]
                }
            } );

            $('#rewardTable').dataTable({
                dom: "lfrtTip",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/crud/reward/all",
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    {"data": "RewardId",width:"20px"},
                    {"data": "PointSystemId", width:"20px"},
                    {"data": "Type.Name", editField: "Type.RewardTypeId",width:"50px"},
                    {"data": "Category.Name", editField: "Category.RewardCategoryId",width:"50px"},
                    {"data": "Title",width:"150px"},
                    {"data": "Description",width:"200px"},
                    {"data": "Icon",width:"50px"},
                    {"data": "YenPerPoint",width:"20px"},
                    {"data": "PricePerUnit",width:"20px"},
                    {"data": "MinPoints",width:"20px"},
                    {"data": "MaxPoints",width:"20px"},
                    {"data": "RequiredPoints",width:"20px"},
                    {"data": "MaxPeriod",width:"20px"},
                    {"data": "UpdateTime", visible:false,width:"20px"},
                    {"data": "UpdateUser",  visible:false,width:"20px"}
                ],
                tableTools: {
                    sRowSelect: "os",
                    aButtons:  [
                        {sExtends: "editor_create", editor: rewardEditor},
                        {sExtends: "editor_edit", editor: rewardEditor},
                        {sExtends: "editor_remove", editor: rewardEditor}
                    ]
                },

                "initComplete": function(settings, json) {
                        this.api().columns().every(
                            function () {
                                var column = this;
                                var select = $('<select><option value=""></option></select>')
                                    .appendTo($(column.footer()).empty())
                                    .on('change', function () {
                                        var val = $.fn.dataTable.util.escapeRegex(
                                            $(this).val()
                                        );

                                        column
                                            .search(val ? '^' + val + '$' : '', true, false)
                                            .draw();
                                    });

                                column.data().unique().sort().each(
                                    function (d, j) {
                                        select.append('<option value="' + d + '">' + d + '</option>')
                                    }
                                );
                            }
                        );
                }
            } );

        })



    </script>
</head>

<body class="dt-other">

<table border="0">
    <tr>
        <td valign="top">
            <div class="table-headline"><a name="issuers">Reward Categories</a></div>
            <table id="rewardcategory" class="display" cellspacing="0" width="98%">
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
        </td>
        <td valign="top">
            <div class="table-headline"><a name="affiliates">Reward Types</a></div>
            <table id="rewardtype" class="display" cellspacing="0" width="98%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>IsFinite</th>
                    <th>Updated</th>
                    <th>User</th>
                </thead>

                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>IsFinite</th>
                    <th>Updated</th>
                    <th>User</th>
                </tfoot>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table id="rewardTable" class="display" cellspacing="0" width="800" align="left">
                <thead>
                <tr>
                    <td colspan="15" class="table-headline">
                        Rewards
                    </td>
                </tr>
                <tr>
                    <th>Id</th>
                    <th>Point<br>System</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Icon</th>
                    <th>YenPerPoint</th>
                    <th>PricePerUnit</th>
                    <th>MinPoints</th>
                    <th>MaxPoints</th>
                    <th>RequiredPoints</th>
                    <th>MaxPeriod</th>
                    <th>Update</th>
                    <th>User</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>PointSystemId</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Icon</th>
                    <th>YenPerPoint</th>
                    <th>PricePerUnit</th>
                    <th>MinPoints</th>
                    <th>MaxPoints</th>
                    <th>RequiredPoints</th>
                    <th>MaxPeriod</th>
                    <th>Update</th>
                    <th>User</th>
                </tr>
                </tfoot>
            </table>
        </td>
    </tr>
</table>
<br />
<br />
<br />

</body>
</html>