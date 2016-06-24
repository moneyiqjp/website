/**
 * Created by Work on 6/6/2016.
 */


var issuers = queryIdValMap('../backend/display/issuers',"value","label");
var affiliates = queryIdValMap('../backend/display/affiliates',"value","label");

var editor;
/*
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
*/
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
                    options: issuers

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
                    options: affiliates
                },  {
                    label:  "reference",
                    name:   "reference",
                    type:"EditAndLink"
                }, {
                    label:  "Points expiry (months)",
                    name:   "points_expiry_months"
                }, {
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
                },   {
                    label: "Review URL",
                    name:  "review_url",
                    type:  "EditAndLink"
                }
            ]
        });


    $('#creditcards').dataTable( {
        dom: "BTfrtip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/display/creditcards",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            { "data": "credit_card_id",visible: true, edit: false },
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
            { "data": "affiliate.name", editField: "affiliate.id",
                "render": function ( data, type, full, meta ) {
                    if (full != null && $.inArray("affiliate_link", full)) {
                        return "<a href='" + decodeURIComponent(full["affiliate_link"]) + "' target='_blank'>" + data + "</a>";
                    }
                    return data;
                }


            },
            {
                "data": "affiliate_link",
                "render": function ( data, type, full, meta ) {
                    if ( type === 'display' ) {
                        if(data != null && data.length>0)
                            return "<a href='" + decodeURIComponent(data) + "' target='_blank'>link</a>";
                        else
                            return "<img src='../admin/images/error.png'>"
                    }
                    return decodeURIComponent(data);
                },
                visible: false
            },
            { "data": "points_expiry_months" },
            { "data": "points_expiry_display", visible:false },
            { "data": "commission", editField: "commission" },
            { "data": "issue_period" },
            { "data": "credit_limit_bottom",
                "render": function ( data, type, full, meta ) {
                    if ( type === 'display' ) {
                        var text = "";
                        if (full != null && $.inArray("credit_limit_upper", full) && full["credit_limit_upper"]!=null) {
                            text +=  "<p><i class='fa fa-caret-square-o-down' aria-hidden='true'></i> ";
                            text +=  full["credit_limit_upper"] + "</p>";
                        }

                        if(data != null) {
                            text +=  "<p><i class='fa fa-caret-square-o-up' aria-hidden='true'></i> ";
                            text +=  data + "</p>";
                        }
                        return text;
                    }
                    return data;
                }
            },
            { "data": "credit_limit_upper" , visible:false },
            { "data": "debit_date" },
            { "data": "cutoff_date" },
            {
                "data": "is_active",
                editField: "is_active",
                render: function ( data, type, row ) {
                    if ( type === 'display' ) {
                        if(data != null && data>0) return "<img src='../admin/images/power_on.png'>";
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
                        if(data != null && data.length>0)
                            return "<a href='" + data + "' target='_blank'><i class='fa fa-external-link-square'></i></a></a>";
                        else
                            return "<img src='../admin/images/error.png'>"
                    }
                    return data;
                },
                visible: true
            },
            {
                "data": "review_url",
                editField: "review_url",
                "render": function ( data, type, full, meta ) {
                    if ( type === 'display' ) {
                        if(data != null && data.length>0)
                            return "<a href='" + data + "' target='_blank'><i class='fa fa-star'></i></a>";
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
                { extend: "create", editor: editor },
                { extend: "edit",   editor: editor },
                { extend: "remove", editor: editor }
        ]
        ,
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
