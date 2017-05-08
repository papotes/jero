@extends('adminlte::page')

@section('title', 'Pmanage')

@section('content_header')
    <h1>Invitaciones de proyectos</h1>
@stop

@section('content')
	@if( ! $invites->isEmpty() )
		<table id="invites" class="table table-striped table-bordered" width="100%" cellspacing="0">
		    <thead>
		        <tr>
		            <th>Título de la invitación</th>
		            <th>Jefe de proyecto</th>
		            <th>Proyecto</th>
		            <th>Acción</th>
		        </tr>
		    </thead>
		    <tfoot>
		        <tr>
		            <th>Título de la invitación</th>
		            <th>Jefe de proyecto</th>
		            <th>Proyecto</th>
		            <th>Acción</th>
		        </tr>
		    </tfoot>
		    <tbody>
			    @foreach($invites as $invite)
		    		<tr>
			            <td> {{ $invite->title }} </td>
			            <td> {{ $invite->manager }} </td>
			            <td> {{ $invite->project }} </td>
			            <td>
			            	<a class="btn btn-primary pull-left" href="/invites/{{ $invite->id }}" role="button">Ver</a>
			            </td>
			        </tr>
		    	@endforeach
		    </tbody>
		</table> 
	@else
		<div class="box-header with-border">
        <h2 class="box-title">No hay nada para mostrar</h2>
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
		    $('#invites').DataTable();
		} );
	</script>
@stop
