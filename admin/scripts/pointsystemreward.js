/**
 * Created by Work on 6/12/2016.
 */
var rewardTypes = queryIdValMap('../backend/display/reward/type/all',"value","label");
var units = queryIdValMap('../backend/crud/unit/all',"UnitId","Description");
var rewardCategories = getRewardCategories();

$(document).ready(function () {
    var pointSystemId = getQueryVariable("id");
    var rewardEditor = new $.fn.dataTable.Editor(
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


    $('#rewardTable').dataTable({
        dom: "BrtT",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/reward/by/pointsystem?Id=" + pointSystemId,
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
        select: true,
        buttons: [
            {extend: "create", editor: rewardEditor},
            {extend: "edit", editor: rewardEditor},
            {extend: "remove", editor: rewardEditor}
        ]
    });
});
