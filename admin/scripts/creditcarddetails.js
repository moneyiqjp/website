/**
 * Created by Work on 6/11/2016.
 */
var pointSystems = queryIdValMap('../backend/crud/pointsystem/all',"PointSystemId","PointSystemName");

$(document).ready(function () {
    var creditCardId = getQueryVariable("id");
    var featureEditor = new $.fn.dataTable.Editor({
        ajax: {
            create: '../backend/crud/feature/by/creditcard/create', // default method is POST
            edit: {
                type: 'PUT',
                url: '../backend/crud/feature/by/creditcard/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/feature/by/creditcard/delete'
            }
        },
        table: "#featureTable",
        idSrc: "FeatureId",
        fields: [
            {
                label: "Id:",
                name: "FeatureId",
                type: "readonly"
            }, {
                label: "CardId:",
                name: "CreditCard.Id",
                type: "readonly",
                def: creditCardId
            }, {
                label: "Card:",
                name: "CreditCard.Name",
                type: "readonly"
            }, {
                label: "FeatureTypeId:",
                name: "FeatureType.Id",
                type: "readonly"
            }, {
                label: "Category:",
                name: "FeatureType.Category",
                type: "readonly"
            }, {
                label: "Type:",
                name: "FeatureType.Name",
                type: "readonly"
            }, {
                label: "Description:",
                name: "Description",
                type: "readonly"
            }, {
                label: "Issuing Fee:",
                name: "IssuingFee"
            }, {
                label: "Ongoing Fee:",
                name: "OngoingFee"
            }, {
                label: "Update date:",
                name: "UpdateTime",
                type: "readonly"
            }, {
                label: "Update user:",
                name: "UpdateUser",
                type: "readonly"
            }, {
                name: "Active",
                label: "Active",
                def: true
            }
        ]
    });

    var descriptionEditor = new $.fn.dataTable.Editor({
        ajax: {
            create: '../backend/crud/description/by/creditcard/create', // default method is POST
            edit: {
                type: 'PUT',
                url: '../backend/crud/description/by/creditcard/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/description/by/creditcard/delete'
            }
        },
        table: "#descriptionTable",
        idSrc: "ItemId",
        fields: [{
            label: "Id:",
            name: "ItemId",
            type: "readonly"
        }, {
            label: "CardId:",
            name: "CreditCard.Id",
            type: "readonly",
            def: creditCardId
        }, {
            label: "Card:",
            name: "CreditCard.Name",
            type: "readonly"
        }, {
            label: "Name:",
            name: "Name"
        }, {
            label: "Type:",
            name: "Type"
        }, {
            label: "Description:",
            name: "Description"
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

    var pointMappingEditor = new $.fn.dataTable.Editor({
        ajax: {
            create: '../backend/crud/creditcard/pointsystem/mapping/create', // default method is POST
            edit: {
                type: 'PUT',
                url: '../backend/crud/creditcard/pointsystem/mapping//update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/creditcard/pointsystem/mapping/delete'
            }
        },
        table: "#pointSystemTable",
        idSrc: "Id",
        fields: [{
            label: "Id:",
            name: "Id",
            type: "readonly"
        },   {
            label: "Card Id:",
            name: "CreditCard.credit_card_id",
            type: "readonly",
            def: creditCardId
        }, {
            label: "PointSystem:",
            name: "PointSystem.PointSystemId",
            type:  "select",
            options: pointSystems
        }
        ]
    });

    $('#featureTable').dataTable({
        dom: "BtTr",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/feature/by/creditcard?Id=" + creditCardId,
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        paging: false,
        searching: false,
        "order": [[2, "asc"], [3, "asc"]],
        "columns": [
            {"data": "FeatureId", edit: false, visible: false},
            {"data": "CreditCard.Name", editField: "CreditCard.Id", edit: false, visible: false},
            {"data": "FeatureType.Category", edit: false, width: "50"},
            {"data": "FeatureType.Name", editField: "FeatureType.Id", edit: false, width: "50"},
            {"data": "Description", edit: false, visible: false, width: "80"},
            {"data": "IssuingFee", width: "20"},
            {"data": "OngoingFee", width: "20"},
            {
                "data": "Active",
                render: function (data, type, row) {
                    if (type === 'display') {
                        return '<input type="checkbox" class="editor-afield">';
                    }
                    return data;
                },
                className: "dt-body-center",
                width: "5"
            },
            {"data": "UpdateTime", edit: false, visible: false},
            {"data": "UpdateUser", visible: false}
        ],
        rowCallback: function (row, data) {
            // Set the checked state of the checkbox in the table
            $('input.editor-afield', row).prop('checked', data['Active'] == 1);
        }
        ,
        select: true,
            buttons: [
                {extend: "edit", editor: featureEditor}
        ]
    })
        .on('change', 'input.editor-afield', function () {
            featureEditor
                .edit($(this).closest('tr'), false)
                .set('Active', $(this).prop('checked') ? 1 : 0)
                .submit();
        })
        .on('click', 'tbody td:not(:first-child)', function (e) {
            if( $.inArray(e.target.className, new Array("editor-afield") ) == -1 )
            {
                featureEditor.inline(this);
            }
        });


    $('#pointSystemTable').dataTable({
        dom: "BtTr",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/creditcard/pointsystem/mapping/by/creditcard?Id=" + creditCardId,
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "Id"},
            {"data": "CreditCard.credit_card_id", visible:false},
            /*{"data": "PointSystem.PointSystemId", visible:false},*/
            {"data": "PointSystem.PointSystemName"},
            {"data": "UpdateTime", visible:false},
            {"data": "UpdateUser",  visible:false},
            {"data": "PointSystem.PointSystemId",
                render: function ( data, type, row ) {
                    if ( type === 'display' ) {
                        return "<a href='pointprogram_details.php?Id=" + data + "'>Details</a>";
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


    $('#descriptionTable').dataTable({
        dom: "BtTr",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/description/by/creditcard?Id=" + creditCardId,
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        autoWidth: true,
        "columns": [
            {"data": "ItemId", edit: false, width: "15px"},
            {"data": "CreditCard.Name", editField: "CreditCard.Id", visible: true},
            {"data": "Name", width: "100px"},
            {"data": "Type", width: "100px"},
            {"data": "Description", width: "250px"},
            {"data": "UpdateTime", edit: false, visible: false},
            {"data": "UpdateUser", visible: false}
        ],
        select: true,
        buttons: [
                {extend: "create", editor: descriptionEditor},
                {extend: "edit", editor: descriptionEditor},
                {extend: "remove", editor: descriptionEditor}
        ]
    });

});