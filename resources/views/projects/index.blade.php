@extends('layouts.default')

@section('title', 'All Projects')

@section('content')
    <div class="row">
        <div class="span12">
            <legend>Projects</legend>
            <table class="table table-hover table-bordered table-responsive table-condensed table-striped table-border">
                <thead>
                <tr>
                    <th>Project Name</th>
                    <th>CI Host IP</th>
                    <th>CI Host Username</th>
                    <th>Repository Name</th>
                    <th>Repository Host</th>
                </tr>
                </thead>
                <?php
                foreach ($projects as $project) {
                    $url = action('ProjectsController@edit', $project['id']);
                    echo "<tr>
                <td><a href=\"$url\">$project[projectName]</a></td>
                <td>$project[ciHostIP]</td>
                <td>$project[ciUsername]</td>
                <td>$project[scmRepositoryName]</td>
                <td>$project[scmHost]</td>
              </tr>";
                }
                ?>
            </table>
        </div>
    </div>
@stop
