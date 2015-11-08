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
                table: "#personas",
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

        sceneEditor = new $.fn.dataTable.Editor(
            {
                ajax: {
                    create: '../backend/crud/scene/create', // default method is POST
                    edit: {
                        type: 'PUT',
                        url:  '../backend/crud/scene/update'
                    },
                    remove: {
                        type: 'DELETE',
                        url: '../backend/crud/scene/delete'
                    }
                },
                table: "#scenes",
                idSrc: "SceneId",
                fields: [
                    {
                        label: "Id:",
                        name: "SceneId",
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
                    },   {
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

        sceneToCategoryEditor = new $.fn.dataTable.Editor(
            {
                ajax: {
                    create: '../backend/crud/scene/to/category/create', // default method is POST
                    edit: {
                        type: 'PUT',
                        url:  '../backend/crud/scene/to/category/update'
                    },
                    remove: {
                        type: 'DELETE',
                        url: '../backend/crud/scene/to/category/delete'
                    }
                },
                table: "#sceneCategoryMap",
                idSrc: "Id",
                fields: [
                    {
                        label: "Id:",
                        name: "Id",
                        type:  "readonly"
                    },{
                        label: "Scene:",
                        name: "Scene.SceneId",
                        type: "select",
                        options: scenes
                    }, {
                        label: "Category:",
                        name: "StoreCategory.StoreCategoryId",
                        type: "select",
                        options: categories
                    },   {
                        label: "Update date:",
                        name: "UpdateTime",
                        type: "readonly"
                    }, {
                        label: "Update user:",
                        name: "UpdateUser"
                    }
                ]
            });

        sceneToRewardCategoryEditor = new $.fn.dataTable.Editor(
            {
                ajax: {
                    create: '../backend/crud/scene/to/reward/category/create', // default method is POST
                    edit: {
                        type: 'PUT',
                        url:  '../backend/crud/scene/to/reward/category/update'
                    },
                    remove: {
                        type: 'DELETE',
                        url: '../backend/crud/scene/to/reward/category/delete'
                    }
                },
                table: "#sceneRewardCategoryMap",
                idSrc: "Id",
                fields: [
                    {
                        label: "Id:",
                        name: "Id",
                        type:  "readonly"
                    },{
                        label: "Scene:",
                        name: "Scene.SceneId",
                        type: "select",
                        options: scenes
                    }, {
                        label: "Category:",
                        name: "RewardCategory.RewardCategoryId",
                        type: "select",
                        options: rewardCategories
                    },   {
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

            $('#personas').dataTable({
                dom: "rtTip",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/crud/persona/all",
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    {"data": "PersonaId", edit: false},
                    {"data": "Name"},
                    {"data": "Description"},
                    {
                        "data": "PersonaId",
                        render: function ( data, type, row ) {
                            if ( type === 'display' ) {
                                return "<a href='persona_details.php?Id=" + data + "'>Details</a>";
                            }
                            return data;
                        }
                    },
                    {"data": "UpdateTime", edit: false, visible: false},
                    {"data": "UpdateUser", visible: false}
                ]
                , tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        {sExtends: "editor_create", editor: personaEditor},
                        {sExtends: "editor_edit", editor: personaEditor},
                        {sExtends: "editor_remove", editor: personaEditor}
                    ]
                }
            });

            $('#scenes').dataTable({
                dom: "rtTip",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/crud/scene/all",
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    {"data": "SceneId", edit: false},
                    {"data": "Name"},
                    {"data": "Description"},
                    {"data": "UpdateTime", edit: false, visible: false},
                    {"data": "UpdateUser", visible: false}
                ]
                , tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        {sExtends: "editor_create", editor: sceneEditor},
                        {sExtends: "editor_edit", editor: sceneEditor},
                        {sExtends: "editor_remove", editor: sceneEditor}
                    ]
                }
            });

            $('#personaSceneMap').dataTable({
                dom: "rtTip",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/crud/persona/to/scene/all",
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

            $('#sceneCategoryMap').dataTable({
                dom: "rtTip",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/crud/scene/to/category/all",
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    {"data": "Id", edit: false},
                    {"data": "Scene.Name", editField:"Scene.SceneId"},
                    {"data": "StoreCategory.Name", editField:"StoreCategory.StoreCategoryId"},
                    {"data": "UpdateTime", edit: false, visible: false},
                    {"data": "UpdateUser", visible: false}
                ]
                , tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        {sExtends: "editor_create", editor: sceneToCategoryEditor},
                        {sExtends: "editor_remove", editor: sceneToCategoryEditor}
                    ]
                }
            });

            $('#sceneRewardCategoryMap').dataTable({
                dom: "rtTip",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/crud/scene/to/reward/category/all",
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    {"data": "Id", edit: false},
                    {"data": "Scene.Name", editField:"Scene.SceneId"},
                    {"data": "RewardCategory.Name", editField:"RewardCategory.RewardCategoryId"},
                    {"data": "UpdateTime", edit: false, visible: false},
                    {"data": "UpdateUser", visible: false}
                ]
                , tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        {sExtends: "editor_create", editor: sceneToRewardCategoryEditor},
                        {sExtends: "editor_remove", editor: sceneToRewardCategoryEditor}
                    ]
                }
            });

        })

    </script>
</head>
<body>
    <div style="width: 40%; margin: 25px 25px 25px 25px;float: left">
        <div class="table-headline"><a name="rewardtypes">Personas</a></div>
        <table id="personas" class="display" cellspacing="0" width="98%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Details</th>
                <th>Updated</th>
                <th>User</th>
            </thead>

            <tfoot>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Details</th>
                <th>Updated</th>
                <th>User</th>
            </tfoot>
        </table>
    </div>

    <div style="width: 40%; margin: 25px 25px 25px 25px;float: left">
        <div class="table-headline"><a name="rewardtypes">Scenes</a></div>
        <table id="scenes" class="display" cellspacing="0" width="98%">
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

    <div style="width: 40%; margin: 25px 25px 25px 25px;float: left">
        <div class="table-headline"><a name="rewardtypes">Persona To Scene</a></div>
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

    <div style="width: 40%; margin: 25px 25px 25px 25px;float: left">
        <div class="table-headline"><a name="rewardtypes">Scene To Store Category</a></div>
        <table id="sceneCategoryMap" class="display" cellspacing="0" width="98%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Scene</th>
                <th>Category</th>
                <th>Updated</th>
                <th>User</th>
            </thead>

            <tfoot>
            <tr>
                <th>Id</th>
                <th>Scene</th>
                <th>Category</th>
                <th>Updated</th>
                <th>User</th>
            </tfoot>
        </table>
    </div>

    <div style="width: 40%; margin: 25px 25px 25px 25px;float: left">
        <div class="table-headline"><a name="scenetorewardcategory">Scene To Reward Category</a></div>
        <table id="sceneRewardCategoryMap" class="display" cellspacing="0" width="98%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Scene</th>
                <th>Reward</th>
                <th>Updated</th>
                <th>User</th>
            </thead>

            <tfoot>
            <tr>
                <th>Id</th>
                <th>Scene</th>
                <th>Reward</th>
                <th>Updated</th>
                <th>User</th>
            </tfoot>
        </table>
        <a href="http://localhost/backend/crud/scene/to/reward/category" class="source">Source</a>
    </div>



</body>
</html>