@include('include.head')

		
	<h3 class="mt-3">Data UOM</h3>

	<a href="/uom/tambah" class="btn btn-primary"> + Tambah</a>
	
	<br/>
	<br/>
 
	<table class="table table-bordered">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Action</th>
		</tr>
		@foreach($uom as $p)
		<tr>
			<td>{{ $p->id }}</td>
			<td>{{ $p->name }}</td>
			<td>
				<a href="/uom/edit/{{ $p->id }}" class="btn btn-success">Edit</a>
				|
				<a href="/uom/hapus/{{ $p->id }}" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
		@endforeach
	</table>

@include('include.footer')