<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
 
class UomController extends Controller
{
    public function index()
    {
    	// mengambil data dari table uom
    	$uom = DB::table('uom')->get();
 
    	// mengirim data uom ke view index
    	return view('uom/index',['uom' => $uom]);
 
    }
    // method untuk menampilkan view form tambah uom
    public function tambah()
    {
    
        // memanggil view tambah
        return view('uom/tambah');
    
    }
    // method untuk insert data ke table uom
    public function store(Request $request)
    {
        // insert data ke table uom
        DB::table('uom')->insert([
            'name' => $request->name
        ]);
        // alihkan halaman ke halaman uom
        return redirect('/uom');
    
    }
    // method untuk edit data uom
    public function edit($id)
    {
        // mengambil data uom berdasarkan id yang dipilih
        $uom = DB::table('uom')->where('id',$id)->get();
        // passing data uom yang didapat ke view edit.blade.php
        return view('uom/edit',['uom' => $uom]);
    
    }
    // update data uom
    public function update(Request $request)
    {
        // update data uom
        DB::table('uom')->where('id',$request->id)->update([
            'name' => $request->name
        ]);
        // alihkan halaman ke halaman uom
        return redirect('/uom');
    }
    // method untuk hapus data uom
    public function hapus($id)
    {
        // menghapus data uom berdasarkan id yang dipilih
        DB::table('uom')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman uom
        return redirect('/uom');
    }
}