@extends('adminlte::page')

@section('title', 'Pmanage')

@section('content_header')
    <h1> Página no encontrada </h1>
@stop
@section('content')
	<ol class="breadcrumb">
		<div class="error-page">
		    <h2 class="headline text-yellow"> 404 </h2>
			    <div class="error-content">
			      <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>

			      <p>
			        We could not find the page you were looking for.
			        Meanwhile, you may <a href="../../home">return to dashboard</a> or try using the search form.
			      </p>

			      <form class="search-form">
			        <div class="input-group">
			          <input name="search" class="form-control" placeholder="Search" type="text">

			          <div class="input-group-btn">
			            <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
			            </button>
			          </div>
			        </div>
			        <!-- /.input-group -->
			      </form>
		    	</div>
	    <!-- /.error-content -->
	    </div>
	</ol>
@stop