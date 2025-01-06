@include('include.head')

		
	<h3 class="mt-3">Data Item</h3>

	<a href="/item/tambah" class="btn btn-primary"> + Tambah</a>
	
	<br/>
	<br/>
 
	<table class="table table-bordered datatable">
    <thead>
        <tr>
            <th>ID</th>
            <th>SKU</th>
            <th>Name</th>
            <th>Item Category</th>
            <th>Status</th>
            <th>Qty</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($item as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->sku }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->status }}</td>
            <td>{{ $p->qty }}</td>
            <td>
                <a href="/item/edit/{{ $p->id }}" class="btn btn-success">Edit</a> |
                <a href="/item/hapus/{{ $p->id }}" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@include('include.footer')