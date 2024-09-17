@extends('layouts.admin')
@section('content')
	<div class="d-flex justify-content-center flex-wrap">
		@foreach ($languages as $language)
			<div class="card m-2 text-center p-2" style="width: 20rem;">
				<div class="card-body">
					<h5 class="card-title"> {{ $language->name }}</h5>
					<div><i class="{{ $language->icon }}"></i></div>
				</div>
				<a class="btn btn-primary" href="{{ route('admin.languages.show', $language->id) }}">More details</a>
			</div>
		@endforeach
	</div>
@endsection
