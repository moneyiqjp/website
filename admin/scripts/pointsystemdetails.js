/**
 * Created by Work on 6/12/2016.
 */
var creditCards = getCreditCards();
$(document).ready(function () {
    var pointSystemId = getQueryVariable("id");

    var pointMappingEditor = new $.fn.dataTable.Editor({
        ajax: {
            create: '../backend/crud/creditcard/pointsystem/mapping/create', // default method is POST
            remove: {
                type: 'DELETE',
                url: '../backend/crud/creditcard/pointsystem/mapping/delete'
            }
        },
        table: "#creditCardMappingTable",
        idSrc: "Id",
        fields: [{
            label: "Id:",
            name: "Id",
            type: "readonly"
        }, {
            label: "PointSystem:",
            name: "PointSystem.PointSystemId",
            type:  "readonly",
            def: pointSystemId
        },   {
            label: "Card Id:",
            name: "CreditCard.credit_card_id",
            type: "select",
            options: creditCards
        }
        ]
    });

    $('#creditCardMappingTable').dataTable({
        dom: "BtTr",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/creditcard/pointsystem/mapping/by/pointsystem?Id=" + pointSystemId,
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "Id"},
            {"data": "PointSystem.PointSystemId", visible:false},
            {"data": "CreditCard.name"},
            {"data": "UpdateTime", visible:false},
            {"data": "UpdateUser",  visible:false},
            {"data": "CreditCard.credit_card_id",
                render: function ( data, type, row ) {
                    if ( type === 'display' ) {
                        var url = window.location.href.toString().split(window.location.host)[1];
                        url = url.split("?")[0];

                        return "<a href='" + url + "?item=CreditCardDetails&sub=creditcarddetails&id=" + data + "' ><i class='fa fa-file-text-o'></i></a>";
                    }
                    return data;
                }
            }

        ],
        select: true,
        buttons: [
                {extend: "create", editor: pointMappingEditor},
                {extend: "remove", editor: pointMappingEditor}
        ]
    });

    var pointSystemEditor = new $.fn.dataTable.Editor({
        ajax: {
            create: '../backend/crud/pointsystem/create', // default method is POST
            edit: {
                type: 'PUT',
                url:  '../backend/crud/pointsystem/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/pointsystem/delete'
            }
        },
        table: "#pointsystem",
        idSrc: "PointSystemId",
        fields: [
            {
                label: "Id:",
                name: "PointSystemId",
                type:  "readonly"
            }, {
                label: "Name:",
                name: "PointSystemName"
            }, {
                label: "PointsPerYen:",
                name: "PointsPerYen",
                def: 0.01
            }, {
                label: "YenPerPoint:",
                name: "YenPerPoint",
                def:1.0
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


    $('#pointsystem').dataTable({
        dom: "BrtT",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/pointsystem/by/id?Id=" + pointSystemId,
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
            },
        "columns": [
            {"data": "PointSystemId", visible: false},
            {"data": "PointSystemName"},
            {"data": "PointsPerYen"},
            {"data": "YenPerPoint"}
        ],
        select: true,
        buttons: [
                {extend: "edit", editor: pointSystemEditor}
        ]
});


});