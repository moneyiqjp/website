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
        var personaId = -1;
        <?php if(array_key_exists('Id',$_GET)) { echo "personaId=" . htmlspecialchars($_GET["Id"]) . ";\n"; } ?>

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
                        label: tmpStore[index]["Category"] + " - " + tmpStore[index]["StoreName"]
                    })
                }
            }
        }

        var paymentTypes = [];
         tmp = $.ajax({
            url: '../backend/crud/payment/type/all',
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
                    paymentTypes.push({
                        value: tmpStore[index]["PaymentTypeId"],
                        label: tmpStore[index]["PaymentType"]
                    })
                }
            }
        }

        var insuranceTypes = [];
        tmp = $.ajax({
            url: '../backend/crud/insurance/type/all',
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
                    insuranceTypes.push({
                        value: tmpStore[index]["InsuranceTypeId"],
                        label: tmpStore[index]["TypeName"] + " - " + tmpStore[index]["SubtypeName"] + " - " + tmpStore[index]["Region"]
                    })
                }
            }
        }

        var pointSystems = [];
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
                    pointSystems.push({
                        value: tmpStore[index]["PointSystemId"],
                        label: tmpStore[index]["PointSystemName"]
                    })
                }
            }
        }


        var scenes = [];
        tmp = $.ajax({
            url: '../backend/crud/scene/all',
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
                    scenes.push({
                        value: tmpStore[index]["SceneId"],
                        label: tmpStore[index]["Name"]
                    })
                }
            }
        }

        var personas = [];
        tmp = $.ajax({
            url: '../backend/crud/persona/all',
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
                    personas.push({
                        value: tmpStore[index]["PersonaId"],
                        label: tmpStore[index]["Name"]
                    })
                }
            }
        }


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


        if(personaId>0) {
            personaToSceneEditor = new $.fn.dataTable.Editor(
                {
                    ajax: {
                        create: '../backend/crud/persona/to/scene/create', // default method is POST
                        edit: {
                            type: 'PUT',
                            url:  '../backend/crud/persona/to/scene/update'
                        },
                        remove: {
                            type: 'DELETE',
                            url: '../backend/crud/persona/to/scene/delete'
                        }
                    },
                    table: "#personaSceneMap",
                    idSrc: "Id",
                    fields: [
                        {
                            label: "Id:",
                            name: "Id",
                            type:  "readonly"
                        }, {
                            label: "Persona:",
                            name: "Persona.PersonaId",
                            type: "select",
                            options: personas
                        }, {
                            label: "Scene:",
                            name: "Scene.SceneId",
                            type: "select",
                            options: scenes
                        }, {
                            label: "Allocation:",
                            name: "Allocation"
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

        featureEditor = new $.fn.dataTable.Editor({
            ajax: {
                create: '../backend/crud/restriction/feature/create', // default method is POST
                edit: {
                    type: 'PUT',
                    url: '../backend/crud/restriction/feature/update'
                },
                remove: {
                    type: 'DELETE',
                    url: '../backend/crud/restriction/feature/delete'
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
                    label: "PersonaId:",
                    name: "PersonaId",
                    type: "readonly"
                }, {
                    label: "FeatureTypeId:",
                    name: "FeatureTypeId",
                    type: "readonly"
                }, {
                    label: "Name:",
                    name: "Name",
                    type: "readonly"
                },  {
                    label: "Category:",
                    name: "Category",
                    type: "readonly"
                },{
                    label: "Description:",
                    name: "Description",
                    type: "readonly"
                }, {
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

            restrictionEditor = new $.fn.dataTable.Editor(
                {
                    ajax: {
                        create: '../backend/crud/restriction/general/create', // default method is POST
                        edit: {
                            type: 'PUT',
                            url:  '../backend/crud/restriction/general/update'
                        },
                        remove: {
                            type: 'DELETE',
                            url: '../backend/crud/restriction/general/delete'
                        }
                    },
                    table: "#restrictionTable",
                    idSrc: "GeneralRestrictionId",
                    fields: [
                        {
                            label: "Id:",
                            name: "GeneralRestrictionId",
                            type:  "readonly"
                        },{
                            label: "Persona:",
                            name: "Persona.PersonaId",
                            type:  "select",
                            options: personas
                        },{
                            label: "RestrictionType:",
                            name: "RestrictionType.RestrictionTypeId",
                            type: "select",
                            options:restrictionTypes
                        },  {
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



            personaEditor = new $.fn.dataTable.Editor(
                {
                    ajax: {
                        create: '../backend/crud/persona/create', // default method is POST
                        edit: {
                            type: 'PUT',
                            url:  '../backend/crud/persona/update'
                        },
                        remove: {
                            type: 'DELETE',
                            url: '../backend/crud/persona/delete'
                        }
                    },
                    table: "#personaTable",
                    idSrc: "PersonaId",
                    fields: [
                        {
                            label: "Id:",
                            name: "PersonaId",
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



            $(document).ready(function () {
            $('#featureTable').dataTable({
                dom: "tTr",
                "pageLength": 50,
                "ajax": {
                    "url": "../backend/crud/restriction/feature/by/persona/id?Id=" + personaId,
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                paging: false,
                searching: false,
                "order": [[2, "asc"], [3, "asc"]],
                "columns": [
                    {"data": "FeatureId", edit: false, visible: false},
                    {"data": "PersonaId", edit: false, visible: false},
                    {"data": "FeatureTypeId", visible: false},
                    {"data": "Category", edit: false, width: "50"},
                    {"data": "Name", edit: false},
                    {"data": "Description", edit: false, visible: false, width: "80"},
                    {
                        "data": "Active",
                        render: function (data, type, row) {
                            if (type === 'display') {
                                if(data==0) {
                                    return '<input type="checkbox" class="editor-afield">';
                                } else {
                                    return '<input type="checkbox" class="editor-afield" checked>';
                                }
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
                    featureEditor.inline(this);
                });




            $('#personaSceneMap').dataTable({
                dom: "rtTip",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/crud/persona/to/scene/by/persona/id?Id=" + personaId,
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    {"data": "Id", edit: false},
                    {"data": "Persona.Name", editField:"Persona.PersonaId"},
                    {"data": "Scene.Name", editField:"Scene.SceneId"},
                    {"data": "Allocation"},
                    {"data": "UpdateTime", edit: false, visible: false},
                    {"data": "UpdateUser", visible: false}
                ]
                , tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        {sExtends: "editor_create", editor: personaToSceneEditor},
                        {sExtends: "editor_edit", editor: personaToSceneEditor},
                        {sExtends: "editor_remove", editor: personaToSceneEditor}
                    ]
                }
            });


            $('#restrictionTable').dataTable({
                dom: "lfrtTip",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/crud/restriction/general/by/persona/id?Id=" + personaId,
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    {"data": "GeneralRestrictionId",width:"125px"},
                    {"data": "Persona.Name",editField: "Persona.PersonaId", width:"150px"},
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
                        {sExtends: "editor_create", editor: restrictionEditor},
                        {sExtends: "editor_edit", editor: restrictionEditor},
                        {sExtends: "editor_remove", editor: restrictionEditor}
                    ]
                }
            });


            $('#personaTable').dataTable({
                dom: "rtT",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/crud/persona/by/id?Id=" + personaId,
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    {"data": "PersonaId", edit: false},
                    {"data": "Name"},
                    {"data": "Description"},
                    {"data": "UpdateTime", edit: false, visible: false},
                    {"data": "UpdateUser", visible: false}
                ]
                , tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        {sExtends: "editor_edit", editor: personaEditor}
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
        echo "Failed to retrieve persona id, please go back and select a valid persona";
        echo "</div>";
    }
?>

<table>
    <tr>
        <td colspan="2">
            <div class="table-headline"><a name="issuers">Persona details (<?php if(array_key_exists('Id',$_GET)) { echo htmlspecialchars($_GET["Id"]); } ?>)</a></div>
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
                        Feature Restrictions
                    </td>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>PersonaId</th>
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
                    <th>ID</th>
                    <th>PersonaId</th>
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

        </td>
        <td valign="top">
            <div style="width: 98%; margin: 25px 25px 25px 25px;float: left">
                <div class="table-headline"><a name="rewardtypes">Description</a></div>
                <table id="personaTable" class="display" cellspacing="0" width="98%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Updated</th>
                        <th>User</th>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Updated</th>
                        <th>User</th>
                    </tfoot>
                </table>
            </div>

            <br />

            <div style="width: 98%; margin: 25px 25px 25px 25px;float: left">
                <div class="table-headline"><a name="rewardtypes">Persona To Scene Mapping</a></div>
                <table id="personaSceneMap" class="display" cellspacing="0" width="98%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Persona</th>
                        <th>Scene</th>
                        <th>Allocation</th>
                        <th>Updated</th>
                        <th>User</th>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Persona</th>
                        <th>Scene</th>
                        <th>Allocation</th>
                        <th>Updated</th>
                        <th>User</th>
                    </tfoot>
                </table>
                <a href="http://localhost/backend/crud/persona/to/scene/all" class="source">PersonaToScene JSON</a>
            </div>
        <br>
            <div style="width: 98%;float:left;">
                <div class="table-headline"><a name="restrictions">General Restrictions</a></div>
                <table id="restrictionTable" class="display" cellspacing="0" width="98%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Persona</th>
                        <th>RestrictionType</th>
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
                        <th>Persona</th>
                        <th>RestrictionType</th>
                        <th>Comparator</th>
                        <th>Value</th>
                        <th>Priority</th>
                        <th>Updated</th>
                        <th>User</th>
                    </tr>
                    </tfoot>
                </table>
                <a href="http://localhost/backend/crud/restriction/general/all" class="source">Source</a>
            </div>

        </td>
    </tr>
    <tr>
        <td valign="top">

        </td>
    </tr>
    <tr>
        <td valign="top">

        </td>
    </tr>
    <tr>
        <td colspan="2">

        </td>
    </tr>
</table>


</body>
</html>