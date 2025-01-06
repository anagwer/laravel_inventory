@include('include.head')

		
	<h3 class="mt-3">Data Inbound</h3>

	<a href="/inventory/tambah" class="btn btn-primary"> + Tambah</a>
	
	<br/>
	<br/>
	@if (session('success1'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success1') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
	@endif

	@if (session('error1'))
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			{{ session('error1') }}
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	@endif
	<table class="table table-bordered datatable">
    <thead>
		<tr>
			<th>ID</th>
			<th>item</th>
			<th>doc_code</th>
			<th>item_category</th>
			<th>status</th>
			<th>qty</th>
			<th>uom</th>
			<th>status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($inbound as $p)
		<tr>
			<td>{{ $p->id }}</td>
			<td>{{ $p->nama_item }}</td>
			<td>{{ $p->doc_code }}</td>
			<td>{{ $p->doc_date }}</td>
			<td>{{ $p->note }}</td>
			<td>{{ $p->qty }}</td>
			<td>{{ $p->nama_uom }}</td>
			<td>{{ $p->status }}</td>
			<td><?php if($p->status!='Posting'){?>
				<a href="/inventory/editinbound/{{ $p->id }}" class="btn btn-success">Edit</a>
				
				|<a href="/inventory/postinginbound/{{ $p->id }}/{{ $p->item_id }}/{{ $p->qty }}" class="btn btn-warning">Posting</a>
				|
				<a href="/inventory/hapusinbound/{{ $p->id }}" class="btn btn-danger">Hapus</a>
				<?php }else{
					echo '-';
				} ?>
			</td>
		</tr>
		@endforeach
		</tbody>
	</table>
<hR>
	<h3 class="mt-3">Data Outbound</h3>
 
	@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
	@endif

	@if (session('error'))
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			{{ session('error') }}
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	@endif
	<table class="table table-bordered datatable">
    <thead>
		<tr>
			<th>ID</th>
			<th>item</th>
			<th>doc_code</th>
			<th>item_category</th>
			<th>status</th>
			<th>qty</th>
			<th>uom</th>
			<th>status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($outbound as $p)
		<tr>
			<td>{{ $p->id }}</td>
			<td>{{ $p->nama_item }}</td>
			<td>{{ $p->doc_code }}</td>
			<td>{{ $p->doc_date }}</td>
			<td>{{ $p->note }}</td>
			<td>{{ $p->qty }}</td>
			<td>{{ $p->nama_uom }}</td>
			<td>{{ $p->status }}</td>
			<td><?php if($p->status!='Posting'){?>
				<a href="/inventory/editoutbound/{{ $p->id }}" class="btn btn-success">Edit</a>
				
				|<a href="/inventory/postingoutbound/{{ $p->id }}/{{ $p->item_id }}/{{ $p->qty }}" class="btn btn-warning">Posting</a>
				|
				<a href="/inventory/hapusoutbound/{{ $p->id }}" class="btn btn-danger">Hapus</a>
				<?php }else{
					echo '-';
				} ?>
			</td>
		</tr>
		@endforeach
		</tbody>
	</table>
@include('include.footer')