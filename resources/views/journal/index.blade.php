@extends('layouts.app')

@section('content')
	<div class="container">
		@if (session('message'))
			<div class="alert alert-{{ session('level') }}" role="alert">
				<strong>{{session('message')}}</strong>
			</div>
		@endif
		<div class="d-flex justify-content-center">
			<div class="col-md-12">
				<h1>List journal</h1>
				<div class="card">
					<div class="card-header">List journal</div>
					<div class="card-body">
						<div class="d-flex flex-row">
							<a href="{{ route('journal.create')}}" class="btn btn-primary my-1">Create journal</a>
						
							<a href="{{ route('album.create')}}" class="btn btn-primary my-1 ml-auto">Create album</a>
						</div>
						<table class="table">
							<thead class="thead-dark">
								<tr>									
									<th>User</th>
									<th>Title</th>
									<th>Description</th>
									<th>Created at</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($journals as $journal)
									
								<tr>
									<td>{{ $journal->user->first_name }} {{ $journal->user->last_name }}</td>
									<td>{{ $journal->title}}</td>
									<td>{{ $journal->description}}</td>
									<td>{{ $journal->created_at}}</td>
									<td>
										<div class="d-flex">
											<a href="{{ route('journal.show', $journal->id) }}" class="btn btn-primary mr-1">View</a>

											@if(Auth::user()->id == $journal->user_id)
												<a href="{{ route('journal.edit', $journal->id) }}" class="btn btn-success mr-1">Edit</a>
												<form action="{{route('journal.delete', $journal->id)}}" method="post">
													{{ csrf_field() }}
													@method('delete')
													<button type="submit" class="btn btn-danger mr-1">Delete</button>
												</form>
											@endif
										</div>
									</td>
								</tr>
									
								@endforeach
							</tbody>
						</table>
						<div class="d-flex flex-row-reverse">
							{{ $journals->links()}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection