@extends('layouts.default')

@section('title', 'Add Project')

@section('content')
    <div class="row">
        <div class="form-group col-md-6 col-sm-6">
            <h1>Add Project</h1>
            {!! Form::open(['route' => 'projects.store']) !!}
            <div class="form-group">
                {!! Form::label( 'projectName', 'Project Name: ' ) !!}
                {!! Form::text( 'projectName', null, [ 'class' => 'form-control',
                                                 'placeholder' => 'Project Name',
                                                 ] ) !!}
            </div>
            <div class="form-group">
                {!! Form::label( 'scmHost', 'SCM Host: ' ) !!}
                {!! Form::select( 'scmHost', null, [ 'class' => 'form-control',
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
