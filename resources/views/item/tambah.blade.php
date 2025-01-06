@include('include.head')
 
	<h3  class="mt-3">Tambah</h3>
 
	<a href="/item" class="btn btn-danger">< Kembali</a>
	
	<br/>
	<br/>
 
	<form action="/item/store" method="post">
		{{ csrf_field() }}
		SKU <input type="text" name="sku" required="required" class="form-control" value="KD<?php echo date('Ymd');?>" readonly> 
		Nama <input type="text" name="name" required="required" class="form-control">
		Pilih Item Category <select name="item_category_id" id="item_category_id" class="form-select">
				<option selected disabled value>-- Pilih item_category --</option>
				@foreach($item_category as $p)
					<option value="{{ $p->id }}">{{ $p->id }} | {{ $p->name }}</option>
					@endforeach
			</select>
		Status <select name="status" id="status" class="form-select">
				<option selected disabled value>-- Pilih status --</option>
				<option>Tersedia</option>
				<option>Kosong</option>
				</select>
		<input type="submit" value="Simpan Data" class="btn btn-success">
	</form>


@include('include.footer')