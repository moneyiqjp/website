<div class="row">
    <div class="col-lg-4">
        <div class="page-header">
            <h1>Credit Card</h1>
            <small>
                <a href="../backend/crud/creditcard/pointsystem/mapping/by/pointsystem?Id=<?php echo $id ?>" class="source">Source</a>
            </small>
        </div>
        <table id="creditCardMappingTable" class="display">
            <thead>
            <tr>
                <th>Id</th>
                <th>PointSystemId</th>
                <th>Credit Card</th>
                <th>User</th>
                <th>Time</th>
                <th>Details</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>Id</th>
                <th>PointSystemId</th>
                <th>Credit Card</th>
                <th>User</th>
                <th>Time</th>
                <th>Details</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-lg-8">
        <div class="page-header">
            <h1>Point System Overview</h1>
            <small>
                <a href="../backend/crud/pointsystem/by/id?Id=<?php echo $id ?>" class="source">Source</a>
            </small>
        </div>
        <table id="pointsystem" class="display" cellspacing="0">
            <thead>
            <tr>
                <th>Id</th>
                <th>name</th>
                <th>points-per-yen (default)</th>
                <th>yen-per-point (default)</th>
            </tr>
            </thead>
        </table>
    </div>
</div>