/**
 * Created by Work on 6/7/2016.
 */
var editor;
editor = new $.fn.dataTable.Editor(
    {
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
                def: 1.0
            }, {
                label: "Reference:",
                name: "Reference",
                type:"EditAndLink"
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

$(document).ready(function() {
    $('#pointsystem').dataTable({
        dom: "BTfrtip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/pointsystem/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "PointSystemId", visible: false},
            {"data": "PointSystemName"},
            {"data": "PointsPerYen"},
            {"data": "YenPerPoint"},
            {
                "data": "PointSystemId",
                render: function ( data, type, row ) {
                    if ( type === 'display' ) {
                        var url = window.location.href.toString().split(window.location.host)[1];
                        url = url.split("?")[0];
                        return "<a href='" + url + "?item=PointSystemDetails&sub=pointsystemdetails&id=" + data + "' ><i class='fa fa-file-text-o'></i></a>";
                    }
                    return data;
                }
            },
            {"data": "Reference", visible:false},
            {"data": "UpdateTime", visible:false},
            {"data": "UpdateUser", visible:false}
        ],
        select: true,
        buttons: [
                {extend: "create", editor: editor},
                {extend: "edit", editor: editor},
                {extend: "remove", editor: editor}
        ]
    });
} );
