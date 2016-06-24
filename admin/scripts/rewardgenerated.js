/**
 * Created by Work on 6/8/2016.
 */


$(document).ready(function() {

    $('#mileageRewardTable').dataTable({
        dom: "lfrtip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/mileage/reward/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "RewardId", width: "20px"},
            {"data": "PointSystem.PointSystemName", editField: "PointSystem.PointSystemId", width: "20px"},
            {"data": "Type.Name", editField: "Type.RewardTypeId", width: "50px"},
            {"data": "Category.Name", editField: "Category.RewardCategoryId", width: "50px"},
            {"data": "Store.StoreName", editField: "Store.StoreId", width: "50px"},
            {"data": "Title", width: "150px"},
            //{"data": "Description",width:"200px", visible:false},
            {
                "data": "Description",
                render: function (data, type, full, meta) {
                    if (type === 'display') {
                        if (data == null) return "";
                        return data.substring(0, 50).concat("...");
                    }
                    return data;
                }
            },
            {
                "data": "Icon",
                render: function (data, type, full, meta) {
                    if (type === 'display') {
                        if (data == null) return "";
                        return data.substring(0, 20).concat("...");
                    }
                    return data;
                }
            },
            {"data": "YenPerPoint", width: "20px"},
            {"data": "PricePerUnit", width: "20px"},
            {"data": "MinPoints", width: "20px"},
            {"data": "MaxPoints", width: "20px"},
            {"data": "RequiredPoints", width: "20px"},
            {"data": "MaxPeriod", width: "20px"},
            {"data": "Reference", visible: false},
            {"data": "PointMultiplier", width: "20px"},
            {"data": "Unit.Description", editField: "Unit.UnitId", width: "40px"},
            {"data": "UpdateTime", visible: false, width: "20px"},
            {"data": "UpdateUser", visible: false, width: "20px"}
        ]
    });

});