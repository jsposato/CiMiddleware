@extends('layouts.default')

@section('title', 'Edit Project')

@section('content')
    <div class="row">
        <div class="span12">
            <h1>Edit {{ $project->projectName }}</h1>
        </div>
    </div>
@stop
