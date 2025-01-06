@include('include.head')

		
	<h3 class="mt-3">Data Item Category</h3>

	<a href="/item_category/tambah" class="btn btn-primary"> + Tambah</a>
	
	<br/>
	<br/>
 
	<table class="table table-bordered">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Action</th>
		</tr>
		@foreach($item_category as $p)
		<tr>
			<td>{{ $p->id }}</td>
			<td>{{ $p->name }}</td>
			<td>
				<a href="/item_category/edit/{{ $p->id }}" class="btn btn-success">Edit</a>
				|
				<a href="/item_category/hapus/{{ $p->id }}" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
		@endforeach
	</table>

@include('include.footer')