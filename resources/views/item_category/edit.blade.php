@include('include.head')
 
	<h3>Edit</h3>
 
	<a href="/item_category" class="btn btn-danger">< Kembali</a>
	
	<br/>
	<br/>
 
	@foreach($item_category as $p)
	<form action="/item_category/update" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $p->id }}"> <br/>
		Nama <input type="text" required="required" name="name" value="{{ $p->name }}" class="form-control"> <br/>
		<input type="submit" value="Simpan Data" class="btn btn-success">
	</form>
	@endforeach
		

  @include('include.footer')