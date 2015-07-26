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
    <script type="text/javascript" language="javascript" src="scripts/datatables_ext.js"></script>
    <script type="text/javascript" language="javascript" class="init">
        var pointSystemId = -1;
        <?php if(array_key_exists('Id',$_GET)) { echo "pointSystemId=" . htmlspecialchars($_GET["Id"]) . ";\n"; } ?>

        var stores = [];
        var tmp = $.ajax({
            url: '../backend/display/stores',
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
                    stores.push({
                        value: tmpStore[index]["StoreId"],
                        label: tmpStore[index]["StoreCategory"]["Name"] + " - " + tmpStore[index]["StoreName"]
                    })
                }
            }
        }

        var rewardTypes = [];
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

        if(pointSystemId>0) {

            var creditCards = [];
            tmp = $.ajax({
                url: '../backend/display/creditcards',
                data: {
                    format: 'json',
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                type: 'GET',
                async: false
            }).responseText;

            if(tmp) {
                var $mtmp = "";
                jason = JSON.parse(tmp);
                if(jason["data"]!=undefined) {
                    tmpStore = jason["data"];
                    for (index = 0; index < tmpStore.length; ++index) {
                        if(tmpStore[index]["issuer"]!=null) {
                            $mtmp = "(" + tmpStore[index]["issuer"]["name"] +  ")";
                        }
                        creditCards.push({
                            value: tmpStore[index]["credit_card_id"],
                            label: tmpStore[index]["name"] + $mtmp
                        })
                    }
                }
            }

            var units = [];
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
                            label: tmpStore[index]["Description"]
                        })
                    }
                }
            }

            pointSystemEditor = new $.fn.dataTable.Editor(
                {
                    ajax: {
                        create: '../backend/crud/pointsystem/create', // default method is POST
                        edit: {
                            type: 'PUT',
                            url:  '../backend/crud/pointsystem/update'
                        },
                        remove: {
                            type: 'DELETE',
                            url: '../backend/crud/pointsystem/delete'
                        }
                    },
                    table: "#pointsystem",
                    idSrc: "PointSystemId",
                    fields: [
                        {
                            label: "Id:",
                            name: "PointSystemId",
                            type:  "readonly"
                        }, {
                            label: "Name:",
                            name: "PointSystemName"
                        }, {
                            label: "PointsPerYen:",
                            name: "PointsPerYen",
                            def: 0.01
                        }, {
                            label: "YenPerPoint:",
                            name: "YenPerPoint",
                            def:1.0
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

            pointMappingEditor = new $.fn.dataTable.Editor({
                ajax: {
                    create: '../backend/crud/creditcard/pointsystem/mapping/create', // default method is POST
                    remove: {
                        type: 'DELETE',
                        url: '../backend/crud/creditcard/pointsystem/mapping/delete'
                    }
                },
                table: "#creditCardMappingTable",
                idSrc: "Id",
                fields: [{
                    label: "Id:",
                    name: "Id",
                    type: "readonly"
                }, {
                    label: "PointSystem:",
                    name: "PointSystem.PointSystemId",
                    type:  "readonly",
                    def: pointSystemId
                },   {
                    label: "Card Id:",
                    name: "CreditCard.credit_card_id",
                    type: "select",
                    options: creditCards
                }
                ]
            });


            pointAcquisitionEditor = new $.fn.dataTable.Editor(
                {
                    ajax: {
                        create: '../backend/crud/pointacquisition/create', // default method is POST
                        edit: {
                            type: 'PUT',
                            url:  '../backend/crud/pointacquisition/update'
                        },
                        remove: {
                            type: 'DELETE',
                            url: '../backend/crud/pointacquisition/delete'
                        }
                    },
                    table: "#pointAcquisitionTable",
                    idSrc: "PointAcquisitionId",
                    fields: [
                        {
                            label: "Id:",
                            name: "PointAcquisitionId",
                            type:  "readonly"
                        },{
                            label: "PointSystem:",
                            name: "PointSystemId",
                            type:  "readonly",
                            def: pointSystemId
                        }, {
                            label: "PointsPerYen:",
                            name: "PointsPerYen",
                            def: 0.01
                        }, {
                            label: "Category/Store:",
                            name: "Store.StoreId",
                            type:  "select",
                            options: stores
                        }, {
                            label: "Reference",
                            name:  "Reference",
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

            pointUsageEditor = new $.fn.dataTable.Editor(
                {
                    ajax: {
                        create: '../backend/crud/pointusage/create', // default method is POST
                        edit: {
                            type: 'PUT',
                            url:  '../backend/crud/pointusage/update'
                        },
                        remove: {
                            type: 'DELETE',
                            url: '../backend/crud/pointusage/delete'
                        }
                    },
                    table: "#pointUsageTable",
                    idSrc: "PointUsageId",
                    fields: [
                        {
                            label: "Id:",
                            name: "PointUsageId",
                            type:  "readonly"
                        },{
                            label: "PointSystem:",
                            name: "PointSystem.Id",
                            type:  "readonly",
                            def: pointSystemId
                        }, {
                            label: "YenPerPoint:",
                            name: "YenPerPoint",
                            def: 1.0
                        }, {
                            label: "Category/Store:",
                            name: "Store.Id",
                            type:  "select",
                            options: stores
                        }, {
                            label: "Reference",
                            name:  "Reference",
                            type:"EditAndLink"
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
                            name: "PointSystem.PointSystemId",
                            type:  "readonly",
                            def: pointSystemId
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
                            def: 0.01
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
                        }, {
                            label: "Reference",
                            name:  "Reference",
                            type:"EditAndLink"
                        }, {
                            label: "PointMultiplier",
                            name:  "PointMultiplier"
                        },  {
                            label: "Unit",
                            name:  "Unit.UnitId",
                            type: "select",
                            options: units,
                            def:1
                        },{
                            label: "Update date:",
                            name: "UpdateTime"
                        }, {
                            label: "Update user:",
                            name: "UpdateUser"
                        }
                    ]
                });


            $(document).ready(function () {
                 $('#rewardTable').dataTable({
                    dom: "rtT",
                    "pageLength": 25,
                    "ajax": {
                        "url": <?php if(array_key_exists('Id',$_GET)) {
                                    echo "\"../backend/crud/reward/by/pointsystem?Id=" . htmlspecialchars($_GET["Id"]) . "\""; }
                                    ?>,
                        "type": "GET",
                        "contentType": "application/json; charset=utf-8",
                        "dataType": "json"
                    },
                    "columns": [
                        {"data": "RewardId",width:20},
                        {"data": "PointSystem.PointSystemName", editField: "PointSystem.PointSystemId",visible: false,width:20},
                        {"data": "Type.Name", editField: "Type.RewardTypeId",width:50},
                        {"data": "Category.Name", editField: "Category.RewardCategoryId",width:100},
                        {"data": "Title",width:150},
                        {"data": "Description",width:200},
                        {"data": "Icon",width:50},
                        {"data": "YenPerPoint",width:20},
                        {"data": "PricePerUnit",width:20},
                        {"data": "MinPoints",width:20},
                        {"data": "MaxPoints",width:20},
                        {"data": "RequiredPoints",width:20},
                        {"data": "MaxPeriod",width:50},
                        {"data": "Reference", visible:false},
                        {"data": "PointMultiplier",width:"20px"},
                        {"data": "Unit.Description", editField: "Unit.UnitId",width:"40px"},
                        {"data": "UpdateTime", visible:false,width:50},
                        {"data": "UpdateUser",  visible:false,width:25}
                    ],
                    tableTools: {
                        sRowSelect: "os",
                        aButtons:  [
                            {sExtends: "editor_create", editor: rewardEditor},
                            {sExtends: "editor_edit", editor: rewardEditor},
                            {sExtends: "editor_remove", editor: rewardEditor}
                        ]
                    }
                });

                $('#pointUsageTable').dataTable({
                    dom: "rtT",
                    "pageLength": 25,
                    "ajax": {
                        "url": <?php if(array_key_exists('Id',$_GET)) {
                                    echo "\"../backend/crud/pointusage/by/pointsystem?Id=" . htmlspecialchars($_GET["Id"]) . "\""; }
                                    ?>,
                        "type": "GET",
                        "contentType": "application/json; charset=utf-8",
                        "dataType": "json"
                    },
                    "columns": [
                        {"data": "PointUsageId",width:1},
                        {"data": "PointSystem.Id", visible: false,width:1},

                        {"data": "Store.Id",width:1,visible: false},
                        {"data": "Store.Name",width:1},
                        {"data": "YenPerPoint",width:2},
                        {"data": "Reference", visible:false},
                        {"data": "UpdateTime", visible:false,width:2},
                        {"data": "UpdateUser",  visible:false,width:2}
                    ]

                    ,
                    tableTools: {
                        sRowSelect: "os",
                        aButtons:  [
                            {sExtends: "editor_create", editor: pointUsageEditor},
                            {sExtends: "editor_edit", editor: pointUsageEditor},
                            {sExtends: "editor_remove", editor: pointUsageEditor}
                        ]
                    }

                });


                $('#pointAcquisitionTable').dataTable({
                    dom: "rtT",
                    "pageLength": 25,
                    "ajax": {
                        "url": <?php if(array_key_exists('Id',$_GET)) {
                                    echo "\"../backend/crud/pointacquisition/by/pointsystem?Id=" . htmlspecialchars($_GET["Id"]) . "\""; }
                                    ?>,
                        "type": "GET",
                        "contentType": "application/json; charset=utf-8",
                        "dataType": "json"
                    },
                    "columns": [
                        {"data": "PointAcquisitionId",width:1},
                        {"data": "PointSystemId", visible: false,width:1},
                        {"data": "PointAcquisitionName",width:3},
                        {"data": "PointsPerYen",width:1},
                        {"data": "Store.Category",width:2},
                        {"data": "Store.StoreName",width:3},
                        {"data": "Reference", visible:false},
                        {"data": "UpdateTime", visible:false},
                        {"data": "UpdateUser",  visible:false}
                    ]
                 ,
                    tableTools: {
                        sRowSelect: "os",
                        aButtons:  [
                             {sExtends: "editor_create", editor: pointAcquisitionEditor},
                             {sExtends: "editor_edit", editor: pointAcquisitionEditor},
                             {sExtends: "editor_remove", editor: pointAcquisitionEditor}
                     ]
                    }

                });

                $('#pointsystem').dataTable({
                    dom: "rtT",
                    "pageLength": 25,
                    "ajax": {
                        "url": <?php if(array_key_exists('Id',$_GET)) { echo "\"../backend/crud/pointsystem/by/id?Id=" . htmlspecialchars($_GET["Id"]) . "\""; } ?>,
                        "type": "GET",
                        "contentType": "application/json; charset=utf-8",
                        "dataType": "json"
                    },
                    "columns": [
                        {"data": "PointSystemId", visible: false},
                        {"data": "PointSystemName"},
                        {"data": "PointsPerYen"},
                        {"data": "YenPerPoint"}
                    ],
                    tableTools: {
                        sRowSelect: "os",
                        aButtons: [
                            {sExtends: "editor_edit", editor: pointSystemEditor}
                        ]
                    }
                });

                $('#creditCardMappingTable').dataTable({
                    dom: "tTr",
                    "pageLength": 25,
                    "ajax": {
                        "url": "../backend/crud/creditcard/pointsystem/mapping/by/pointsystem?Id=" + pointSystemId,
                        "type": "GET",
                        "contentType": "application/json; charset=utf-8",
                        "dataType": "json"
                    },
                    "columns": [
                        {"data": "Id"},
                        {"data": "PointSystem.PointSystemId", visible:false},
                        {"data": "CreditCard.name"},
                        {"data": "UpdateTime", visible:false},
                        {"data": "UpdateUser",  visible:false},
                        {"data": "CreditCard.credit_card_id",
                            render: function ( data, type, row ) {
                                if ( type === 'display' ) {
                                    return "<a href='creditcard_details.php?Id=" + data + "'>Details</a>";
                                }
                                return data;
                            }
                        }

                    ]
                    , tableTools: {
                        sRowSelect: "os",
                        aButtons: [
                            {sExtends: "editor_create", editor: pointMappingEditor},
                            {sExtends: "editor_remove", editor: pointMappingEditor}
                        ]
                    }

                });


            });
        }
    </script>
</head>

<body class="dt-other">
<?php
if(!array_key_exists('Id',$_GET)) {
    echo "<div class='errorMessage'>";
    echo "Failed to retrieve credit card id, please go back and select a valid card";
    echo "</div>";
}
?>

<table>
    <tr>
        <td colspan="2">
            <div class="table-headline"><a name="PointSystemDetails" href="pointprogram_overview.php">Point System details</a></div>
            <div>
                <div style="position: relative;float: left;">
                    <!--
                        <a href="pointprogram_overview.php" class="subheader">Back</a>
                    -->
                    <a href="javascript:void(0)" onclick="window.history.back();" class="subheader">Back</a>
                </div>

                <div style="position: relative;float: right;">
                    <!--
                    <a href="pointprogram_details.php?<?php if(array_key_exists('Id',$_GET)) { echo "Id=" . htmlspecialchars($_GET["Id"]); } ?>" class="subheader">Reload</a>
                    -->
                    <a href="javascript:void(0)" onclick="location.reload();" class="subheader">Reload</a>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table id="pointsystem" class="display" cellspacing="0">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>name</th>
                    <th>points-per-yen (default)</th>
                    <th>yen-per-point (default)</th>
                </tr>
                </thead>

            </table>
        </td>
    </tr>
    <tr>
        <td rowspan="3" valign="top">
            <table id="creditCardMappingTable" class="display" cellspacing="0" width="300">
                <thead>
                <tr>
                    <td colspan="9" class="table-headline">
                        Credit Cards
                    </td>
                </tr>
                <tr>
                    <th>Id</th>
                    <th>PointSystemId</th>
                    <th>Credit Card</th>
                    <th>User</th>
                    <th>Time</th>
                    <th>Details</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>PointSystemId</th>
                    <th>Credit Card</th>
                    <th>User</th>
                    <th>Time</th>
                    <th>Details</th>
                </tr>
                </tfoot>
            </table>
        </td>
        <td valign="top">
            <table id="pointAcquisitionTable" class="display" cellspacing="0" width="800">
                <thead>
                <tr>
                    <td colspan="8" class="table-headline">
                        Point Acquisition
                    </td>
                </tr>
                <tr>
                    <th>Id</th>
                    <th>PointSystemId</th>
                    <th>Name</th>
                    <th>PointsPerYen</th>
                    <th>Category</th>
                    <th>Store</th>
                    <th>Reference</th>
                    <th>Update</th>
                    <th>User</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>PointSystemId</th>
                    <th>Name</th>
                    <th>PointsPerYen</th>
                    <th>Category</th>
                    <th>Store</th>
                    <th>Reference</th>
                    <th>Update</th>
                    <th>User</th>
                </tr>
                </tfoot>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <table id="pointUsageTable" class="display" cellspacing="0" width="800">
                <thead>
                <tr>
                    <td colspan="10" class="table-headline">
                        Point Usage
                    </td>
                </tr>
                <tr>
                    <th>Id</th>
                    <th>PointSystemId</th>
                    <th>Category</th>
                    <th>Store</th>
                    <th>YenPerPoint</th>
                    <th>Reference</th>
                    <th>Update</th>
                    <th>User</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>PointSystemId</th>
                    <th>Category</th>
                    <th>Store</th>
                    <th>YenPerPoint</th>
                    <th>Reference</th>
                    <th>Update</th>
                    <th>User</th>
                </tr>
                </tfoot>
            </table>
        </td>
    </tr>
</table>
<table id="rewardTable" class="display" cellspacing="0" width="800" align="left">
    <thead>
    <tr>
        <td colspan="15" class="table-headline">
            Rewards
        </td>
    </tr>
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
        <th>Reference</th>
        <th>PointsPerUnit</th>
        <th>Unit</th>
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
        <th>PointsPerUnit</th>
        <th>Unit</th>
        <th>Reference</th>
        <th>Update</th>
        <th>User</th>
    </tr>
    </tfoot>
</table>

</body>
</html>