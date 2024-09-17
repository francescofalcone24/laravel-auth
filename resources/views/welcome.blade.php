@extends('layouts.app')
@section('content')
	<div class="d-flex justify-content-center flex-wrap">
		@foreach ($projects as $project)
			<div class="card m-2 p-2" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">Progetto: {{ $project->name_project }}</h5>
					<p>Data pubblicazione: {{ $project->date }}</p>
					</form>
				</div>
			</div>
		@endforeach
	</div>
@endsection
