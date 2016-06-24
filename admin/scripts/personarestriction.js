/**
 * Created by Work on 6/12/2016.
 */
var restrictionTypes = queryIdValMap('../backend/crud/restriction/type/all',"RestrictionTypeId","Name");

$(document).ready(function () {
    var personaId = getQueryVariable("id");

    var featureEditor = new $.fn.dataTable.Editor({
        ajax: {
            create: '../backend/crud/restriction/feature/create', // default method is POST
            edit: {
                type: 'PUT',
                url: '../backend/crud/restriction/feature/update'
            },
            remove: {
                type: 'DELETE',
                url: '../backend/crud/restriction/feature/delete'
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
                label: "PersonaId:",
                name: "PersonaId",
                type: "readonly"
            }, {
                label: "FeatureTypeId:",
                name: "FeatureTypeId",
                type: "readonly"
            }, {
                label: "Name:",
                name: "Name",
                type: "readonly"
            }, {
                label: "Negative:",
                name: "Negative",
                type: "readonly"
            }, {
                label: "Category:",
                name: "Category",
                type: "readonly"
            }, {
                label: "Description:",
                name: "Description",
                type: "readonly"
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

    $('#featureTable').dataTable({
        dom: "tTr",
        "pageLength": 50,
        "ajax": {
            "url": "../backend/crud/restriction/feature/by/persona/id?Id=" + personaId,
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        paging: false,
        searching: false,
        "order": [[2, "asc"], [3, "asc"]],
        "columns": [
            {"data": "FeatureId", edit: false, visible: false},
            {"data": "PersonaId", edit: false, visible: false},
            {"data": "FeatureTypeId", visible: false},
            {"data": "Category", edit: false, width: "50"},
            {"data": "Name", edit: false},
            {"data": "Description", edit: false, visible: false, width: "80"},
            {
                "data": "Negative",
                render: function (data, type, row) {
                    if (type === 'display') {
                        if(data==0) {
                            return '<input type="checkbox" class="editor-negative">';
                        } else {
                            return '<input type="checkbox" class="editor-negative" checked>';
                        }
                    }
                    return data;
                },
                className: "dt-body-center",
                width: "5"
            },
            {
                "data": "Active",
                render: function (data, type, row) {
                    if (type === 'display') {
                        if(data==0) {
                            return '<input type="checkbox" class="editor-afield">';
                        } else {
                            return '<input type="checkbox" class="editor-afield" checked>';
                        }
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
            $('input.editor-afield', row).prop('checked', data['Active'] == 1);
            $('input.editor-negative', row).prop('checked', data['Negative'] == 1);
        },
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
        .on('change', 'input.editor-negative', function () {
            featureEditor
                .edit($(this).closest('tr'), false)
                .set('Negative', $(this).prop('checked') ? 1 : 0)
                .submit();
        })
        .on('click', 'tbody td:not(:first-child)', function (e) {

            if( $.inArray(e.target.className, ["editor-afield","editor-negative"] ) == -1 )
            {
                // featureEditor.inline(this);
            }
    });

    var restrictionEditor = new $.fn.dataTable.Editor({
            ajax: {
                create: '../backend/crud/restriction/general/create', // default method is POST
                edit: {
                    type: 'PUT',
                    url:  '../backend/crud/restriction/general/update'
                },
                remove: {
                    type: 'DELETE',
                    url: '../backend/crud/restriction/general/delete'
                }
            },
            table: "#restrictionTable",
            idSrc: "GeneralRestrictionId",
            fields: [
                {
                    label: "Id:",
                    name: "GeneralRestrictionId",
                    type:  "readonly"
                },{
                    label: "Persona:",
                    name: "Persona.PersonaId",
                    type: "readonly",
                    def: personaId
                    /*type:  "select",
                     options: personas
                     */
                },{
                    label: "RestrictionType:",
                    name: "RestrictionType.RestrictionTypeId",
                    type: "select",
                    options:restrictionTypes
                },  {
                    label: "Comparator",
                    name: "Comparator",
                    type: "select",
                    options: ['=', '!=', '>', '<', 'in', 'not in']
                },  {
                    label: "Value:",
                    name:  "Value"
                },  {
                    label: "Priority",
                    name: "Priority"
                },  {
                    label: "Update date:",
                    name: "update_time",
                    type: "readonly"
                }, {
                    label: "Update user:",
                    name: "update_user"
                }
            ]
        });

    $('#restrictionTable').dataTable({
        dom: "BlfrtTip",
        "pageLength": 25,
        "ajax": {
            "url": "../backend/crud/restriction/general/by/persona/id?Id=" + personaId,
            "type": "GET",
            "contentType": "application/json; charset=utf-8",
            "dataType": "json"
        },
        "columns": [
            {"data": "GeneralRestrictionId",width:"125px"},
            {"data": "Persona.Name",editField: "Persona.PersonaId", width:"150px"},
            {"data": "RestrictionType.Name", editField: "RestrictionType.RestrictionTypeId",width:"150px"},
            {"data": "Comparator",width:"100px"},
            {"data": "Value",width:"100px"},
            {"data": "Priority",width:"50px", visible:false},
            {"data": "UpdateTime", visible:false,width:"20px"},
            {"data": "UpdateUser",  visible:false,width:"20px"}
        ],
        select: true,
        buttons: [
                {extend: "create", editor: restrictionEditor},
                {extend: "edit", editor: restrictionEditor},
                {extend: "remove", editor: restrictionEditor}
        ]
    });
});