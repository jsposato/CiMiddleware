@extends('layouts.default')

@section('title', 'All Hook events')

@section('content')
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
                    <th>Date</th>
                </tr>
                </thead>
                <?php
                foreach ($hooks as $hook) {
                    $arrHook = json_decode($hook['payload'], true);
                    $createdDate = date('m/d/Y', strtotime($hook['created_at']));

                    echo "<tr>
                <td>$hook[id]</td>
                <td>$hook[event_name]</td>
                <td>$arrHook[ref]</td>
                <td>{$arrHook['repository']['html_url']}</td>
                <td>{$arrHook['repository']['ssh_url']}</td>
                <td>$createdDate</td>
              </tr>";
                }
                ?>
            </table>
        </div>
    </div>
@stop