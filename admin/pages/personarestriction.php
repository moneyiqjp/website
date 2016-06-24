<div class="row">
    <div class="col-lg-4">
        <div class="page-header">
            <h1>Feature Restriction</h1>
            <small>
                <a href="../backend/crud/restriction/feature/by/persona/id?Id=<?php echo $id ?>" class="source">Source</a>
            </small>
        </div>
        <table id="featureTable" class="display" cellspacing="0" width="400">
            <thead>
            <tr>
                <th>ID</th>
                <th>PersonaId</th>
                <th>FeatureId</th>
                <th>Category</th>
                <th>Name</th>
                <th>Description</th>
                <th>Not</th>
                <th>Active</th>
                <th>Update</th>
                <th>User</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>ID</th>
                <th>PersonaId</th>
                <th>FeatureId</th>
                <th>Category</th>
                <th>Name</th>
                <th>Description</th>
                <th>Not</th>
                <th>Active</th>
                <th>Update</th>
                <th>User</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-lg-8">
        <div class="page-header">
            <h1>General Restriction</h1>
            <small>
                <a href="../backend/crud/restriction/general/by/persona/id?Id=<?php echo $id ?>" class="source">Source</a>
            </small>
        </div>
        <table id="restrictionTable" class="display" cellspacing="0" width="98%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Persona</th>
                <th>RestrictionType</th>
                <th>Comparator</th>
                <th>Value</th>
                <th>Priority</th>
                <th>Updated</th>
                <th>User</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>Id</th>
                <th>Persona</th>
                <th>RestrictionType</th>
                <th>Comparator</th>
                <th>Value</th>
                <th>Priority</th>
                <th>Updated</th>
                <th>User</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>