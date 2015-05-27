<?php
ini_set("display_errors", "1");
include('../resources/views/templates/head.php');
?>
<body>
<div class="container">
    <div class="row">
        <div class="span12">
            <legend>Projects</legend>
            <table class="table table-hover table-bordered table-responsive table-condensed table-striped table-border">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Project Name</th>
                    <th>CI Host IP</th>
                    <th>CI Host Username</th>
                </tr>
                </thead>
                <?php
                foreach ($projects as $project) {
                    echo "<tr>
                <td>$project[id]</td>
                <td>$project[projectName]</td>
                <td>$project[ciHostIP]</td>
                <td>$project[ciUsername]</td>
              </tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>