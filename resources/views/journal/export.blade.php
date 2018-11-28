<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
	<table class="table">
	<thead class="thead-dark">
		<tr>									
			<th>User</th>
			<th>Title</th>
			<th>Description</th>
			<th>Created at</th>
		</tr>
	</thead>
	<tbody>
	
		<tr>
			<td>{{ $data->user->first_name }} {{ $data->user->last_name }}</td>
			<td>{{ $data->title}}</td>
			<td>{{ $data->description}}</td>
			<td>{{ $data->created_at}}</td>
		</tr>
	
	</tbody>
</table>
</body>
</html>

