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
        var creditCardId = -1;
        <?php if(array_key_exists('Id',$_GET)) { echo "creditCardId=" . htmlspecialchars($_GET["Id"]) . ";\n"; } ?>

        function isoTodayString(){
            var d = new Date();
            var pad = function (n){
                return n<10 ? '0'+n : n
            };
            return d.getUTCFullYear()+'-'
                + pad(d.getUTCMonth()+1)+'-'
                + pad(d.getUTCDate())
        }

        function isoMaxString(){
            return '9999-12-31';
        }

        var index; var tmp;
        var  restrictionTypes = [];
        tmp = $.ajax({
            url: '../backend/crud/restriction/type/all',
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
                    restrictionTypes.push({
                        value: tmpStore[index]["RestrictionTypeId"],
                        label: tmpStore[index]["Name"]
                    })
                }
            }
        }




        if(creditCardId>0) {
        featureEditor = new $.fn.dataTable.Editor({
            ajax: {
                create: '../backend/crud/restriction/credit/card/feature/create', // default method is POST
                edit: {
                    type: 'PUT',
                    url: '../backend/crud/restriction/credit/card/feature/update'
                },
                remove: {
                    type: 'DELETE',
                    url: '../backend/crud/restriction/credit/card/feature/delete'
                }
            },
            table: "#featureTable",
            idSrc: "FeatureId",
            fields: [
                {
                    label: "Id:",
                    name: "FeatureId",
                    type: "readonly"
                }, {
                    label: "CardId:",
                    name: "CreditCardId",
                    type: "readonly"
                }, {
                    label: "FeatureTypeId:",
                    name: "FeatureTypeId",
                    type: "readonly"
                }, {
                    label: "Category:",
                    name: "Category",
                    type: "readonly"
                }, {
                    label: "Feature:",
                    name: "Name",
                    type: "readonly"
                }, {
                    label: "Description:",
                    name: "Description",
                    type: "readonly"
                },{
                    label: "Update date:",
                    name: "UpdateTime",
                    type: "readonly"
                }, {
                    label: "Update user:",
                    name: "UpdateUser",
                    type: "readonly"
                }, {
                    name: "Active",
                    label: "Active",
                    def: true
                }
            ]
        });

        creditCardRestrictionEditor = new $.fn.dataTable.Editor(
            {
                ajax: {
                    create: '../backend/crud/restriction/credit/card/general/create', // default method is POST
                    edit: {
                        type: 'PUT',
                        url:  '../backend/crud/restriction/credit/card/general/update'
                    },
                    remove: {
                        type: 'DELETE',
                        url: '../backend/crud/restriction/credit/card/general/delete'
                    }
                },
                table: "#creditCardRestrictionTable",
                idSrc: "CreditCardRestrictionId",
                fields: [
                    {
                        label: "Id:",
                        name: "CreditCardRestrictionId",
                        type:  "readonly"
                    },{
                        label: "CreditCard:",
                        name: "CreditCard.credit_card_id",
                        type:  "readonly",
                        def: creditCardId
                    },{
                        label: "RestrictionType:",
                        name: "RestrictionType.RestrictionTypeId",
                        type: "select",
                        options:restrictionTypes
                    }, {
                        label: "Comparator",
                        name: "Comparator",
                        type: "select",
                        options: ['=', '!=', '>', '<', 'in', 'not in']
                    },  {
                        label: "Value:",
                        name:  "Value"
                    },  {
                        label: "Priority",
                        name: "Priority"
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


        $(document).ready(function () {
            $('#featureTable').dataTable({
                dom: "tTr",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/crud/restriction/credit/card/feature/by/credit/card/id?Id=" + creditCardId,
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                paging: false,
                searching: false,
                "order": [[2, "asc"], [3, "asc"]],
                "columns": [
                    {"data": "FeatureId", edit: false, visible: false},
                    {"data": "CreditCardId", edit: false, visible: false},
                    {"data": "FeatureTypeId", visible: false},
                    {"data": "Category", edit: false, width: "50"},
                    {"data": "Name", editField: "FeatureType.Id", edit: false, width: "50"},
                    {"data": "Description", edit: false, visible: false, width: "80"},
                    {
                        "data": "Active",
                        render: function (data, type, row) {
                            if (type === 'display') {
                                return '<input type="checkbox" class="editor-afield">';
                            }
                            return data;
                        },
                        className: "dt-body-center",
                        width: "5"
                    },
                    {"data": "UpdateTime", edit: false, visible: false},
                    {"data": "UpdateUser", visible: false}
                ],
                rowCallback: function (row, data) {
                    // Set the checked state of the checkbox in the table
                    $('input.editor-afield', row).prop('checked', data['Active'] == 1);
                }
                , tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        {sExtends: "editor_edit", editor: featureEditor}
                    ]
                }
            })
                .on('change', 'input.editor-afield', function () {
                    featureEditor
                        .edit($(this).closest('tr'), false)
                        .set('Active', $(this).prop('checked') ? 1 : 0)
                        .submit();
                })
                .on('click', 'tbody td:not(:first-child)', function (e) {
                    if(e.target.className!= "editor-afield") {
                        featureEditor.inline(this);
                    }
                });

            $('#creditCardRestrictionTable').dataTable({
                dom: "lfrtTip",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/crud/restriction/credit/card/general/by/credit/card/id?Id=" + creditCardId,
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    {"data": "CreditCardRestrictionId",width:"125px"},
                    {"data": "CreditCard.name",editField: "CreditCard.credit_card_id", width:"150px"},
                    {"data": "RestrictionType.Name", editField: "RestrictionType.RestrictionTypeId",width:"150px"},
                    {"data": "Comparator",width:"100px"},
                    {"data": "Value",width:"100px"},
                    {"data": "Priority",width:"50px", visible:false},
                    {"data": "UpdateTime", visible:false,width:"20px"},
                    {"data": "UpdateUser",  visible:false,width:"20px"}
                ],
                tableTools: {
                    sRowSelect: "os",
                    aButtons:  [
                        {sExtends: "editor_create", editor: creditCardRestrictionEditor},
                        {sExtends: "editor_edit", editor: creditCardRestrictionEditor},
                        {sExtends: "editor_remove", editor: creditCardRestrictionEditor}
                    ]
                }

            } );

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
            <div class="table-headline"><a name="issuers">Card details</a></div>
            <div style="width: 100%;height: 35px">
                <div style="width: 50%;height:30px;background-color:lightgrey;color:black;float: left;align-content: center;text-align: center;vertical-align: middle;padding-top: 5px">
                    <a href="creditcard_details.php?Id=<?php echo $_GET["Id"]; ?>" class="cleanlink" style="color: black">
                        Core details
                    </a>
                </div>
                <div style="width: 50%;height:30px;background-color:black;color: white;float: left;align-content: center;text-align: center;vertical-align: middle;padding-top: 5px">
                    <a href="creditcard_restrictions.php?Id=<?php echo $_GET["Id"]; ?>" class="cleanlink" style="color: white">
                        Restrictions
                    </a>
                </div>
            </div>
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
        <td rowspan="5" valign="top" width="400" align="left">
            <table id="featureTable" class="display" cellspacing="0" width="400">
                <thead>
                <tr>
                    <td colspan="9" class="table-headline">
                        Features Restriction
                    </td>
                </tr>
                <tr>
                    <th>Id</th>
                    <th>Card</th>
                    <th>FeatureId</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th></th>
                    <th>Update</th>
                    <th>User</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Card</th>
                    <th>FeatureId</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th></th>
                    <th>Update</th>
                    <th>User</th>
                </tr>
                </tfoot>
            </table>
            <div>
                <a href= "../backend/crud/restriction/credit/card/feature/by/credit/card/id?Id=<?php echo $_GET["Id"]; ?>">
                        Feature table source
                </a>
            </div>
        </td>
        </td>
        <td valign="top">
            <div class="admin_datatable_medium">
                <div class="table-headline"><a name="restrictions">CreditCard Restrictions</a></div>
                <table id="creditCardRestrictionTable" class="display" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>CreditCard</th>
                        <th>Attribute</th>
                        <th>Comparator</th>
                        <th>Value</th>
                        <th>Priority</th>
                        <th>Updated</th>
                        <th>User</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>CreditCard</th>
                        <th>Attribute</th>
                        <th>Comparator</th>
                        <th>Value</th>
                        <th>Priority</th>
                        <th>Updated</th>
                        <th>User</th>
                    </tr>
                    </tfoot>
                </table>
                <a href="../backend/crud/restriction/general/by/credit/card/id?Id=<?php echo $_GET["Id"]; ?>" class="source">Source</a>
            </div>

        </td>
    </tr>
</table>


</body>
</html>