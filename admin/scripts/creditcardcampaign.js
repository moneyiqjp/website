/**
 * Created by Work on 6/12/2016.
 */

$(document).ready(function () {
    var creditCardId = getQueryVariable("id");
    var campaignEditor = new $.fn.dataTable.Editor({
        ajax: {
            create: '../backend/crud/campaign/create', // default method is POST
            edit: {
                type: 'PUT',
                url: '../backend/crud/campaign/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/campaign/delete'
            }
        },
        table: "#campaignTable",
        idSrc: "CampaignId",
        fields: [{
            label: "Id:",
            name: "CampaignId",
            type: "readonly"
        }, {
            label: "CardId:",
            name: "CreditCard.Id",
            type: "readonly",
            def: creditCardId
        }, {
            label: "Name:",
            name: "Name"
        }, {
            label: "Description:",
            name: "Description"
        }, {
            label: "MaxPoints:",
            name: "MaxPoints"
        }, {
            label: "ValueInYen:",
            name: "ValueInYen"
        }, {
            label: "StartDate:",
            name: "StartDate",
            type:       "date",
            def: isoTodayString
        }, {
            label: "EndDate:",
            name:  "EndDate",
            type:  "date",
            def:   isoMaxString
        }, {
            label: "Reference",
            name:  "Reference",
            type:"EditAndLink"
        },  {
            label: "Update date:",
            name:  "UpdateTime",
            type:  "readonly"
        }, {
            label: "Update user:",
            name:  "UpdateUser",
            type:  "readonly"
        }]
    });


    $('#campaignTable').dataTable({
        dom: "BtTr",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/campaign/by/creditcard?Id=" + creditCardId,
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "CampaignId", edit: false, width: 5},
            {"data": "CreditCard.Name", editField: "CreditCard.Id", visible: false},
            {"data": "Name", width: 10},
            {"data": "Description", width: 20},
            {"data": "MaxPoints", width: 10},
            {"data": "ValueInYen", width: 10},
            {"data": "StartDate", width: 10},
            {"data": "EndDate", width: 10},
            {"data": "Reference", width: 10, visible:false},
            {"data": "UpdateTime", edit: false, visible: false},
            {"data": "UpdateUser", visible: false}
        ],
        select: true,
        buttons: [
                {extend: "create", editor: campaignEditor},
                {extend: "edit", editor: campaignEditor},
                {extend: "remove", editor: campaignEditor}
        ]
    });
});