@extends('layouts.default')

@section('title', 'Edit Project')

@section('content')
    <div class="row">
        <div class="form-group col-md-6 col-sm-6">
            <h1>Edit Project</h1>
            {!! Form::model($project, ['method' => 'PUT', 'route' => ['projects.update', $project->id], 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label( 'projectName', 'Project Name: ' ) !!}
                {!! Form::text( 'projectName', null, [ 'class' => 'form-control',
                                                 'placeholder' => 'Project Name',
                                                 'disabled' => 'true'
                                                 ] ) !!}
            </div>
            <div class="form-group">
                {!! Form::label( 'scmHost', 'SCM Host: ' ) !!}
                {!! Form::text( 'scmHost', null, [ 'class' => 'form-control',
                'placeholder' => 'SCM Host',
                'disabled' => 'true'
                ] ) !!}
            </div>
            <div class="form-group">
                {!! Form::label( 'configFile', 'Upload Config File ' ) !!}
                {!! Form::file( 'configFile' ) !!}
            </div>
            <div class="form-group">
                {!! Form::submit( 'Submit' ) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
