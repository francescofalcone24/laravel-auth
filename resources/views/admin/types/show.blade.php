@extends('layouts.admin')
@section('content')
	<div class="d-flex justify-content-center mt-2">
		<div class="card text-center p-2" style="width: 25rem;">
			{{-- <img src="..." class="card-img-top" alt="..."> --}}
			<div class=""><i class="{{ $type->icon }} card-img-top fs-1"></i></div>

			<div class="card-body">
				<h5 class="card-title">{{ $type->name }}</h5>
				<p class="card-text">{{ $type->description }}.</p>
				<a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-primary">Edit</a>
				<form action="{{ route('admin.types.destroy', $type->id) }}" method="POST">
					@method('DELETE')
					@csrf
					<button type="submit" class="btn btn-danger mt-1">Destroy</button>
				</form>
			</div>
		</div>
	</div>
@endsection
