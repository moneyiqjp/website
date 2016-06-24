/**
 * Created by Work on 6/12/2016.
 */
var restrictionTypes = queryIdValMap('../backend/crud/restriction/type/all',"RestrictionTypeId","Name");

$(document).ready(function () {
    var creditCardId = getQueryVariable("id");


    var creditCardRestrictionEditor = new $.fn.dataTable.Editor({
        ajax: {
            create: '../backend/crud/restriction/credit/card/general/create', // default method is POST
            edit: {
                type: 'PUT',
                url:  '../backend/crud/restriction/credit/card/general/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/restriction/credit/card/general/delete'
            }
        },
        table: "#creditCardRestrictionTable",
        idSrc: "CreditCardRestrictionId",
        fields: [
            {
                label: "Id:",
                name: "CreditCardRestrictionId",
                type:  "readonly"
            },{
                label: "CreditCard:",
                name: "CreditCard.credit_card_id",
                type:  "readonly",
                def: creditCardId
            },{
                label: "RestrictionType:",
                name: "RestrictionType.RestrictionTypeId",
                type: "select",
                options:restrictionTypes
            }, {
                label: "Comparator",
                name: "Comparator",
                type: "select",
                options: ['=', '!=', '>', '<', 'in', 'not in']
            },  {
                label: "Value:",
                name:  "Value"
            },  {
                label: "Priority",
                name: "Priority"
            },  {
                label: "Update date:",
                name: "update_time",
                type: "readonly"
            }, {
                label: "Update user:",
                name: "update_user"
            }
        ]
    });

    $('#creditCardRestrictionTable').dataTable({
        dom: "BlfrtTip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/restriction/credit/card/general/by/credit/card/id?Id=" + creditCardId,
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "CreditCardRestrictionId",width:"125px"},
            {"data": "CreditCard.name",editField: "CreditCard.credit_card_id", width:"150px"},
            {"data": "RestrictionType.Name", editField: "RestrictionType.RestrictionTypeId",width:"150px"},
            {"data": "Comparator",width:"100px"},
            {"data": "Value",width:"100px"},
            {"data": "Priority",width:"50px", visible:false},
            {"data": "UpdateTime", visible:false,width:"20px"},
            {"data": "UpdateUser",  visible:false,width:"20px"}
        ],
        select: true,
        buttons: [
                {extend: "create", editor: creditCardRestrictionEditor},
                {extend: "edit", editor: creditCardRestrictionEditor},
                {extend: "remove", editor: creditCardRestrictionEditor}
            ]
    } );

});