<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
 
class ItemController extends Controller
{
    public function index()
    {
    	// mengambil data dari table item
    	$item = DB::table('item')
        ->join('item_category', 'item.item_category_id', '=', 'item_category.id')
        ->select('item.*', 'item_category.name as nama')
        ->get();

 
    	// mengirim data item ke view index
    	return view('item/index',['item' => $item]);
 
    }
    // method untuk menampilkan view form tambah item
    public function tambah()
    {

        $item_category = DB::table('item_category')->get();
        // memanggil view tambah
        return view('item/tambah',['item_category' => $item_category]);
    
    }
    // method untuk insert data ke table item
    public function store(Request $request)
    {
        $sku = 'KD'.date('dmY');
        $qty = '0';
        // insert data ke table item
        DB::table('item')->insert([
            'sku' => $request->sku,
            'name' => $request->name,
            'item_category_id' => $request->item_category_id,
            'status' => $request->status,
            'qty' => $qty
        ]);
        // alihkan halaman ke halaman item
        return redirect('/item');
    
    }
    // method untuk edit data item
    public function edit($id)
    {
        // mengambil data item berdasarkan id yang dipilih
        $item = DB::table('item')->where('id',$id)->get();
        $item_category = DB::table('item_category')->get();
        // passing data item yang didapat ke view edit.blade.php
        return view('item/edit',['item' => $item,'item_category' => $item_category]);
    
    }
    // update data item
    public function update(Request $request)
    {
        // update data item
        $qty = '0';
        
        DB::table('item')->where('id',$request->id)->update([
            'sku' => $request->sku,
            'name' => $request->name,
            'item_category_id' => $request->item_category_id,
            'status' => $request->status,
            'qty' => $qty
        ]);
        // alihkan halaman ke halaman item
        return redirect('/item');
    }
    // method untuk hapus data item
    public function hapus($id)
    {
        // menghapus data item berdasarkan id yang dipilih
        DB::table('item')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman item
        return redirect('/item');
    }
}