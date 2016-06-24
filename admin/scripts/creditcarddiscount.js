/**
 * Created by Work on 6/12/2016.
 */
var stores = getStores();

$(document).ready(function () {
    var creditCardId = getQueryVariable("id");

    var discountEditor = new $.fn.dataTable.Editor({
        ajax: {
            create: '../backend/crud/discount/create', // default method is POST
            edit: {
                type: 'PUT',
                url: '../backend/crud/discount/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/discount/delete'
            }
        },
        table: "#discountTable",
        idSrc: "DiscountId",
        fields: [{
            label: "Id:",
            name: "DiscountId",
            type: "readonly"
        }, {
            label: "CardId:",
            name: "CreditCard.Id",
            type: "readonly",
            def: creditCardId
        }, {
            label: "Category/Store:",
            name: "Store.Id",
            type:  "select",
            options: stores
        }, {
            label: "Description:",
            name: "Description"
        }, {
            label: "Percentage:",
            name: "Percentage"
        }, {
            label: "Multiple:",
            name: "Multiple"
        }, {
            label: "Conditions:",
            name: "Conditions"
        }, {
            label: "StartDate:",
            name: "StartDate",
            type:       "date",
            dateFormat: 'yy-mm-dd'
        }, {
            label: "EndDate:",
            name: "EndDate",
            type:       "date",
            dateFormat: 'yy-mm-dd'
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

    $('#discountTable').dataTable({
        dom: "BtTr",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/discount/by/creditcard?Id=" + creditCardId,
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "DiscountId", edit: false, width: 5},
            {"data": "CreditCard.Name", editField: "CreditCard.Id", visible: false},
            {"data": "Store.Category", editField: "Store.Category", edit:false},
            {"data": "Store.Name", editField: "Store.Id"},
            {"data": "Description", width: 20},
            {"data": "Percentage", width: 10},
            {"data": "Multiple", width: 10},
            {"data": "Conditions", width: 20},
            {"data": "StartDate", width: 20},
            {"data": "EndDate", width: 20},
            {"data": "Reference", width: 10, visible:false},
            {"data": "UpdateTime", edit: false, visible: false},
            {"data": "UpdateUser", visible: false}
        ],
        select: true,
        buttons: [
            {extend: "create", editor: discountEditor},
            {extend: "edit", editor: discountEditor},
            {extend: "remove", editor: discountEditor}
        ]
    });

});