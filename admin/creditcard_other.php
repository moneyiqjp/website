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
        var editor;
        var affiliate_editor;
        var values = [];

        editor = new $.fn.dataTable.Editor(
            {
                ajax: {
                    create: '../backend/crud/issuer/create', // default method is POST
                    edit: {
                        type: 'PUT',
                        url:  '../backend/crud/issuer/update'
                    },
                    remove: {
                        type: 'DELETE',
                        url: '../backend/crud/issuer/delete'
                    }
                },
                table: "#issuer",
                idSrc: "IssuerId",
                fields: [
                    {
                        label: "Id:",
                        name: "IssuerId",
                        type:  "readonly"
                    }, {
                        label: "Name:",
                        name: "IssuerName"
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
            $('#issuer').dataTable( {
                autoWidth: false,
                dom: "lrtTp",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/crud/issuer/all",
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    { "data": "IssuerId",edit: false, width:"20px" },
                    { "data": "IssuerName", width:"200px" },
                    { "data": "UpdateTime",visible: false  },
                    { "data": "UpdateUser",visible: false }
                ]
                ,tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        { sExtends: "editor_create", editor: editor },
                        { sExtends: "editor_edit",   editor: editor },
                        { sExtends: "editor_remove", editor: editor }
                    ]
                }
            } );
        });

        affiliate_editor = new $.fn.dataTable.Editor(
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
                dom: "lfrtTip",
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
                ]
                ,tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        { sExtends: "editor_create", editor: affiliate_editor },
                        { sExtends: "editor_edit",   editor: affiliate_editor },
                        { sExtends: "editor_remove", editor: affiliate_editor }
                    ]
                }
            } );
        });


        insuranceTypeEditor = new $.fn.dataTable.Editor(
            {
                ajax: {
                    create: '../backend/crud/insurance/type/create', // default method is POST
                    edit: {
                        type: 'PUT',
                        url:  '../backend/crud/insurance/type/update'
                    },
                    remove: {
                        type: 'DELETE',
                        url: '../backend/crud/insurance/type/delete'
                    }
                },
                table: "#insuranceType",
                idSrc: "InsuranceTypeId",
                fields: [
                    {
                        label: "Id:",
                        name: "InsuranceTypeId",
                        type:  "readonly"
                    }, {
                        label: "Type:",
                        name: "TypeName"
                    },  {
                        label: "Type (Japanese):",
                        name: "TypeDisplay"
                    },  {
                        label: "Subtype:",
                        name: "SubtypeName"
                    },  {
                        label: "Subtype (Japanese):",
                        name: "SubtypeDisplay"
                    },  {
                        label: "Description:",
                        name: "Description"
                    },  {
                        label: "Region:",
                        name: "Region"
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
            $('#insuranceType').dataTable( {
                dom: "lfrtTip",
                "ajax": {
                    "url": "../backend/crud/insurance/type/all",
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    { "data": "InsuranceTypeId",edit: false },
                    { "data": "TypeName" },
                    { "data": "TypeDisplay" },
                    { "data": "SubtypeName" },
                    { "data": "SubtypeDisplay" },
                    { "data": "Description" },
                    { "data": "Region" },
                    { "data": "UpdateTime",visible: false  },
                    { "data": "UpdateUser",visible: false  }
                ]
                ,tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        { sExtends: "editor_create", editor: insuranceTypeEditor },
                        { sExtends: "editor_edit",   editor: insuranceTypeEditor },
                        { sExtends: "editor_remove", editor: insuranceTypeEditor }
                    ]
                }
            } );
        });


        featureTypeEditor = new $.fn.dataTable.Editor(
            {
                ajax: {
                    create: '../backend/crud/feature/type/create', // default method is POST
                    edit: {
                        type: 'PUT',
                        url:  '../backend/crud/feature/type/update'
                    },
                    remove: {
                        type: 'DELETE',
                        url: '../backend/crud/feature/type/delete'
                    }
                },
                table: "#featureType",
                idSrc: "FeatureTypeId",
                fields: [
                    {
                        label: "Id:",
                        name: "FeatureTypeId",
                        type:  "readonly"
                    }, {
                        label: "Type:",
                        name: "Name"
                    },   {
                        label: "Description:",
                        name: "Description"
                    },  {
                        label: "Category:",
                        name: "Category"
                    }, {
                        label: "Foreground Color:",
                        name: "ForegroundColor"
                    }, {
                        label: "Background Color:",
                        name: "BackgroundColor"
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
            $('#featureType').dataTable( {
                dom: "lfrtTip",
                "pageLength": 25,
                "ajax": {
                    "url": "../backend/crud/feature/type/all",
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    { "data": "FeatureTypeId",edit: false },
                    { "data": "Name" },
                    { "data": "Description" },
                    { "data": "Category" },
                    { "data": "ForegroundColor" },
                    { "data": "BackgroundColor" },
                    { "data": "UpdateTime",edit: false, visible: false  },
                    { "data": "UpdateUser", visible: false }
                ]
                ,tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        { sExtends: "editor_create", editor: featureTypeEditor },
                        { sExtends: "editor_edit",   editor: featureTypeEditor },
                        { sExtends: "editor_remove", editor: featureTypeEditor }
                    ]
                }
            } );
        });
</script>
</head>

<body class="dt-other">


<table width="98%">
    <tr>
        <td width="360" valign="top">
            <div class="table-headline"><a name="issuers">Issuers</a></div>
            <a href="#affiliates" class="subheader">Affiliates</a>
            <a href="#insurance_type" class="subheader">Insurance Type</a>
            <a href="#feature_type" class="subheader">Feature Type</a>
            <table id="issuer" class="display" cellspacing="0" width="300">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Updated</th>
                    <th>User</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Updated</th>
                    <th>User</th>
                </tr>
                </tfoot>
            </table>

            <br />
            <br />
            <br />
        </td>
        <td>
            <div class="table-headline"><a name="feature_type">Feature Type</a></div>
            <a href="#issuers" class="subheader">Issuers</a>
            <a href="#affiliates" class="subheader">Affiliates</a>
            <a href="#insurance_type" class="subheader">Insurance Type</a>
           
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <div class="table-headline"><a name="affiliates">Affiliates</a></div>
            <a href="#issuers" class="subheader">Issuers</a>
            <a href="#insurance_type" class="subheader">Insurance Type</a>
            <a href="#feature_type" class="subheader">Feature Type</a>
            <table id="affiliate" class="display" cellspacing="0">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Website</th>
                    <th>SignedUpDate</th>
                    <th>Updated</th>
                    <th>User</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Website</th>
                    <th>SignedUpDate</th>
                    <th>Updated</th>
                    <th>User</th>
                </tr>
                </tfoot>
            </table>

            <br />
            <br />
            <br />
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <div class="table-headline"><a name="insurance_type">Insurance Type</a></div>
            <a href="#issuers" class="subheader">Issuers</a>
            <a href="#affiliates" class="subheader">Affiliates</a>
            <a href="#feature_type" class="subheader">Feature Type</a>
            <table id="insuranceType" class="display" cellspacing="0">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Japanese</th>
                    <th>Subtype</th>
                    <th>Japanese</th>
                    <th>Description</th>
                    <th>Region</th>
                    <th>Updated</th>
                    <th>User</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Subtype</th>
                    <th>Description</th>
                    <th>Region</th>
                    <th>Updated</th>
                    <th>User</th>
                </tr>
                </tfoot>
            </table>

            <br />
            <br />
            <br />
        </td>
    </tr>
</table>




</div>

</body>
</html>