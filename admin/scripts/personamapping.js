/**
 * Created by Work on 6/12/2016.
 */
var scenes = queryIdValMap('../backend/crud/scene/all',"SceneId","Name");
var stores = getStores();
$(document).ready(function () {
    var personaId = getQueryVariable("id");

    var personaToSceneEditor = new $.fn.dataTable.Editor(
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
                    type: "readonly",
                    def: personaId
                    /*
                     type: "select",
                     options: personas
                     */
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

    var personaToStoreEditor = new $.fn.dataTable.Editor(
        {
            ajax: {
                create: '../backend/crud/persona/to/store/create', // default method is POST
                edit: {
                    type: 'PUT',
                    url:  '../backend/crud/persona/to/store/update'
                },
                remove: {
                    type: 'DELETE',
                    url: '../backend/crud/persona/to/store/delete'
                }
            },
            table: "#personaStoreMap",
            idSrc: "Id",
            fields: [
                {
                    label: "Id:",
                    name: "Id",
                    type:  "readonly"
                }, {
                    label: "Persona:",
                    name: "Persona.PersonaId",
                    type: "readonly",
                    def: personaId
                    /*
                     type: "select",
                     options: personas
                     */
                }, {
                    label: "Store:",
                    name: "Store.StoreId",
                    type: "select",
                    options: stores
                }, {
                    label: "Allocation:",
                    name: "Allocation"
                }, {
                    label: "Exclude:",
                    name: "Negative",
                    type: "select",
                    options: [ 0, 1]
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


    $('#personaSceneMap').dataTable({
        dom: "BrtTip",
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
        ],
        select: true,
        buttons: [
                {extend: "create", editor: personaToSceneEditor},
                {extend: "edit", editor: personaToSceneEditor},
                {extend: "remove", editor: personaToSceneEditor}
        ]
    });




    $('#personaStoreMap').dataTable({
        dom: "BrtTip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/persona/to/store/by/persona/id?Id=" + personaId,
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "Id", edit: false},
            {"data": "Persona.Name", editField:"Persona.PersonaId"},
            {"data": "Store.StoreName", editField:"Store.StoreId"},
            {"data": "Allocation"},
            {"data": "Negative"},
            {"data": "UpdateTime", edit: false, visible: false},
            {"data": "UpdateUser", visible: false}
        ],
        select: true,
        buttons: [
                {extend: "create", editor: personaToStoreEditor},
                {extend: "edit", editor: personaToStoreEditor},
                {extend: "remove", editor: personaToStoreEditor}
        ]
    });

});