@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			 <ol class="breadcrumb" style="padding-left: 20px;">
	            <li>
	                <a class="active" href="/appointments">Appointments</a>
	            </li>
	            <li class="active">create new appointment</li>
	        </ol>
		</div>
	</div>
	<create-appointment></create-appointment>
</div>
@endsection
