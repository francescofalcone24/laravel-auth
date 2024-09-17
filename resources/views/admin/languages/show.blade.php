@extends('layouts.admin')
@section('content')
	<div class="d-flex justify-content-center mt-2">
		<div class="card text-center p-2" style="width: 25rem;">
			{{-- <img src="..." class="card-img-top" alt="..."> --}}
			<div class=""><i class="{{ $language->icon }} card-img-top fs-1"></i></div>

			<div class="card-body">
				<h5 class="card-title">{{ $language->name }}</h5>
				<a href="{{ route('admin.languages.edit', $language->id) }}" class="btn btn-primary">Edit</a>
				<form action="{{ route('admin.languages.destroy', $language->id) }}" method="POST">
					@method('DELETE')
					@csrf
					<button type="submit" class="btn btn-danger mt-1">Destroy</button>
				</form>
			</div>
		</div>
	</div>
@endsection
