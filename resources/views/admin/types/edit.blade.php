@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Modifica: {{ $type->name_project }}</h1>
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
			</div>
		</div>

		<div class="row">
			<div class="col-12">

				{{-- Questo form non carica una generica rotta "store" ma ha bisogno dell'id del gioco da aggiornare --}}
				<form method="POST" action="{{ route('admin.types.update', $type->id) }}">
					@method('PUT') {{-- v. slide da 32 a 35 --}}
					@csrf
					<div class="mb-3">
						<h3 class="form-label">Type</h3>
						<input type="text" name="name" value="{{ $type->name }}">
					</div>
					<div class="mb-3">
						<h3 class="form-label">Descrizione</h3>
						<textarea type="text" class="form-control" name="description" required>{{ $type->description }}</textarea>
					</div>

					<div class="mb-3">
						<h3 class="form-label">Icon</h3>
						<input type="text" class="form-control" name="icon" required value="{{ $type->icon }}">
					</div>

					<button type="submit" class="btn btn-primary">Invia Modifiche</button>
				</form>
			</div>

		</div>
	</div>
	</div>
@endsection
