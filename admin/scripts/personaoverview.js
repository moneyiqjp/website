/**
 * Created by Work on 6/11/2016.
 */

var rewardCategory = getRewardCategories();
var personas = queryIdValMap('../backend/crud/persona/all',"PersonaId","Name");
var scenes = queryIdValMap('../backend/crud/scene/all',"SceneId","Name");

personaEditor = new $.fn.dataTable.Editor({
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
            label: "Identifier:",
            name: "Identity"
        }, {
            label: "Name:",
            name: "Name"
        }, {
            label: "Description (short):",
            name: "DescriptionShort"
        }, {
            label: "Description (long):",
            name: "DescriptionLong"
        }, {
            label: "Default spend:",
            name: "DefaultSpend"
        }, {
            label: "Sorting:",
            name: "Sorting",
            type: "select",
            options: ['reward', 'points', 'rate', 'campaign-points']
        }, {
            label: "RewardCategoryId:",
            name: "RewardCategory.RewardCategoryId",
            type: "select",
            options: rewardCategory
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
personaToSceneEditor = new $.fn.dataTable.Editor({
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



$(document).ready(function() {
    $('#personas').dataTable({
        dom: "BrtTip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/persona/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "autoWidth": false,
        "columns": [
            {"data": "PersonaId", edit: false, width: "15px"},
            {"data": "Identity", width:"10%"},
            {"data": "Name", width:"20%"},
            {"data": "DescriptionShort", width:"20%"},
            {"data": "DescriptionLong", visible: true, width:"40%"},
            {"data": "DefaultSpend", visible: false},
            {"data": "Sorting", visible: false},
            {"data": "RewardCategory.Name", editField: "RewardCategory.RestrictionTypeId", visible: false},
            {"data": "UpdateTime", edit: false, visible: false},
            {"data": "UpdateUser", visible: false},
            {"data": "RewardCategory.SubCategory", edit: false, visible: false},
            {
                "data": "PersonaId",
                render: function (data, type, row) {
                    if (type === 'display') {
                        var url = window.location.href.toString().split(window.location.host)[1];
                        url = url.split("?")[0];
                        return "<a href='" + url + "?item=PersonaDetails&sub=personadetails&id=" + data + "' ><i class='fa fa-file-text-o'></i></a>";
                    }
                    return data;
                },
                width:"15px"
            }
        ],
        select: true,
        buttons: [
                {extend: "create", editor: personaEditor},
                {extend: "edit", editor: personaEditor},
                {extend: "remove", editor: personaEditor}
        ]
    });

    $('#personaSceneMap').dataTable({
        dom: "BrtTip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/persona/to/scene/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "Id", edit: false},
            {"data": "Persona.Name", editField: "Persona.PersonaId"},
            {"data": "Scene.Name", editField: "Scene.SceneId"},
            {"data": "Allocation"},
            {"data": "UpdateTime", edit: false, visible: false},
            {"data": "UpdateUser", visible: false}
        ],
        select: true,
        buttons: [
                {extend: "create", editor: personaToSceneEditor},
                {extend: "edit", editor: personaToSceneEditor},
                {extend: "remove", editor: personaToSceneEditor}
            ]
    });
});