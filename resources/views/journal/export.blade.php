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
		@foreach ($data as $journal)
		<tr>
			<td>{{ $journal->user->first_name }} {{ $journal->user->last_name }}</td>
			<td>{{ $journal->title}}</td>
			<td>{{ $journal->description}}</td>
			<td>{{ $journal->created_at}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
