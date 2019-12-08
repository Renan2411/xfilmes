@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="container-fluid">
		<div class="col-sm-8 offset-sm-2">
			<h1 class="display-3">Cadastro</h1>
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div><br/>
			@endif
			<form method="post" action="{{ route('clientes.store') }}">
				@csrf
				<div class="form-group">
					<label for="titulo">Nome:</label>
					<input type="text" name="nome" class="form-control">
				</div>

				<div class="form-group">
					<label for="duracao">Email:</label>
					<input type="text" name="email" class="form-control date-mask"s>
				</div>


				<div class="row">
					<div class="col">
						<label for="tipo">Telefone:</label>
						<input type="text" name="telefone" class="form-control">
					</div>

					<div class="col">
						<label for="ano">CPF:</label>
						<input type="number" name="cpf" class="form-control datepicker">
					</div>
				</div>

			<div class="form-group"></div>
			<button type="submit" class="btn btn-primary">Add Cliente</button>
		</form>
	</div>
</div>
</div>
</main>
@endsection