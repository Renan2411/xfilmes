@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="col-sm-8 offset-sm-2">
		<h1 class="display-3">Editar</h1>
		<div>
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div><br/>
			@endif
			<form method="post" action="{{ route('filmes.update', $filme->id) }}">
				@method('PATCH') 
				@csrf
				<div class="form-group">
					<label for="titulo">Título:</label>
					<input type="text" name="titulo" class="form-control" value={{$filme->titulo}}>
				</div>

				<div class="row">
					<div class="col">
						<label for="duracao">Duração:</label>
						<input type="text" name="duracao" class="form-control date-mask" value={{$filme->duracao}}>
					</div>

					<div class="col">
						<label for="ano">Lançamento:</label>
						<input type="number" name="ano" id="ano" class="form-control datepicker" value={{$filme->lancamento}}>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<label for="tipo">Tipo:</label>
						<select class="form-control" name="genero">
							@foreach($generos as $genero)
							<option value='{{ $genero->id }}'>{{ $genero->genero }}</option>
							@endforeach
						</select>
					</div>

					<div class="col">
						<label id="ci">Classificação:</label>
						<select class="form-control" name="ci">
							<option value={{$filme->ci}}><?php echo $filme->ci ?></option>
							<option value="10">10+</option>
							<option value="12">12+</option>
							<option value="14">14+</option>
							<option value="16">16+</option>
							<option value="18">18+</option>
						</select>
					</div>
				</div>

				<div class="form-group"></div>
				<button type="submit" class="btn btn-primary">Editar Filmes</button>
			</form>
			
			<div class="form-group"></div>

			<a href="{{ route('filmes.index')}}" class="btn btn-primary">Cancelar</a>

		</div>
	</div>
</div>
@endsection