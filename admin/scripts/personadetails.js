/**
 * Created by Work on 6/12/2016.
 */
var rewardCategory = getRewardCategories();
$(document).ready(function () {
    var personaId = getQueryVariable("id");

    var personaEditor = new $.fn.dataTable.Editor(
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
                    label: "Identifier:",
                    name: "Identity"
                }, {
                    label: "Name:",
                    name: "Name"
                }, {
                    label: "Description (Short):",
                    name: "DescriptionShort"
                }, {
                    label: "Description (Long):",
                    name: "DescriptionLong"
                },    {
                    label: "Default spend:",
                    name: "DefaultSpend"
                }, {
                    label: "Sorting:",
                    name: "Sorting",
                    type: "select",
                    options: ['reward', 'points', 'rate', 'campaign-points','reward-net']
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


    $('#personaTable').dataTable({
        dom: "BrtT",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/persona/by/id?Id=" + personaId,
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "PersonaId", edit: false, visible: false},
            {"data": "Identity"},
            {"data": "Name"},
            {"data": "DescriptionShort", width: "80"},
            {"data": "DescriptionLong", width: "80", visible:false},
            {"data": "DefaultSpend"},
            {"data": "Sorting"},
            {"data": "RewardCategory.Name", editField: "RewardCategory.RestrictionTypeId"},
            {"data": "RewardCategory.SubCategory", edit: false},
            {"data": "UpdateTime", edit: false, visible: false},
            {"data": "UpdateUser", visible: false}
        ],
        select: true,
        buttons: [
                {extend: "edit", editor: personaEditor}
        ]
    });

});
