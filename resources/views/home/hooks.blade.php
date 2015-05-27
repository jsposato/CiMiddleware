<?php
ini_set("display_errors", "1");
include('../resources/views/templates/head.php');
?>
<body>
<div class="container">
    <div class="row">
        <div class="span12">
            <legend>Hook Events</legend>
            <table class="table table-hover table-bordered table-responsive table-condensed table-striped table-border">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Event Name</th>
                    <th>Branch</th>
                    <th>HTML URL</th>
                    <th>SSH URL</th>
                </tr>
                </thead>
                <?php
                foreach ($hooks as $hook) {
                    $arrHook = json_decode($hook['payload'], true);
                    echo "<tr>
                <td>$hook[id]</td>
                <td>$hook[event_name]</td>
                <td>$arrHook[ref]</td>
                <td>{$arrHook['repository']['html_url']}</td>
                <td>{$arrHook['repository']['ssh_url']}</td>
              </tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>