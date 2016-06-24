/**
 * Created by Work on 6/11/2016.
 */

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



$(document).ready(function() {
    $('#scenes').dataTable({
        dom: "BrtTip",
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
        ],
        select: true,
        buttons: [
            {extend: "create", editor: sceneEditor},
            {extend: "edit", editor: sceneEditor},
            {extend: "remove", editor: sceneEditor}
        ]
    });
});