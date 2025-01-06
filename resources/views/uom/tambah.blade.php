@include('include.head')
 
	<h3  class="mt-3">Tambah UOM</h3>
 
	<a href="/uom" class="btn btn-danger">< Kembali</a>
	
	<br/>
	<br/>
 
	<form action="/uom/store" method="post">
		{{ csrf_field() }}
		Nama <input type="text" name="name" required="required" class="form-control"> <br/>
		<input type="submit" value="Simpan Data" class="btn btn-success">
	</form>


@include('include.footer')