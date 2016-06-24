/**
 * Created by Work on 6/7/2016.
 */
var affiliate_editor = new $.fn.dataTable.Editor(
    {
        ajax: {
            create: '../backend/crud/affiliate/create', // default method is POST
            edit: {
                type: 'PUT',
                url:  '../backend/crud/affiliate/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/affiliate/delete'
            }
        },
        table: "#affiliate",
        idSrc: "AffiliateId",
        fields: [
            {
                label: "Id:",
                name: "AffiliateId",
                type:  "readonly"
            }, {
                label: "Name:",
                name: "Name"
            },  {
                label: "Description:",
                name: "Description"
            },  {
                label: "Website:",
                name: "Website"
            },  {
                label:  "Signed-Up Date:",
                name:   "SignedUpDate",
                type:       "date",
                def:        function () { return new Date(); }
            },  {
                label: "Update date:",
                name: "UpdateTime",
                type: "readonly"
            }, {
                label: "Update user:",
                name: "UpdateUser"
            }
        ]
    });

$(document).ready(function() {
    $('#affiliate').dataTable( {
        dom: "BlfrtTip",
        "ajax": {
            "url": "../backend/crud/affiliate/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            { "data": "AffiliateId",edit: false },
            { "data": "Name" },
            { "data": "Description" },
            { "data": "Website" },
            { "data": "SignedUpDate" },
            { "data": "UpdateTime",visible: false },
            { "data": "UpdateUser",visible: false }
        ],
        select: true,
        buttons: [
                { extend: "create", editor: affiliate_editor },
                { extend: "edit",   editor: affiliate_editor },
                { extend: "remove", editor: affiliate_editor }
        ]
    } );
});