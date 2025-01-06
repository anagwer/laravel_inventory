@include('include.head')
 
	<h3 class="mt-3">Edit</h3>
 
	<a href="/inventory" class="btn btn-danger">< Kembali</a>
	
	<br/>
	<br/>
 
	@foreach($bound as $p)
	<form action="/inventory/update" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $p->id }}"> <br/>
		Pilih Item <select name="item_id" id="item_id" class="form-select">
				<option value="{{ $p->item_id }}">{{ $p->item_id }} | {{ $p->nama_item }}</option>
				@foreach($item as $i)
					<option value="{{ $i->id }}">{{ $i->id }} | {{ $i->name }} | {{ $i->qty }}</option>
					@endforeach
			</select>
			<?php // Ambil nama route dari segmen URL
			$routeName = request()->segment(2);?>
		<input type="hidden" name="routeName" value="<?php echo $routeName; ?>"readonly> 
		doc_code <input type="text" name="doc_code" value="{{ $p->doc_code }}" required="required" class="form-control" value="DOC<?php echo date('his');?>" readonly> 
		doc_date <input type="date" name="doc_date" required="required" value="{{ $p->doc_date }}" class="form-control"> 
		note <textarea name="note" class="form-control" >{{ $p->note }}</textarea>
		qty <input type="number" name="qty" required="required"  value="{{ $p->qty }}" class="form-control"> 
		Pilih UOM <select name="uom_id" id="uom_id" class="form-select">
				<option value="{{ $p->uom_id }}">{{ $p->nama_uom }}</option>
					@foreach($uom as $m)
					<option value="{{ $m->id }}">{{ $m->name }}</option>
					@endforeach
				</select><br>

		<input type="submit" value="Simpan Data" class="btn btn-success">
	</form>
	@endforeach
		

  @include('include.footer')