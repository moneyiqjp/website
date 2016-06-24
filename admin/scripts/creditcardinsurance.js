/**
 * Created by Work on 6/12/2016.
 */
var insuranceTypes = getInsuranceType();

$(document).ready(function () {
    var creditCardId = getQueryVariable("id");
    
    var insuranceEditor = new $.fn.dataTable.Editor({
        ajax: {
            create: '../backend/crud/insurance/create', // default method is POST
            edit: {
                type: 'PUT',
                url: '../backend/crud/insurance/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/insurance/delete'
            }
        },
        table: "#insuranceTable",
        idSrc: "InsuranceId",
        "data": "CreditCard",
        fields: [{
            label: "Id:",
            name: "InsuranceId",
            type: "readonly"
        },  {
            label: "Card Id:",
            name: "CreditCard.Id",
            type: "readonly",
            def: creditCardId
        },{
            label: "Type:",
            name: "InsuranceType.InsuranceTypeId",
            type:  "select",
            options: insuranceTypes
        }, {
            label: "MaxInsuredAmount:",
            name: "MaxInsuredAmount"
        }, {
            label: "GuaranteedPeriod:",
            name: "GuaranteedPeriod"
        },  {
            label: "Value:",
            name: "Value"
        },  {
            label: "Reference",
            name:  "Reference",
            type:"EditAndLink"
        }, {
            label: "UpdateTime:",
            name: "UpdateTime",
            type: "readonly"
        }, {
            label: "UpdateUser:",
            name: "UpdateUser"
        }]
    });

    $('#insuranceTable').dataTable({
        dom: "BtTr",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/insurance/by/creditcard?Id=" + creditCardId,
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "InsuranceId", edit: false},
            {"data": "CreditCard.Name", editField: "CreditCard.Id", visible: false},
            {"data": "InsuranceType.TypeName", editField: "InsuranceType.TypeName"},
            {"data": "InsuranceType.SubtypeName", editField: "InsuranceType.SubtypeName"},
            {"data": "InsuranceType.Region", editField: "InsuranceType.Region"},
            {"data": "MaxInsuredAmount", editField: "MaxInsuredAmount"},
            {"data": "GuaranteedPeriod", editField: "GuaranteedPeriod"},
            {"data": "Value", editField: "Value"},
            {"data": "Reference", width: 10, visible:false},
            {"data": "UpdateTime", visible:false},
            {"data": "UpdateUser", visible:false}
        ],
        select: true,
        buttons: [
                {extend: "create", editor: insuranceEditor},
                {extend: "edit", editor: insuranceEditor},
                {extend: "remove", editor: insuranceEditor}
        ]
    });

});