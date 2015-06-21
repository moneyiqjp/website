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
        $(document).ready(function() {


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
                            name: "PointsPerYen"
                        }, {
                            label: "YenPerPoint:",
                            name: "YenPerPoint"
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

            $('#pointsystem').dataTable({
                dom: "Tfrtip",
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
                                return "<a href='pointprogram_details.php?Id=" + data + "'>Details</a>";
                            }
                            return data;
                        }
                    }
                ],
                tableTools: {
                    sRowSelect: "os",
                    aButtons: [
                        {sExtends: "editor_create", editor: editor},
                        {sExtends: "editor_edit", editor: editor},
                        {sExtends: "editor_remove", editor: editor}
                    ]
                }
            });
        } );

    </script>

</head>

<body class="dt-other">
<div class="table-headline">
    <a name="pointsystems">
        Point Systems
    </a>
</div>

<table id="pointsystem" class="display" cellspacing="0">
    <thead>
    <tr>
        <th>Id</th>
        <th>name</th>
        <th>points-per-yen<br>(default)</th>
        <th>yen-per-point<br>(default)</th>
        <th>update</th>
    </tr>
    </thead>

    <tfoot>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>points-per-yen<br>(default)</th>
        <th>yen-per-point<br>(default)</th>
        <th>update</th>
    </tr>
    </tfoot>
</table>
</body>
</html>