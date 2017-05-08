@extends('adminlte::page')

@section('title', 'Pmanage')

@section('content_header')
    <h1>Invitar colaborador</h1>
@stop

@section('content')
  <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Enviar invitación para: {{ $project->title }}</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" action="/invites/" method="POST">
      <input type="hidden" name="project" id="project" value="{{ $project->id }}">
       {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Para: </label>
            <div class="col-sm-10">
              <select class="form-control" id="colaborator">
                @foreach( $users->pluck('name') as $colaborador )
                  <option> {{ $colaborador }} </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Título de la invitación</label>
            <div class="col-sm-10">
              <input class="form-control" id="title" name="title" type="text" required>
            </div>
          </div>
          <div class="form-group">
            <label for="mbody" class="col-sm-2 control-label">Cuerpo de la invitación</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="5" id="mbody" name="mbody"></textarea>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-success pull-left">Enviar invitación</button>
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