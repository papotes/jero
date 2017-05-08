@extends('adminlte::page')

@section('title', 'Pmanage')

@section('content_header')
    <h1>Crear proyectos</h1>
@stop

@section('content')
  <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Agregar proyecto</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" action="/projects/" method="POST">
       {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Título del proyecto</label>
            <div class="col-sm-10">
              <input class="form-control" id="title" name="title" placeholder="My little project" type="text" required>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-default">Cancelar</button>
          <button type="submit" class="btn btn-info pull-right">Crear</button>
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