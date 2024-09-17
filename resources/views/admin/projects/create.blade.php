@extends('layouts.app')

@section('content')
	<div class="p-4">
		<h1>Aggiungi un nuovo progetto</h1>
		<form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="my-4">
				<label for="name_project">Titolo:</label>
				<input style="width: 20%" type="text" id="name_project" name="name_project" value="{{ old('name_project') }}">
				@error('name_project')
					<div>{{ $message }}</div>
				@enderror
			</div>

			<div class="my-4">
				<label for="description">Descrizione:</label>
				<input style="width: 80%" type="text" id="description" name="description" value="{{ old('description') }}">
				@error('description')
					<div>{{ $message }}</div>
				@enderror
			</div>

			<div class="my-4">

				<label for="img" class="form-label">Immagine:</label>
				<input type="file" class="form-control" name="img" id="img" placeholder="" aria-describedby="imgHelper"
					style="width:70%" />
				<div id="imgHelper" class="form-text">Upload an image for the curret project</div>
				@error('img')
					<div class="form-text text-danger">{{ $message }}</div>
				@enderror

			</div>

			<div class="my-4">
				<label for="link">Link Github:</label>
				<input style="width: 20%" type="text" id="link" name="link" value="{{ old('link') }}">
				@error('link')
					<div>{{ $message }}</div>
				@enderror
			</div>

			<div class="my-4">
				@foreach ($languages as $language)
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="{{ $language->id }}" id="language" name="languages[]">
						<label class="form-check-label" for="language">
							{{ $language->name }}
						</label>
					</div>
				@endforeach
				@error('languages')
					<div>{{ $message }}</div>
				@enderror
			</div>

			<div class="my-4">
				<label for="type_id">Type:</label>
				<select name="type_id" id="type_id">
					@foreach ($types as $type)
						<option value="{{ $type->id }}">{{ $type->name }}</option>
					@endforeach
				</select>
				@error('type_id')
					<div>{{ $message }}</div>
				@enderror
			</div>

			<!-- Aggiungi qui altri campi del form se necessario -->
			<button class="my-4 bg-success" type="submit">Aggiungi progetto</button>
		</form>

		<a class="mt-1" href="{{ route('admin.projects.index') }}">Torna alla lista dei progetti</a>
	</div>
@endsection
