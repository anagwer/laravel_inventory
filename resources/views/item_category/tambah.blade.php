@include('include.head')
 
	<h3  class="mt-3">Tambah Item Category</h3>
 
	<a href="/item_category" class="btn btn-danger">< Kembali</a>
	
	<br/>
	<br/>
 
	<form action="/item_category/store" method="post">
		{{ csrf_field() }}
		Nama <input type="text" name="name" required="required" class="form-control"> <br/>
		<input type="submit" value="Simpan Data" class="btn btn-success">
	</form>


@include('include.footer')