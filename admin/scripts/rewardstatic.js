/**
 * Created by Work on 6/8/2016.
 */


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
            }, {
                label: "SubCategory:",
                name: "SubCategory"
            }, {
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
            { "data": "SubCategory" },
            { "data": "Description" },
            { "data": "UpdateTime",edit: false, visible: false  },
            { "data": "UpdateUser", visible: false }
        ],
        select: true,
        buttons: [
                { extend: "create", editor: rewardCategoryEditor },
                { extend: "edit",   editor: rewardCategoryEditor },
                { extend: "remove", editor: rewardCategoryEditor }
        ]
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
            }, {
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


$(document).ready(function() {
    $('#rewardtype').dataTable({
        dom: "rtTip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/reward/type/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "RewardTypeId", edit: false},
            {"data": "Name"},
            {"data": "Description"},
            {"data": "IsFinite"},
            {"data": "UpdateTime", edit: false, visible: false},
            {"data": "UpdateUser", visible: false}
        ],
        select: true,
        buttons: [
                {extend: "editor_create", editor: rewardTypeEditor},
                {extend: "editor_edit", editor: rewardTypeEditor},
                {extend: "editor_remove", editor: rewardTypeEditor}
            ]
    });
});