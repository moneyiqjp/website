/**
 * Created by Work on 6/8/2016.
 */
var rewardTypes = queryIdValMap('../backend/display/reward/type/all',"value","label");
var units = queryIdValMap('../backend/crud/unit/all',"UnitId","Description");
var rewardCategories = getRewardCategories();
var stores = getStores();
rewardEditor = new $.fn.dataTable.Editor(
    {
        ajax: {
            create: '../backend/crud/reward/create', // default method is POST
            edit: {
                type: 'PUT',
                url:  '../backend/crud/reward/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/reward/delete'
            }
        },
        table: "#rewardTable",
        idSrc: "RewardId",
        fields: [
            {
                label: "Id:",
                name: "RewardId",
                type:  "readonly"
            },{
                label: "PointSystem:",
                name: "PointSystem.PointSystemId",
                type:  "readonly"
            },{
                label: "Type:",
                name: "Type.RewardTypeId",
                type:  "select",
                options: rewardTypes
            }, {
                label: "Category:",
                name: "Category.RewardCategoryId",
                type:  "select",
                options: rewardCategories
            },  {
                label: "Store:",
                name:  "Store.StoreId",
                type:  "select",
                options: stores
            },  {
                label: "Title:",
                name: "Title"
            },  {
                label: "Description:",
                name: "Description"
            },  {
                label: "Icon:",
                name: "Icon"
            },{
                label: "YenPerPoint:",
                name: "YenPerPoint",
                def: 1.0
            },  {
                label: "PricePerUnit:",
                name: "PricePerUnit",
                def: 1.0
            },{
                label: "MinPoints:",
                name: "MinPoints"
            },  {
                label: "MaxPoints:",
                name: "MaxPoints"
            },  {
                label: "RequiredPoints:",
                name: "RequiredPoints"
            },  {
                label: "MaxPeriod:",
                name: "MaxPeriod"
            },  {
                label: "Reference",
                name:  "Reference",
                type: "EditAndLink"
            }, {
                label: "PointMultiplier",
                name:  "PointMultiplier"
            }, {
                label: "Unit",
                name:  "Unit.UnitId",
                type: "select",
                options: units,
                def:1
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

$(document).ready(function() {

    $('#rewardTable').dataTable({
        dom: "BlfrtTip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/reward/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "RewardId",width:"20px"},
            {"data": "PointSystem.PointSystemName",editField: "PointSystem.PointSystemId"},
            {"data": "Type.Name", editField: "Type.RewardTypeId",width:"50px"},
            {"data": "Category.Name", editField: "Category.RewardCategoryId",width:"50px"},
            {"data": "Store.StoreName", editField: "Store.StoreId",width:"50px"},
            {"data": "Title",width:"150px"},
            //{"data": "Description",width:"200px", visible:false},
            {
                "data": "Description",
                render: function ( data, type, full, meta ) {
                    if ( type === 'display' ) {
                        if(data==null) return "";
                        return data.substring(0, 50).concat("...");
                    }
                    return data;
                }
            },
            {
                "data": "Icon",
                render: function ( data, type, full, meta ) {
                    if ( type === 'display' ) {
                        if(data == null) return "";
                        return "<img src='" +  data + "'>";
                    }
                    return data;
                }
            },
            {"data": "YenPerPoint",width:"20px"},
            {"data": "PricePerUnit",width:"20px"},
            {"data": "MinPoints",width:"20px"},
            {"data": "MaxPoints",width:"20px"},
            {"data": "RequiredPoints",width:"20px"},
            {"data": "MaxPeriod",width:"20px"},
            {"data": "Reference", visible:false},
            {"data": "PointMultiplier",width:"20px"},
            {"data": "Unit.Description", editField: "Unit.UnitId",width:"40px"},
            {"data": "UpdateTime", visible:false,width:"20px"},
            {"data": "UpdateUser",  visible:false,width:"20px"}
        ],
            select: true,
            buttons: [
                {extend: "create", editor: rewardEditor},
                {extend: "edit", editor: rewardEditor},
                {extend: "remove", editor: rewardEditor}
            ],

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
    } );

});