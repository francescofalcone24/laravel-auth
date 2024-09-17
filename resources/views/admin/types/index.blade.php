@extends('layouts.admin')
@section('content')
	<div class="d-flex justify-content-center flex-wrap">
		@foreach ($tipi as $tipo)
			<div class="card m-2 text-center p-2" style="width: 20rem;">
				<div class="card-body">
					<h5 class="card-title"> {{ $tipo->name }}</h5>
					<div><i class="{{ $tipo->icon }}"></i></div>
				</div>
				<a class="btn btn-primary" href="{{ route('admin.types.show', $tipo->id) }}">More details</a>
			</div>
		@endforeach
	</div>
@endsection
