@include('include.head')
 
	<h3 class="mt-3">Edit</h3>
 
	<a href="/item" class="btn btn-danger">< Kembali</a>
	
	<br/>
	<br/>
 
	@foreach($item as $p)
	<form action="/item/update" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $p->id }}"> <br/>
		SKU <input type="text" name="sku" required="required" class="form-control" value="{{ $p->sku }}" readonly> 
		Nama <input type="text" name="name" required="required" class="form-control" value="{{ $p->name }}">
		Pilih Item Category <select name="item_category_id" id="item_category_id" class="form-select">
				<option value="{{ $p->id }}">{{ $p->id }}</option>
				@foreach($item_category as $a)
					<option value="{{ $a->id }}">{{ $a->id }} | {{ $a->name }}</option>
					@endforeach
			</select>
		Status <select name="status" id="status" class="form-select">
			<option value="{{ $p->status }}">{{ $p->status }}</option>
				<option>Tersedia</option>
				<option>Kosong</option>
				</select>
		<input type="submit" value="Simpan Data" class="btn btn-success">
	</form>
	@endforeach
		

  @include('include.footer')