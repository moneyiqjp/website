/**
 * Created by Work on 6/9/2016.
 */

var categories = queryIdValMap('../backend/crud/storecategory/all',"StoreCategoryId","Name");


storeEditor = new $.fn.dataTable.Editor(
    {
        ajax: {
            create: '../backend/crud/store/create', // default method is POST
            edit: {
                type: 'PUT',
                url:  '../backend/crud/store/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/store/delete'
            }
        },
        table: "#stores",
        idSrc: "StoreId",
        fields: [
            {
                label: "Id:",
                name: "StoreId",
                type:  "readonly"
            },  {
                label: "Category:",
                name: "StoreCategory.StoreCategoryId",
                type: "select",
                options:categories

            },  {
                label: "Name:",
                name: "StoreName"
            },   {
                label: "Description:",
                name: "Description"
            },{
                label: "Is Major:",
                name: "IsMajor",
                type: "select",
                options: [
                    { label: "Yes", value: 1 },
                    { label: "No", value: 0 }
                ]
            }, {
                label: "Allocation (%):",
                name: "Allocation"
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
    $('#stores').dataTable({
        dom: "BfrtTip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/store/all",
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "StoreId", visible: false},
            {"data": "StoreName"},
            {"data": "StoreCategory.Name", editField: "StoreCategory.StoreCategoryId"},
            {"data": "Description"},
            {
                "data": "IsMajor",
                render: function (data, type, row) {
                    if (type === 'display') {
                        if (data > 0) return "true";
                        return "false";
                    }
                    return data;
                }
            },
            {"data": "Allocation"},
            {"data": "UpdateTime", visible: false},
            {"data": "UpdateUser", visible: false}
        ],
        select: true,
        buttons: [
                {extend: "create", editor: storeEditor},
                {extend: "edit", editor: storeEditor},
                {extend: "remove", editor: storeEditor}
        ]
    });
});