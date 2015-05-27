<?php
ini_set("display_errors", "1");
include('../resources/views/templates/head.php');
?>
<body>
<div class="container">
    <div class="row">
        <div class="span12">
            <legend>Jobs</legend>
            <table class="table table-hover table-bordered table-responsive table-condensed table-striped table-border">
                <thead>
                <tr>
                    <th>Job Name</th>
                </tr>
                </thead>
                <?php
                for ($i=0; $i<count($views); $i++) {
                    echo "<tr>
                        <td>$views[$i]</td>
                    </tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>