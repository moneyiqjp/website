/**
 * Created by Work on 6/12/2016.
 */
var paymentTypes = queryIdValMap('../backend/crud/payment/type/all',"PaymentTypeId","PaymentType");

$(document).ready(function () {
    var creditCardId = getQueryVariable("id");

    var interestEditor = new $.fn.dataTable.Editor({
        ajax: {
            create: '../backend/crud/interest/create', // default method is POST
            edit: {
                type: 'PUT',
                url: '../backend/crud/interest/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/interest/delete'
            }
        },
        table: "#interestTable",
        idSrc: "InterestId",
        fields: [{
            label: "Id:",
            name: "InterestId",
            type: "readonly"
        }, {
            label: "CardId:",
            name: "CreditCard.Id",
            type: "readonly",
            def: creditCardId
        }, {
            label: "PaymentType:",
            name: "PaymentType.Id",
            type:  "select",
            options: paymentTypes
        }, {
            label: "MinInterest:",
            name: "MinInterest"
        }, {
            label: "MaxInterest:",
            name: "MaxInterest"
        },  {
            label: "Display:",
            name: "Display"
        }, {
            label: "Reference",
            name:  "Reference",
            type:"EditAndLink"
        }, {
            label: "Update date:",
            name: "UpdateTime",
            type: "readonly"
        }, {
            label: "Update user:",
            name: "UpdateUser",
            type: "readonly"
        }]
    });


    var feeEditor = new $.fn.dataTable.Editor({
        ajax: {
            create: '../backend/crud/fee/create', // default method is POST
            edit: {
                type: 'PUT',
                url: '../backend/crud/fee/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/fee/delete'
            }
        },
        table: "#feeTable",
        idSrc: "FeeId",
        fields: [{
            label: "Id:",
            name: "FeeId",
            type: "readonly"
        }, {
            label: "CardId:",
            name: "CreditCard.Id",
            type: "readonly",
            def: creditCardId
        }, {
            label: "Type:",
            name: "FeeType",
            type:  "select",
            options: [
                { label: "Year 1", value: 1 },
                { label: "Year 2", value: 2 }
            ]
        }, {
            label: "FeeAmount:",
            name: "FeeAmount"
        }, {
            label: "YearlyOccurrence:",
            name: "YearlyOccurrence"
        }, {
            label: "startYear:",
            name: "startYear"
        }, {
            label: "endYear:",
            name: "endYear"
        }, {
            label: "Reference",
            name:  "Reference",
            type:"EditAndLink"
        }, {
            label: "Update date:",
            name: "UpdateTime",
            type: "readonly"
        }, {
            label: "Update user:",
            name: "UpdateUser",
            type: "readonly"
        }]
    });

    $('#feeTable').dataTable({
        dom: "BtTr",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/fee/by/creditcard?Id=" + creditCardId,
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "FeeId", edit: false, width: 5},
            {"data": "CreditCard.Name", editField: "CreditCard.Id", visible: false},
            {"data": "FeeType", width: 20},
            {"data": "FeeAmount", width: 20},
            {"data": "YearlyOccurrence", width: 10},
            {"data": "startYear", width: 10},
            {"data": "endYear", width: 10},
            {"data": "Reference", width: 10, visible:false},
            {"data": "UpdateTime", visible: false},
            {"data": "UpdateUser", visible: false}
        ],
        select: true,
        buttons: [
                {extend: "create", editor: feeEditor},
                {extend: "edit", editor: feeEditor},
                {extend: "remove", editor: feeEditor}
        ]
    });

    $('#interestTable').dataTable({
        dom: "BtTr",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/interest/by/creditcard?Id=" + creditCardId,
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "InterestId", edit: false, width: 5},
            {"data": "CreditCard.Name", editField: "CreditCard.Id", visible: false},
            {"data": "PaymentType.Name", editField: "PaymentType.Id"},
            {"data": "MinInterest", width: 20},
            {"data": "MaxInterest", width: 10},
            {"data": "Display", width: 20},
            {"data": "Reference", width: 10, visible:false},
            {"data": "UpdateTime", visible: false},
            {"data": "UpdateUser", visible: false}
        ],
        select: true,
        buttons: [
                {extend: "create", editor: interestEditor},
                {extend: "edit", editor: interestEditor},
                {extend: "remove", editor: interestEditor}
        ]
    });
});