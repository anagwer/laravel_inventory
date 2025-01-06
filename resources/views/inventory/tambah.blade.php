@include('include.head')
 
	<h3  class="mt-3">Tambah Proses Inventory</h3>
 
	<a href="/inventory" class="btn btn-danger">< Kembali</a>
	
	<br/>
	<br/>
 
	<form action="/inventory/store" method="post">
		{{ csrf_field() }}
		Pilih Proses <select name="proses" id="proses" class="form-select">
				<option selected disabled value>-- Pilih proses --</option>
				<option>Inbound</option>
				<option>Outbond</option>
				</select>
		Pilih Item <select name="item_id" id="item_id" class="form-select">
				<option selected disabled value>-- Pilih item --</option>
				@foreach($item as $p)
					<option value="{{ $p->id }}">{{ $p->id }} | {{ $p->name }} | {{ $p->qty }}</option>
					@endforeach
			</select>
		doc_code <input type="text" name="doc_code" required="required" class="form-control" value="DOC<?php echo date('his');?>" readonly> 
		doc_date <input type="date" name="doc_date" required="required" class="form-control"> 
		note <textarea name="note" class="form-control" ></textarea>
		qty <input type="number" name="qty" required="required" class="form-control"> 
		Pilih UOM <select name="uom_id" id="uom_id" class="form-select">
				<option selected disabled value>-- Pilih UOM --</option>
					@foreach($uom as $p)
					<option value="{{ $p->id }}">{{ $p->name }}</option>
					@endforeach
				</select><br>

		<input type="submit" value="Simpan Data" class="btn btn-success">
	</form>


@include('include.footer')