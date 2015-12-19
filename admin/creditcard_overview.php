<html>
<head>
    <meta charset="utf-8">
    <title>Credit Card Overview</title>
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
    <script type="text/javascript" language="javascript" src="scripts/datatables_ext.js"></script>

    <script type="text/javascript" language="javascript" class="init">
        var editor;
        var values = [];
        values["issuers"] = [];
        values["affiliates"] = [];
        var tmp = $.ajax({
            url: '../backend/display/issuers',
            data: {
                format: 'json',
                "contentType": "application/json; charset=utf-8",
                "dataType": "json"
            },
            type: 'GET',
            async: false
        }).responseText;

        if(tmp) {
            values["issuers"] = JSON.parse(tmp);
        }

        tmp = $.ajax({
            url: '../backend/display/affiliates',
            data: {
                format: 'json',
                "contentType": "application/json; charset=utf-8",
                "dataType": "json"
            },
            type: 'GET',
            async: false
        }).responseText;
        if(tmp) {
            values["affiliates"] = JSON.parse(tmp);
        }

        $(document).ready(function() {


            editor = new $.fn.dataTable.Editor(
            {
                ajax: {
                    create: '../backend/crud/creditcards/create', // default method is POST
                    edit: {
                        type: 'PUT',
                        url:  '../backend/crud/creditcards/update'
                    },
                    remove: {
                        type: 'DELETE',
                        url: '../backend/crud/creditcards/delete'
                    }
            },
                table: "#creditcards",
                idSrc: "credit_card_id",
                fields: [
                    {
                        label: "Id:",
                        name: "credit_card_id",
                        type:  "readonly"
                    }, {
                        label: "Name:",
                        name: "name"
                    }, {
                        label: "Issuer:",
                        name: "issuer.id",
                        type: "select",
                        options: values["issuers"]

                    }, {
                        label: "Description:",
                        name: "description"
                    }, {
                        label: "Image:",
                        name: "image_link"
                    }, {
                        label: "Visa:",
                        name: "visa",
                        type:      "checkbox",
                        separator: "|",
                        options:   [
                            { label: '', value: 1 }
                        ]
                    }, {
                        label: "Master:",
                        name: "master",
                        type:      "checkbox",
                        separator: "|",
                        options:   [
                            { label: '', value: 1 }
                        ]
                    }, {
                        label: "JCB:",
                        name: "jcb",
                        type:      "checkbox",
                        separator: "|",
                        options:   [
                            { label: '', value: 1 }
                        ]
                    }, {
                        label: "AmEx:",
                        name: "amex",
                        type:      "checkbox",
                        separator: "|",
                        options:   [
                            { label: '', value: 1 }
                        ]
                    }, {
                        label: "Diners:",
                        name: "diners",
                        type:      "checkbox",
                        separator: "|",
                        options:   [
                            { label: '', value: 1 }
                        ]
                    }, {
                        label: "Affiliate Link",
                        name:"affiliate_link"
                    }, {
                        label: "Affiliate:",
                        name: "affiliate_id",
                        type: "select",
                        options: values["affiliates"]
                    },  {
                        label:  "reference",
                        name:   "reference",
                        type:"EditAndLink"
                    },  {
                        label:  "Points expiry (months)",
                        name:   "points_expiry_months"
                    },  {
                        label:  "Points expiry Display",
                        name:   "points_expiry_display"
                    }, {
                        label:  "Commission",
                        name:   "commission"
                    }, {
                        label:  "Issue Period",
                        name:   "issue_period"
                    }, {
                        label:  "Credit Limit (Bottom)",
                        name:   "credit_limit_bottom"
                    }, {
                        label:  "Credit Limit (upper)",
                        name:   "credit_limit_upper"
                    }, {
                        label:  "Debit Date",
                        name:   "debit_date"
                    }, {
                        label:  "Cutoff Date",
                        name:   "cutoff_date"
                    }, {
                        label: "IsActive:",
                        name: "is_active",
                        type: "select",
                        options:[
                            { label: 'Yes', value: 1 },
                            { label: 'No', value: 0 }
                        ]
                    }, {
                        label: "Update date:",
                        name: "update_time",
                        type: "readonly"
                    }, {
                        label: "Update user:",
                        name: "update_user"
                    }
                ]
             });
/*
            editor.one( 'preOpen', function ( e, type ) {
                var tmp = $.ajax({
                    url: 'http://localhost/backend/display/issuers',
                    data: {
                        format: 'json',
                        "contentType": "application/json; charset=utf-8",
                        "dataType": "json"
                    },
                    type: 'GET',
                    async: false
                }).responseText;
                values["issuers"] = JSON.parse(tmp);
                editor.field("issuer_id").update(values["issuers"]);

                tmp = $.ajax({
                    url: '../backend/display/affiliates',
                    data: {
                        format: 'json',
                        "contentType": "application/json; charset=utf-8",
                        "dataType": "json"
                    },
                    type: 'GET',
                    async: false
                }).responseText;
                values["affiliates"] = JSON.parse(tmp);
                editor.field("affiliate_id").update(values["affiliates"]);
                //editor.field("affiliate_id")

            });
*/

            $('#creditcards').dataTable( {
                dom: "Tfrtip",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/display/creditcards",
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    { "data": "credit_card_id",visible: false, edit: false },
                    { "data": "name" },
                    { "data": "issuer.name", editField: "issuer.id" },
                    { "data": "description", visible:false },
                    {
                        "data": "image_link",
                        render: function ( data, type, full, meta ) {
                            if ( type === 'display' ) {
                                //return data.substring(0, 20).concat("...");
                                if(data.length>0)
                                    return "<img src='" + data + "' width='40' height='20'>";
                                else
                                    return "<img src='../admin/images/error.png'>"
                            }
                            return data;
                        }
                    },
                    {
                        "data": "visa",
                        render: function ( data, type, row ) {
                            if ( type === 'display' ) {
                                return '<input type="checkbox" class="editor-visa">';
                            }
                            return data;
                        },
                        className: "dt-body-center"
                    },
                    {
                        "data": "master",
                        render: function ( data, type, row ) {
                            if ( type === 'display' ) {
                                return '<input type="checkbox" class="editor-master">';
                            }
                            return data;
                        },
                        className: "dt-body-center"
                    },
                    {
                        "data": "jcb",
                        render: function ( data, type, row ) {
                            if ( type === 'display' ) {
                                return '<input type="checkbox" class="editor-jcb">';
                            }
                            return data;
                        },
                        className: "dt-body-center"
                    },
                    {
                        "data": "amex",
                        render: function ( data, type, row ) {
                            if ( type === 'display' ) {
                                return '<input type="checkbox" class="editor-amex">';
                            }
                            return data;
                        },
                        className: "dt-body-center"
                    },
                    {
                        "data": "diners",
                        render: function ( data, type, row ) {
                            if ( type === 'display' ) {
                                return '<input type="checkbox" class="editor-diners">';
                            }
                            return data;
                        },
                        className: "dt-body-center"
                    },
                    { "data": "affiliate.name", editField: "affiliate.id" },
                    {
                        "data": "affiliate_link",
                        "render": function ( data, type, full, meta ) {
                            if ( type === 'display' ) {
                                if(data.length>0)
                                    return "<a href='" + decodeURIComponent(data) + "' target='_blank'>link</a>";
                                else
                                    return "<img src='../admin/images/error.png'>"
                            }
                            return decodeURIComponent(data);
                        },
                        visible: true
                    },
                    { "data": "points_expiry_months" },
                    { "data": "points_expiry_display" },
                    { "data": "commission", editField: "commission" },
                    { "data": "issue_period" },
                    { "data": "credit_limit_bottom" },
                    { "data": "credit_limit_upper" },
                    { "data": "debit_date" },
                    { "data": "cutoff_date" },
                    {
                        "data": "is_active",
                        editField: "is_active",
                        render: function ( data, type, row ) {
                            if ( type === 'display' ) {
                                if(data>0) return "<img src='../admin/images/power_on.png'>";
                                return "<img src='../admin/images/power_off.png'>"
                            }
                            return data;
                        }
                        // , visible:false
                    },
                    {
                        "data": "reference",
                        editField: "reference",
                        "render": function ( data, type, full, meta ) {
                            if ( type === 'display' ) {
                                if(data.length>0)
                                    return "<a href='" + data + "' target='_blank'>reference</a>";
                                else
                                    return "<img src='../admin/images/error.png'>"
                            }
                            return data;
                        },
                        visible: true
                    },
                    {
                        "data": "credit_card_id",
                        render: function ( data, type, row ) {
                            if ( type === 'display' ) {
                                return "<a href='creditcard_details.php?Id=" + data + "' >Details</a>";
                            }
                            return data;
                        }
                    }
                ],
                tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        { sExtends: "editor_create", editor: editor },
                        { sExtends: "editor_edit",   editor: editor },
                        { sExtends: "editor_remove", editor: editor }
                    ]
                },
                rowCallback: function ( row, data ) {
                    // Set the checked state of the checkbox in the table
                    $('input.editor-diners', row).prop( 'checked', data.diners == 1 );
                    $('input.editor-amex', row).prop( 'checked', data.amex == 1 );
                    $('input.editor-jcb', row).prop( 'checked', data.jcb == 1 );
                    $('input.editor-master', row).prop( 'checked', data.master == 1 );
                    $('input.editor-visa', row).prop( 'checked', data.visa == 1 );
                },
                "createdRow": function( row, data) {
                    if($.isNumeric(data["is_active"]) && data["is_active"]=="0")
                    {
                        $(row).addClass( 'showAsInactive' );
                    }
                }
            } )
            .on( 'change', 'input.editor-visa', function () {
                editor
                    .edit( $(this).closest('tr'), false )
                    .set( 'visa', $(this).prop( 'checked' ) ? 1 : 0 )
                    .submit();
            } )
            .on( 'change', 'input.editor-master', function () {
                editor
                    .edit( $(this).closest('tr'), false )
                    .set( 'master', $(this).prop( 'checked' ) ? 1 : 0 )
                    .submit();
            } )
            .on( 'change', 'input.editor-jcb', function () {
                editor
                    .edit( $(this).closest('tr'), false )
                    .set( 'jcb', $(this).prop( 'checked' ) ? 1 : 0 )
                    .submit();
            } )
            .on( 'change', 'input.editor-amex', function () {
                editor
                    .edit( $(this).closest('tr'), false )
                    .set( 'amex', $(this).prop( 'checked' ) ? 1 : 0 )
                    .submit();
            } )
            .on( 'change', 'input.editor-diners', function () {
                editor
                    .edit( $(this).closest('tr'), false )
                    .set( 'diners', $(this).prop( 'checked' ) ? 1 : 0 )
                    .submit();
            } );
        } );

    </script>
</head>

<body class="dt-example">
    <div class="table-headline"><a name="creditcards">
            Credit Cards
    </a></div>
    <table id="creditcards" class="display" cellspacing="0" width="98%">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>issuer</th>
            <th>description</th>
            <th>image</th>
            <th>visa</th>
            <th>master</th>
            <th>jcb</th>
            <th>amex</th>
            <th>diners</th>
            <th>affiliate</th>
            <th>link</th>
            <th>point<br>expiry<br>(months)</th>
            <th>PE Display</th>
            <th>commission</th>
            <th>issue<br>period<br>(months)</th>
            <th>credit<br>limit<br>bottom</th>
            <th>credit<br>limit<br>upper</th>
            <th>debit date</th>
            <th>cutoff date</th>
            <th>active</th>
            <th>reference</th>
            <th>update</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>issuer</th>
            <th>description</th>
            <th>image</th>
            <th>visa</th>
            <th>master</th>
            <th>jcb</th>
            <th>amex</th>
            <th>diners</th>
            <th>affiliate</th>
            <th>link</th>
            <th>expiry<br>(months)</th>
            <th>PE Display</th>
            <th>commission</th>
            <th>issue<br>period<br>(months)</th>
            <th>credit<br>limit<br>bottom</th>
            <th>credit<br>limit<br>upper</th>
            <th>debit date</th>
            <th>cutoff date</th>
            <th>active</th>
            <th>reference</th>
            <th>update</th>
        </tr>
    </tfoot>
    </table>
</body>
</html>