@extends('layouts.app')
@section('content')
	<div class="d-flex justify-content-center flex-wrap">
		@foreach ($projects as $project)
			<div class="card m-2 p-2 text-center" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">Progetto: {{ $project->name_project }}</h5>
					<p>Data pubblicazione: {{ $project->date }}</p>
					<a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-primary">more details</a>
					<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
						data-bs-target="#modal-{{ $project->id }}">
						<i class="fa-solid fa-trash-can"></i>
					</button>
					<!-- Modal Body -->
					<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
					<div class="modal fade" id="modal-{{ $project->id }}" tabindex="-1" data-bs-backdrop="static"
						data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{ $project->id }}" aria-hidden="true">
						<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="modalTitle-{{ $project->id }}">
										Delete current project
									</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									Deleting {{ $project->name_project }}
									⚠️ you cannot undo this operation
								</div>
								<div class="modal-footer justify-content-center">
									{{-- CREO FORM PER CANCELLARE UN FUMETTO DAL DATABASE GLI DO LA ROTTA DESTROY E IL METODO POST POI SOTTO LO CAMBIO NEL METODO DELETE --}}
									<form method="POST" action="{{ route('admin.projects.destroy', $project->id) }}">
										@csrf
										@method('DELETE')
										<button type="submit" href="" class="btn btn-outline-danger my-2" data-bs-dismiss="modal">
											<i class="fa-solid fa-trash-can"></i>
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endsection
