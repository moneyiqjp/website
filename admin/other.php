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
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/tabletools/2.2.3/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" language="javascript" src="scripts/dataTables.editor.js"></script>

    <script type="text/javascript" language="javascript" class="init">
        var editor;
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
            //TODO switch localhost to relative query
            $('#issuer').dataTable( {
                dom: "Tfrtip",
                "ajax": {
                    "url": "../backend/crud/issuer/all",
                    "type": "GET",
                    "contentType": "application/json; charset=utf-8",
                    "dataType": "json"
                },
                "columns": [
                    { "data": "IssuerId",edit: false },
                    { "data": "IssuerName" },
                    { "data": "UpdateTime",edit: false  },
                    { "data": "UpdateUser" }
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
</script>
</head>

<body class="dt-other">

    <table id="issuer" class="display" cellspacing="0" width="100%">
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
</body>
</html>