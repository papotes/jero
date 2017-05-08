@extends('adminlte::page')

@section('title', 'Pmanage')

@section('content_header')
    <h1>Listado de proyectos</h1>
@stop

@section('content')
	@if( ! $projects->isEmpty() )
		<table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
		    <thead>
		        <tr>
		            <th>Título del proyecto</th>
		            <th>Jefe de proyecto</th>
		            <th>Fecha de inicio</th>
		            <th>Acción</th>
		        </tr>
		    </thead>
		    <tfoot>
		        <tr>
		            <th>Título del proyecto</th>
		            <th>Jefe de proyecto</th>
		            <th>Fecha de inicio</th>
		            <th>Acción</th>
		        </tr>
		    </tfoot>
		    <tbody>
			    @foreach($projects as $project)
		    		<tr>
			            <td> {{ $project->title }} </td>
			            <td> {{ $project->manager }} </td>
			            <td> {{ $project->created_at }} </td>
			            <td>
			            	<a class="btn btn-primary pull-left" href="/projects/{{ $project->id }}" role="button">Ver</a>
			            	@if($project->manager == Auth::user()->name)
			            		&nbsp;
			            		<a class="btn btn-primary pull-center" href="/projects/{{ $project->id }}/edit" role="button">Editar</a>
			            	@endif
			            </td>
			        </tr>
		    	@endforeach
		    </tbody>
		</table> 
	@else
		<div class="box-header with-border">
        <h2 class="box-title">No hay nada para mostrar</h2>
      	</div>
		<div class="box-body">
		  <a href="/projects/create">¿Desea crear un proyecto?</a>
        </div>
	@endif
@stop

@section('js')

	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js">
	</script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js">
	</script>
	<script>
		$(document).ready(function() {
		    $('#example').DataTable();
		} );
	</script>
@stop

{{-- @section('css')
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
@stop --}}