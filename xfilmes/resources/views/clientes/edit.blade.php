@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

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
				<form method="post" action="{{ route('clientes.update', $cliente->id) }}">
					@method('PATCH') 
					@csrf
					<div class="form-group">
						<label for="titulo">Nome:</label>
						<input type="text" name="nome" class="form-control" value={{$cliente->nome}}>
					</div>

					
					<div class="form-group">
						<label for="duracao">Email:</label>
						<input type="text" name="email" class="form-control date-mask" value={{$cliente->email}}>
					</div>

					<div class="row">

						<div class="col">
							<label for="ano">Telefone:</label>
							<input type="number" name="telefone" class="form-control" value={{$cliente->telefone}}>
						</div>

						<div class="col">
							<label for="tipo">cpf:</label>
							<input type="number" name="cpf" class="form-control" value={{$cliente->cpf}}>
						</div>
					</div>


					<div class="form-group"></div>
					<button type="submit" class="btn btn-primary">Editar Cliente</button>
				</form>

				<div class="form-group"></div>

				<a href="{{ route('clientes.index')}}" class="btn btn-primary">Cancelar</a>

			</div>
		</div>
	</div>
</main>
@endsection