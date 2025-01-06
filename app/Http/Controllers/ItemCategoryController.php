<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
 
class ItemCategoryController extends Controller
{
    public function index()
    {
    	// mengambil data dari table item_category
    	$item_category = DB::table('item_category')->get();
 
    	// mengirim data item_category ke view index
    	return view('item_category/index',['item_category' => $item_category]);
 
    }
    // method untuk menampilkan view form tambah item_category
    public function tambah()
    {
    
        // memanggil view tambah
        return view('item_category/tambah');
    
    }
    // method untuk insert data ke table item_category
    public function store(Request $request)
    {
        // insert data ke table item_category
        DB::table('item_category')->insert([
            'name' => $request->name
        ]);
        // alihkan halaman ke halaman item_category
        return redirect('/item_category');
    
    }
    // method untuk edit data item_category
    public function edit($id)
    {
        // mengambil data item_category berdasarkan id yang dipilih
        $item_category = DB::table('item_category')->where('id',$id)->get();
        // passing data item_category yang didapat ke view edit.blade.php
        return view('item_category/edit',['item_category' => $item_category]);
    
    }
    // update data item_category
    public function update(Request $request)
    {
        // update data item_category
        DB::table('item_category')->where('id',$request->id)->update([
            'name' => $request->name
        ]);
        // alihkan halaman ke halaman item_category
        return redirect('/item_category');
    }
    // method untuk hapus data item_category
    public function hapus($id)
    {
        // menghapus data item_category berdasarkan id yang dipilih
        DB::table('item_category')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman item_category
        return redirect('/item_category');
    }
}