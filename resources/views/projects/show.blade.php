@extends('adminlte::page')

@section('title', 'Pmanage')

@section('content_header')
    <h1> {{ $project->title }} </h1>
@stop

@section('content')
	<table id="collaborators" class="table table-striped table-bordered" width="100%" cellspacing="10">
	    <thead>
	        <tr>
	            <th>Colaborador</th>
	            <th>Fecha de ingreso</th>
	            <th>Acción</th>
	        </tr>
	    </thead>
	    <tbody>
			@foreach($project->users()->pluck('id') as $collaborator)
				@php
					$name = $project->users()->where('user_id', $collaborator)->value('name');
					$date = $project->users()->where('user_id', $collaborator)->value('project_user.created_at');
				@endphp
				<tr>
		            <td> {{ $name }} </td>
		            <td> {{ Carbon\Carbon::parse($date)->format('d-m-Y') }} </td>
		            <td> 
		            	<a class="btn btn-primary pull-left" href="/users/{{ $collaborator }}" role="button">Ver perfil</a>
		            	@if($project->manager == Auth::user()->name)
		            		&nbsp;
		            		<a class="btn btn-primary pull-center" href="/projects/{{ $project->id }}/users/{{ $collaborator }}" role="button">Gestionar</a>
		            	@endif 
			        </td>
		        </tr>
			@endforeach
		</tbody>
		<tfoot>
		        <tr>
		            <th>Colaborador</th>
		            <th>Fecha de ingreso</th>
		            <th>Acción</th>
		        </tr>
	    </tfoot>
	</table>
	<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>0</h3>

              <p>Tareas</p>
            </div>
            <div class="icon">
              <i class="ion-android-clipboard"></i>
            </div>
            <a href="tasks" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>0<sup style="font-size: 20px">%</sup></h3>

              <p>Completado</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="stats" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $project->users()->count() }}</h3>

              <p>Colaboradores</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="stats/users" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    </div>
    @if($project->manager == Auth::user()->name)
		<div class="w3-container"><a class="btn btn-success pull-center" href="/projects/{{$project->id}}/invite" role="button">Invitar colaboradores</a></div>
		&nbsp;
	@endif 
@stop

@section('js')

	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
		    $('#collaborators').DataTable();
		} );
	</script>
@stop