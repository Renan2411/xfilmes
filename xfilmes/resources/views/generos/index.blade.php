@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="row">
		<div class="col-sm-12">

			@if(session()->get('success'))
			<div class="alert alert-success">
				{{ session()->get('success') }}  
			</div>
			@endif
		</div>
		<div class="col-sm-12">
			<h1 class="display-3">Gêneros</h1>    
			<div>
				<a style="margin: 19px;" href="{{ route('generos.create')}}" class="btn btn-primary">Add Generos</a>
			</div> 
			<table class="table table-striped">
				<thead>
					<tr>
						<td>ID</td>
						<td>Título</td>
						<td colspan = 2>Actions</td>
					</tr>
				</thead>
				<tbody>
					@foreach($generos as $genero)
					<tr>
						<td>{{$genero->id}}</td>
						<td>{{$genero->genero}}</td>
						<td>
							<form action="{{ route('generos.destroy', $genero->id)}}" method="post">
								@csrf
								@method('DELETE')
								<button class="btn btn-danger" type="submit">Delete</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection