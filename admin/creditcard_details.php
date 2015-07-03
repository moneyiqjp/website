<html>
<head>
    <meta charset="utf-8">
    <title>DataTables example - Ajax data source (objects)</title>
    <link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.css">
    <script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/tabletools/2.2.3/css/dataTables.tableTools.css">
    <link rel="stylesheet" type="text/css" href="media/css/dataTables.editor.css">
    <link rel="stylesheet" type="text/css" href="media/css/admin_editor.css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">

    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/tabletools/2.2.3/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" language="javascript" src="scripts/dataTables.editor.js"></script>
    <script type="text/javascript" language="javascript" class="init">
        var creditCardId = -1;
        <?php if(array_key_exists('Id',$_GET)) { echo "creditCardId=" . htmlspecialchars($_GET["Id"]) . ";\n"; } ?>

        function isoTodayString(){
            var d = new Date();
            var pad = function (n){
                return n<10 ? '0'+n : n
            };
            return d.getUTCFullYear()+'-'
                + pad(d.getUTCMonth()+1)+'-'
                + pad(d.getUTCDate())
        }

        function isoMaxString(){
            return '9999-12-31';
        }

        var stores = [];
        var tmp = $.ajax({
            url: '../backend/display/stores',
            data: {
                format: 'json',
                "contentType": "application/json; charset=utf-8",
                "dataType": "json"
            },
            type: 'GET',
            async: false
        }).responseText;

        if(tmp) {
            var jason = JSON.parse(tmp);
            if(jason["data"]!=undefined) {
                var tmpStore = jason["data"];
                var index;
                for (index = 0; index < tmpStore.length; ++index) {
                    stores.push({
                        value: tmpStore[index]["StoreId"],
                        label: tmpStore[index]["Category"] + " - " + tmpStore[index]["StoreName"]
                    })
                }
            }
        }

        var paymentTypes = [];
         tmp = $.ajax({
            url: '../backend/crud/payment/type/all',
            data: {
                format: 'json',
                "contentType": "application/json; charset=utf-8",
                "dataType": "json"
            },
            type: 'GET',
            async: false
        }).responseText;

        if(tmp) {
            jason = JSON.parse(tmp);
            if(jason["data"]!=undefined) {
                tmpStore = jason["data"];
                for (index = 0; index < tmpStore.length; ++index) {
                    paymentTypes.push({
                        value: tmpStore[index]["PaymentTypeId"],
                        label: tmpStore[index]["PaymentType"]
                    })
                }
            }
        }

        var insuranceTypes = [];
        tmp = $.ajax({
            url: '../backend/crud/insurance/type/all',
            data: {
                format: 'json',
                "contentType": "application/json; charset=utf-8",
                "dataType": "json"
            },
            type: 'GET',
            async: false
        }).responseText;

        if(tmp) {
            jason = JSON.parse(tmp);
            if(jason["data"]!=undefined) {
                tmpStore = jason["data"];
                for (index = 0; index < tmpStore.length; ++index) {
                    insuranceTypes.push({
                        value: tmpStore[index]["InsuranceTypeId"],
                        label: tmpStore[index]["TypeName"] + " - " + tmpStore[index]["SubtypeName"] + " - " + tmpStore[index]["Region"]
                    })
                }
            }
        }

        var pointSystems = [];
        tmp = $.ajax({
            url: '../backend/crud/pointsystem/all',
            data: {
                format: 'json',
                "contentType": "application/json; charset=utf-8",
                "dataType": "json"
            },
            type: 'GET',
            async: false
        }).responseText;

        if(tmp) {
            jason = JSON.parse(tmp);
            if(jason["data"]!=undefined) {
                tmpStore = jason["data"];
                for (index = 0; index < tmpStore.length; ++index) {
                    pointSystems.push({
                        value: tmpStore[index]["PointSystemId"],
                        label: tmpStore[index]["PointSystemName"]
                    })
                }
            }
        }



        if(creditCardId>0) {
        featureEditor = new $.fn.dataTable.Editor({
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
                    type: "readonly"
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

        descriptionEditor = new $.fn.dataTable.Editor({
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
/*
 {"data": "InterestId", edit: false, width: 5},
 {"data": "CreditCard.Name", editField: "CreditCard.Id", visible: false},
 {"data": "PaymentType.Name", editField: "PaymentType.Id"},
 {"data": "MinInterest", width: 20},
 {"data": "MaxInterest", width: 10},
 {"data": "UpdateTime", visible: false},
 {"data": "UpdateUser", visible: false}
 */

        interestEditor = new $.fn.dataTable.Editor({
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


        feeEditor = new $.fn.dataTable.Editor({
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
                label: "Update date:",
                name: "UpdateTime",
                type: "readonly"
            }, {
                label: "Update user:",
                name: "UpdateUser",
                type: "readonly"
            }]
        });

        discountEditor = new $.fn.dataTable.Editor({
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
                label: "Update date:",
                name: "UpdateTime",
                type: "readonly"
            }, {
                label: "Update user:",
                name: "UpdateUser",
                type: "readonly"
            }]
        });

        campaignEditor = new $.fn.dataTable.Editor({
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
                label: "Update date:",
                name:  "UpdateTime",
                type:  "readonly"
            }, {
                label: "Update user:",
                name:  "UpdateUser",
                type:  "readonly"
            }]
        });


        pointMappingEditor = new $.fn.dataTable.Editor({
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

        insuranceEditor = new $.fn.dataTable.Editor({
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
                label: "Value:",
                name: "Value"
            }, {
                label: "UpdateTime:",
                name: "UpdateTime",
                type: "readonly"
            }, {
                label: "UpdateUser:",
                name: "UpdateUser"
            }]
        });


        $(document).ready(function () {
            $('#featureTable').dataTable({
                dom: "tTr",
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
                , tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        {sExtends: "editor_edit", editor: featureEditor}
                    ]
                }
            })
                .on('change', 'input.editor-afield', function () {
                    featureEditor
                        .edit($(this).closest('tr'), false)
                        .set('Active', $(this).prop('checked') ? 1 : 0)
                        .submit();
                })
                .on('click', 'tbody td:not(:first-child)', function (e) {
                    featureEditor.inline(this);
                });


            $('#descriptionTable').dataTable({
                dom: "tTr",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/crud/description/by/creditcard?Id=" + creditCardId,
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    {"data": "ItemId", edit: false, width: 5},
                    {"data": "CreditCard.Name", editField: "CreditCard.Id", visible: false},
                    {"data": "Name", width: 15},
                    {"data": "Description", width: 100},
                    {"data": "UpdateTime", edit: false, visible: false},
                    {"data": "UpdateUser", visible: false}
                ]

                , tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        {sExtends: "editor_create", editor: descriptionEditor},
                        {sExtends: "editor_edit", editor: descriptionEditor},
                        {sExtends: "editor_remove", editor: descriptionEditor}
                    ]
                }
            });


            $('#campaignTable').dataTable({
                dom: "tTr",
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
                    {"data": "UpdateTime", edit: false, visible: false},
                    {"data": "UpdateUser", visible: false}
                ]

                , tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        {sExtends: "editor_create", editor: campaignEditor},
                        {sExtends: "editor_edit", editor: campaignEditor},
                        {sExtends: "editor_remove", editor: campaignEditor}
                    ]
                }

            });


            $('#discountTable').dataTable({
                dom: "tTr",
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
                    {"data": "UpdateTime", edit: false, visible: false},
                    {"data": "UpdateUser", visible: false}
                ]

                , tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        {sExtends: "editor_create", editor: discountEditor},
                        {sExtends: "editor_edit", editor: discountEditor},
                        {sExtends: "editor_remove", editor: discountEditor}
                    ]
                }
            });

            $('#feeTable').dataTable({
                dom: "tTr",
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
                    {"data": "UpdateTime", visible: false},
                    {"data": "UpdateUser", visible: false}
                ]

                 , tableTools: {
                     sRowSelect: "os",
                     aButtons: [
                         {sExtends: "editor_create", editor: feeEditor},
                         {sExtends: "editor_edit", editor: feeEditor},
                         {sExtends: "editor_remove", editor: feeEditor}
                     ]
                 }

            });

            $('#interestTable').dataTable({
                dom: "tTr",
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
                    {"data": "UpdateTime", visible: false},
                    {"data": "UpdateUser", visible: false}
                ]

                , tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        {sExtends: "editor_create", editor: interestEditor},
                        {sExtends: "editor_edit", editor: interestEditor},
                        {sExtends: "editor_remove", editor: interestEditor}
                    ]
                }
            });


            $('#insuranceTable').dataTable({
                dom: "tTr",
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
                    {"data": "Value", editField: "Value"},
                    {"data": "UpdateTime", visible:false},
                    {"data": "UpdateUser", visible:false}
                ]

                , tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        {sExtends: "editor_create", editor: insuranceEditor},
                        {sExtends: "editor_edit", editor: insuranceEditor},
                        {sExtends: "editor_remove", editor: insuranceEditor}
                    ]
                }
            });


             $('#pointSystemTable').dataTable({
                 dom: "tTr",
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

                ]
                , tableTools: {
                     sRowSelect: "os",
                     aButtons: [
                         {sExtends: "editor_create", editor: pointMappingEditor},
                         {sExtends: "editor_remove", editor: pointMappingEditor}
                     ]
                 }

             });


        });
    }
    </script>
</head>

<body class="dt-other">
<?php
    if(!array_key_exists('Id',$_GET)) {
        echo "<div class='errorMessage'>";
        echo "Failed to retrieve credit card id, please go back and select a valid card";
        echo "</div>";
    }
?>

<table>
    <tr>
        <td colspan="2">
            <div class="table-headline"><a name="issuers">Card details</a></div>
            <a href="creditcard_overview.php" class="subheader">Back</a>
            <!--
            <a href="#" class="subheader">#2</a>
            <a href="#" class="subheader">#4</a>
            <a href="#" class="subheader">#4</a>
            -->
        </td>
    </tr>
    <tr>
        <td rowspan="5" valign="top" width="400" align="left">
            <table id="featureTable" class="display" cellspacing="0" width="400">
                <thead>
                <tr>
                    <td colspan="9" class="table-headline">
                        Features
                    </td>
                </tr>
                <tr>
                    <th>Id</th>
                    <th>Card</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Issuing<br>Fee</th>
                    <th>Ongoing<br>Fee</th>
                    <th></th>
                    <th>Update</th>
                    <th>User</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Card</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Cost</th>
                    <th>Cost</th>
                    <th></th>
                    <th>Update</th>
                    <th>User</th>
                </tr>
                </tfoot>
            </table>
            <table id="pointSystemTable" class="display" cellspacing="0" width="400">
                <thead>
                <tr>
                    <td colspan="9" class="table-headline">
                        Point System
                    </td>
                </tr>
                <tr>
                    <th>Id</th>
                    <th>Id</th>
                    <th>Point System</th>
                    <th>User</th>
                    <th>Time</th>
                    <th>Details</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Id</th>
                    <th>Point System</th>
                    <th>User</th>
                    <th>Time</th>
                    <th>Details</th>
                </tr>
                </tfoot>
            </table>
        </td>
        </td>
        <td valign="top">
            <table id="descriptionTable" class="display" cellspacing="0" width="800">
                <thead>
                <tr>
                    <td colspan="6" class="table-headline">
                        Descriptions
                    </td>
                </tr>
                <tr>
                    <th>Id</th>
                    <th>Card</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Update</th>
                    <th>User</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Card</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Update</th>
                    <th>User</th>
                </tr>
                </tfoot>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <table id="campaignTable" class="display" cellspacing="0" width="800">
                <thead>
                <tr>
                    <td colspan="10" class="table-headline">
                        Campaigns
                    </td>
                </tr>
                <tr>
                    <th>Id</th>
                    <th>Card</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>MaxPoints</th>
                    <th>ValueInYen</th>
                    <th>StartDate</th>
                    <th>EndDate</th>
                    <th>Update</th>
                    <th>User</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Card</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>MaxPoints</th>
                    <th>ValueInYen</th>
                    <th>StartDate</th>
                    <th>EndDate</th>
                    <th>Update</th>
                    <th>User</th>
                </tr>
                </tfoot>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <table id="interestTable" class="display" cellspacing="0" width="800">
                <thead>
                <tr>
                    <td colspan="12" class="table-headline">
                        Interest
                    </td>
                </tr>
                <tr>
                    <th>Id</th>
                    <th>Card</th>
                    <th>PaymentType</th>
                    <th>MinInterest</th>
                    <th>MaxInterest</th>
                    <th>Update</th>
                    <th>User</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Card</th>
                    <th>PaymentType</th>
                    <th>MinInterest</th>
                    <th>MaxInterest</th>
                    <th>Update</th>
                    <th>User</th>
                </tr>
                </tfoot>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <table id="feeTable" class="display" cellspacing="0" width="800">
                <thead>
                <tr>
                    <td colspan="12" class="table-headline">
                        Fee
                    </td>
                </tr>
                <tr>
                    <th>Id</th>
                    <th>Card</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>YearlyOccurrence</th>
                    <th>StartYear</th>
                    <th>EndYear</th>
                    <th>Update</th>
                    <th>User</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Card</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>YearlyOccurrence</th>
                    <th>StartYear</th>
                    <th>EndYear</th>
                    <th>Update</th>
                    <th>User</th>
                </tr>
                </tfoot>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <table id="discountTable" class="display" cellspacing="0" width="800">
                <thead>
                <tr>
                    <td colspan="12" class="table-headline">
                        Discounts
                    </td>
                </tr>
                <tr>
                    <th>Id</th>
                    <th>Card</th>
                    <th>Category</th>
                    <th>Store</th>
                    <th>Description</th>
                    <th>Percentage</th>
                    <th>Multiple</th>
                    <th>Conditions</th>
                    <th>StartDate</th>
                    <th>EndDate</th>
                    <th>Update</th>
                    <th>User</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Card</th>
                    <th>Category</th>
                    <th>Store</th>
                    <th>Description</th>
                    <th>Percentage</th>
                    <th>Multiple</th>
                    <th>Conditions</th>
                    <th>StartDate</th>
                    <th>EndDate</th>
                    <th>Update</th>
                    <th>User</th>
                </tr>
                </tfoot>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table id="insuranceTable" class="display" cellspacing="0">
                <thead>
                <tr>
                    <td colspan="8" class="table-headline">
                        Insurance
                    </td>
                </tr>
                <tr>
                    <th>Id</th>
                    <th>Card</th>
                    <th>Type</th>
                    <th>Subtype</th>
                    <th>Region</th>
                    <th>Amount</th>
                    <th>Value</th>
                    <th>Update</th>
                    <th>User</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Card</th>
                    <th>Type</th>
                    <th>Subtype</th>
                    <th>Region</th>
                    <th>Amount</th>
                    <th>Value</th>
                    <th>Update</th>
                    <th>User</th>
                </tr>
                </tfoot>
            </table>
        </td>
    </tr>
    <!--
    <tr>
        <td colspan="2">
            <table id="pointMappingTable" class="display" cellspacing="0">
                <thead>
                <tr>
                    <td colspan="8" class="table-headline">
                        Point System
                    </td>
                </tr>
                <tr>
                    <th>Id</th>
                    <th>Card</th>
                    <th>PointSystem</th>
                    <th>Category</th>
                    <th>Store</th>
                    <th>PointsPerYen</th>
                    <th>YenPerPoint</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Card</th>
                    <th>PointSystem</th>
                    <th>Category</th>
                    <th>Store</th>
                    <th>PointsPerYen</th>
                    <th>YenPerPoint</th>
                </tr>
                </tfoot>
            </table>
        </td>
    </tr>
    -->
</table>


</body>
</html>