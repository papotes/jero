@extends('adminlte::page')

@section('title', 'Pmanage')

@section('content_header')
    <h1>Editar proyecto: {{ $project->title }}</h1>
@stop

@section('content')
  <div class="box box-primary">

    <div class="box-header with-border">
      <h3 class="box-title">Editar proyecto</h3>
    </div>
      <!-- /.box-header -->
      <!-- form start -->
    <form class="form-horizontal" action="/projects/{{ $project->id }}" method="POST">
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="box-body">
        <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Título del proyecto</label>
          <div class="col-sm-10">
            <input class="form-control" id="title" name="title" placeholder="{{ $project->title }}" type="text" required>
          </div>
        </div>
        <div class="form-group">
          <label for="sel1" class="col-sm-2 control-label">Jefe de proyecto</label>
            <div class="col-sm-10">
              <select class="form-control" id="sel1">
                @foreach( $project->users()->pluck('name') as $collaborator )
                  <option> {{ $collaborator }} </option>
                @endforeach
              </select>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-info pull-left">Enviar cambios</button>
        &nbsp;
        <button type="submit" class="btn btn-default pull-center">Cancelar</button>
      </div>
      <!-- /.box-footer -->
    </form>
	</div>
  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
@stop 