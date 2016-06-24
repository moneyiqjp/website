/**
 * Created by Work on 6/11/2016.
 */
var scenes = queryIdValMap('../backend/crud/scene/all',"SceneId","Name");
var categories = queryIdValMap('../backend/crud/storecategory/all',"StoreCategoryId","Name");
var rewardCategories = getRewardCategories();
sceneToCategoryEditor = new $.fn.dataTable.Editor({
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

sceneToRewardCategoryEditor = new $.fn.dataTable.Editor({
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
    $('#sceneCategoryMap').dataTable({
        dom: "BrtTip",
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
        ],
        select: true,
        buttons: [
                {extend: "create", editor: sceneToCategoryEditor},
                {extend: "remove", editor: sceneToCategoryEditor}
        ]
    });

    $('#sceneRewardCategoryMap').dataTable({
        dom: "BrtTip",
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
            {"data": "RewardCategory.SubCategory", edit: false},
            {"data": "UpdateTime", edit: false, visible: false},
            {"data": "UpdateUser", visible: false}
        ],
        select: true,
        buttons: [
                {extend: "create", editor: sceneToRewardCategoryEditor},
                {extend: "remove", editor: sceneToRewardCategoryEditor}
        ]
    });

});