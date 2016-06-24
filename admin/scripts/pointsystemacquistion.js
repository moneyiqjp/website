/**
 * Created by Work on 6/12/2016.
 */
var stores = getStores();
$(document).ready(function () {
    var pointSystemId = getQueryVariable("id");
    var pointAcquisitionEditor = new $.fn.dataTable.Editor(
        {
            ajax: {
                create: '../backend/crud/pointacquisition/create', // default method is POST
                edit: {
                    type: 'PUT',
                    url:  '../backend/crud/pointacquisition/update'
                },
                remove: {
                    type: 'DELETE',
                    url: '../backend/crud/pointacquisition/delete'
                }
            },
            table: "#pointAcquisitionTable",
            idSrc: "PointAcquisitionId",
            fields: [
                {
                    label: "Id:",
                    name: "PointAcquisitionId",
                    type:  "readonly"
                },{
                    label: "PointSystem:",
                    name: "PointSystemId",
                    type:  "readonly",
                    def: pointSystemId
                }, {
                    label: "PointsPerYen:",
                    name: "PointsPerYen",
                    def: 0.01
                }, {
                    label: "Category/Store:",
                    name: "Store.StoreId",
                    type:  "select",
                    options: stores
                }, {
                    label: "Reference",
                    name:  "Reference",
                    type: "EditAndLink"
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

    $('#pointAcquisitionTable').dataTable({
        dom: "BrtT",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/pointacquisition/by/pointsystem?Id=" + pointSystemId,
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "PointAcquisitionId",width:1},
            {"data": "PointSystemId", visible: false,width:1},
            {"data": "PointAcquisitionName",width:3},
            {"data": "PointsPerYen",width:1},
            {"data": "Store.StoreCategory.Name",width:2},
            {"data": "Store.StoreName",width:3},
            {"data": "Reference", visible:false},
            {"data": "UpdateTime", visible:false},
            {"data": "UpdateUser",  visible:false}
        ],
        select: true,
        buttons: [
                {extend: "create", editor: pointAcquisitionEditor},
                {extend: "edit", editor: pointAcquisitionEditor},
                {extend: "remove", editor: pointAcquisitionEditor}
        ]
    });

});
