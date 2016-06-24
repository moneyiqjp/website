/**
 * Created by Work on 6/9/2016.
 */
var personas = queryIdValMap('../backend/crud/restriction/type/all',"RestrictionTypeId","Name");
var restrictionTypes = queryIdValMap('../backend/crud/persona/all',"PersonaId","Name");
var creditCards = getCreditCards();
creditCardRestrictionEditor = new $.fn.dataTable.Editor(
    {
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
                type:  "select",
                options: creditCards
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

restrictionEditor = new $.fn.dataTable.Editor(
    {
        ajax: {
            create: '../backend/crud/restriction/general/create', // default method is POST
            edit: {
                type: 'PUT',
                url:  '../backend/crud/restriction/general/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/restriction/general/delete'
            }
        },
        table: "#restrictionTable",
        idSrc: "GeneralRestrictionId",
        fields: [
            {
                label: "Id:",
                name: "GeneralRestrictionId",
                type:  "readonly"
            },{
                label: "Persona:",
                name: "Persona.PersonaId",
                type:  "select",
                options: personas
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

$(document).ready(function() {


    $('#creditCardRestrictionTable').dataTable({
        dom: "BlfrtTip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/restriction/credit/card/general/all",
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

    $('#restrictionTable').dataTable({
        dom: "BlfrtTip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/restriction/general/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "GeneralRestrictionId",width:"125px"},
            {"data": "Persona.Name",editField: "Persona.PersonaId", width:"150px"},
            {"data": "RestrictionType.Name", editField: "RestrictionType.RestrictionTypeId",width:"150px"},
            {"data": "Comparator",width:"100px"},
            {"data": "Value",width:"100px"},
            {"data": "Priority",width:"50px", visible:false},
            {"data": "UpdateTime", visible:false,width:"20px"},
            {"data": "UpdateUser",  visible:false,width:"20px"}
        ],
        select: true,
        buttons: [
                {extend: "create", editor: restrictionEditor},
                {extend: "edit", editor: restrictionEditor},
                {extend: "remove", editor: restrictionEditor}
        ]
        /*,
         "initComplete": function(settings, json) {
         this.api().columns().every(
         function () {
         var column = this;
         if (!arrayValuesInString(column.header().innerHTML, ['Description','Title','Icon'])) {
         var select = $('<select><option value=""></option></select>')
         .appendTo($(column.footer()))
         .on('change', function () {
         var val = $.fn.dataTable.util.escapeRegex(
         $(this).val()
         );

         column
         .search(val ? '^' + val + '$' : '', true, false)
         .draw();
         });

         column.data().unique().sort().each(
         function (d, j) {
         select.append('<option value="' + d + '">' + d + '</option>')
         }
         );
         }
         }
         );
         }
         */
    } );

});