@extends('adminlte::page')

@section('title', 'Pmanage')

@section('content_header')
    <h1> Colaboradores en: {{ $project->title }} </h1>
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
		            	@if(!$project->manager == Auth::user()->name)
		            		&nbsp;
		            		<a class="btn btn-primary pull-left" href="/message/create" role="button">Enviar mensaje</a>
		            		&nbsp;
		            		<a class="btn btn-warning pull-center" href="/projects/{{ $project->id }}/users/{{ $collaborator }}" role="button">Remover</a>
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