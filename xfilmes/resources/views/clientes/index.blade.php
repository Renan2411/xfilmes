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
			<h1 class="display-3">Clientes</h1>    
			<div>
				<a style="margin: 19px;" href="{{ route('clientes.create')}}" class="btn btn-primary">Add Cliente</a>
			</div> 
			<table class="table table-striped">
				<thead>
					<tr>
						<td>Id</td>
						<td>Nome</td>
						<td>Email</td>
						<td>CPF</td>
						<td>Telefone</td>
						<td colspan = 2>Actions</td>
					</tr>
				</thead>
				<tbody>
					@foreach($clientes as $clientes)
					<tr>
						<td>{{$clientes->id}}</td>
						<td>{{$clientes->nome}}</td>
						<td>{{$clientes->email}}</td>
						<td>{{$clientes->cpf}}</td>
						<td>{{$clientes->telefone}}</td>
						<td>
							<a href="{{ route('clientes.edit',$clientes->id)}}" class="btn btn-primary">Edit</a>
						</td>
						<td>
							<form action="{{ route('clientes.destroy', $clientes->id)}}" method="post">
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
</main>
@endsection