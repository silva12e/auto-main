@extends('layouts.app')
@section('content')
<div class="container">
	<div class="col-md-6">
		 <ol class="breadcrumb" style="padding-left: 20px;">
            <li>
                <a class="active" href="/appointments">Appointments</a>
            </li>
            <li class="active">All appointments</li>
        </ol>
	</div>
	<appointment-index></appointment-index>
</div>
@endsection
