@extends('adminlte::page')

@section('title', 'Pmanage')

@section('content_header')
    <h1> Error </h1>
@stop
@section('content')
	<ol class="breadcrumb">
		<div class="error-page">
		    <h2 class="headline text-red">500</h2>
			    <div class="error-content">
			      <h3><i class="fa fa-warning text-red"></i>  Oops! Something went wrong.</h3>

			      <p>
			        We will work on fixing that right away.
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