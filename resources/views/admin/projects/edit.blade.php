@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row mb-4">
			<div class="col-12">
				<h1>Modifica: {{ $project->name_project }}</h1>
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
				<form method="POST" action="{{ route('admin.projects.update', $project->id) }}" enctype="multipart/form-data">
					@method('PUT') {{-- v. slide da 32 a 35 --}}
					@csrf
					<div class="mb-3">
						<h3 class="form-label">Titolo</h3>
						<input type="text" class="form-control" name="name_project" required value="{{ $project->name_project }}">
						@error('name')
							<div>{{ $message }}</div>
						@enderror
					</div>
					<div class="mb-3">

						<label for="img" class="form-label">Immagine:</label>
						<input type="file" class="form-control" name="img" id="img" placeholder=""
							aria-describedby="imgHelper" style="width:70%" />
						<div id="imgHelper" class="form-text">Upload an image for the curret project</div>
						@error('img')
							<div class="form-text text-danger">{{ $message }}</div>
						@enderror

					</div>

					<div class="my-4">
						<label for="link">Link Github:</label>
						<input style="width: 20%" type="text" id="link" name="link" required value="{{ $project->link }}">
						@error('link')
							<div>{{ $message }}</div>
						@enderror
					</div>

					<div class="mb-3">
						<h3 class="form-label">Descrizione</h3>
						<textarea type="text" class="form-control" name="description" required>{{ $project->description }}</textarea>
					</div>

					<div class="mb-3">
						<h3 class="form-label">Data</h3>
						<input type="date" class="form-control" name="date" required value="{{ $project->date }}">
					</div>

					<div class="mb-3">
						@foreach ($languages as $language)
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="{{ $language->id }}" id="language" name="languages[]"
									@checked(in_array($language->id, old('languages', $projectLanguages)))>

								<label class="form-check-label" for="language">
									{{ $language->name }}
								</label>
							</div>
						@endforeach
						@error('languages')
							<div>{{ $message }}</div>
						@enderror
					</div>

					<div class="mb-3">
						<h3 class="form-label">Type</h3>
						<select name="type_id" id="">
							@foreach ($types as $tipo)
								{{-- @if ($tipo->id == $project->type->id)
									<option value="{{ $tipo->id }}" selected>{{ $tipo->name }}</option>
								@else
									<option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
								@endif --}}
								<option value="{{ $tipo->id }}" @selected(old('type_id', $project->type->id) == $tipo->id)>{{ $tipo->name }}</option>
							@endforeach
						</select>
						@error('img')
							<div class="form-text text-danger">The Link Preview field is required.</div>
						@enderror
					</div>

					<button type="submit" class="btn btn-primary">Submit</button>
				</form>

			</div>
		</div>
	</div>
@endsection
