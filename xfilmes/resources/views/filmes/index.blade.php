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
		<h1 class="display-3">Filmes</h1>    
		<div>
			<a style="margin: 19px;" href="{{ route('filmes.create')}}" class="btn btn-primary">Add Filmes</a>
		</div> 
		<table class="table table-striped">
			<thead>
				<tr>
					<td>Título</td>
					<td>Ano</td>
					<td>Duração</td>
					<td>Classificação Indicativa</td>
					<td>Gênero</td>
					<td colspan = 2>Actions</td>
				</tr>
			</thead>
			<tbody>
				@foreach($filmes as $filmes)
				<tr>
					<td>{{$filmes->titulo}}</td>
					<td>{{$filmes->ano}}</td>
					<td>{{$filmes->duracao}}</td>
					<td>{{$filmes->ci}}</td>
					<td>{{$filmes->genero_id}}</td>
					<td>
						<a href="{{ route('filmes.edit',$filmes->id)}}" class="btn btn-primary">Edit</a>
					</td>
					<td>
						<form action="{{ route('filmes.destroy', $filmes->id)}}" method="post">
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