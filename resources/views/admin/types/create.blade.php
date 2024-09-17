@extends('layouts.app')

@section('content')
	<div class="text-center">
		<h1>Aggiungi un nuovo type</h1>
		<form action="{{ route('admin.types.store') }}" method="POST">
			@csrf
			<div class="my-5">
				<label for="name">Nome tipo</label>
				<input type="text" name="name" value="{{ old('name') }}">
			</div>

			<div class="my-5">
				<label for="description">Descrizione</label>
				<input style="width: 80%" type="text" id="description" name="description" value="{{ old('description') }}">
				@error('description')
					<div>{{ $message }}</div>
				@enderror
			</div>

			<div class="my-5">
				<label for="icon">Icon</label>
				<input type="text" name="icon" required value="{{ old('icon') }}">
			</div>

			<!-- Aggiungi qui altri campi del form se necessario -->
			<button class="mt-1 bg-success" type="submit">Aggiungi type</button>
		</form>

	</div>
	<div class="text-end">
		<a class="m-1 btn btn-primary" href="{{ route('admin.types.index') }}">Torna alla lista dei types</a>
	</div>
@endsection
