<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
 
class InventoryController extends Controller
{
    public function index()
    {
        // Mengambil data dari tabel inbound
        $inbound = DB::table('inbound')
            ->join('item', 'inbound.item_id', '=', 'item.id') // Gabungkan dengan tabel item
            ->join('uom', 'inbound.uom_id', '=', 'uom.id')    // Gabungkan dengan tabel uom
            ->select('inbound.*', 'item.name as nama_item', 'uom.name as nama_uom') // Pilih kolom yang diperlukan
            ->get();

        // Mengambil data dari tabel outbound
        $outbound = DB::table('outbound')
            ->join('item', 'outbound.item_id', '=', 'item.id') // Gabungkan dengan tabel item
            ->join('uom', 'outbound.uom_id', '=', 'uom.id')    // Gabungkan dengan tabel uom
            ->select('outbound.*', 'item.name as nama_item', 'uom.name as nama_uom') // Pilih kolom yang diperlukan
            ->get();

        // Mengirim data inbound dan outbound ke view index
        return view('inventory/index', ['inbound' => $inbound, 'outbound' => $outbound]);
    }

    // method untuk menampilkan view form tambah inbound
    public function tambah()
    {

        $item = DB::table('item')->get();
        $uom = DB::table('uom')->get();
        // memanggil view tambah
        return view('inventory/tambah',['item' => $item, 'uom' => $uom]);
    
    }
    // method untuk insert data ke table inbound
    public function store(Request $request)
    {
        $proses = $request->proses;
        $status = "Belum Posting";

        if($proses=="Inbound"){
            // insert data ke table inbound
            DB::table('inbound')->insert([
                'item_id' => $request->item_id,
                'doc_code' => $request->doc_code,
                'doc_date' => $request->doc_date,
                'note' => $request->note,
                'qty' => $request->qty,
                'uom_id' => $request->uom_id,
                'status' => $status
            ]);
        }else{
            // insert data ke table inbound
            DB::table('outbound')->insert([
                'item_id' => $request->item_id,
                'doc_code' => $request->doc_code,
                'doc_date' => $request->doc_date,
                'note' => $request->note,
                'qty' => $request->qty,
                'uom_id' => $request->uom_id,
                'status' => $status
            ]);
        }
        // alihkan halaman ke halaman inbound
        return redirect('/inventory');
    
    }

    // method untuk edit data inbound
    public function editinbound($id)
    {
        // mengambil data inbound berdasarkan id yang dipilih
        $bound = DB::table('inbound')
            ->join('item', 'inbound.item_id', '=', 'item.id') // Gabungkan dengan tabel item
            ->join('uom', 'inbound.uom_id', '=', 'uom.id')    // Gabungkan dengan tabel uom
            ->select('inbound.*', 'item.name as nama_item', 'uom.name as nama_uom') // Pilih kolom yang diperlukan
            ->where('inbound.id',$id)->get();
        $item = DB::table('item')->get();
        $uom = DB::table('uom')->get();
        // passing data inbound yang didapat ke view edit.blade.php
        return view('inventory/edit',['bound' => $bound,'item' => $item, 'uom' => $uom]);
    
    }
    // method untuk edit data outbound
    public function editoutbound($id)
    {
        // mengambil data inbound berdasarkan id yang dipilih
        $bound = DB::table('outbound')
            ->join('item', 'outbound.item_id', '=', 'item.id') // Gabungkan dengan tabel item
            ->join('uom', 'outbound.uom_id', '=', 'uom.id')    // Gabungkan dengan tabel uom
            ->select('outbound.*', 'item.name as nama_item', 'uom.name as nama_uom') // Pilih kolom yang diperlukan
            ->where('outbound.id',$id)->get();
        $item = DB::table('item')->get();
        $uom = DB::table('uom')->get();
        // passing data inbound yang didapat ke view edit.blade.php
        return view('inventory/edit',['bound' => $bound,'item' => $item, 'uom' => $uom]);
    
    }
    // update data inbound
    public function update(Request $request)
    {
        $routeName = $request->routeName;

        if($routeName=='editinbound'){
        DB::table('inbound')->where('id',$request->id)->update([
            'item_id' => $request->item_id,
            'doc_code' => $request->doc_code,
            'doc_date' => $request->doc_date,
            'note' => $request->note,
            'qty' => $request->qty,
            'uom_id' => $request->uom_id
        ]);
        $message="inbound berhasil terupdate";
        
        // alihkan halaman ke halaman inbound
        return redirect('/inventory')->with('success1', $message);
        }else{
            DB::table('outbound')->where('id',$request->id)->update([
                'item_id' => $request->item_id,
                'doc_code' => $request->doc_code,
                'doc_date' => $request->doc_date,
                'note' => $request->note,
                'qty' => $request->qty,
                'uom_id' => $request->uom_id
            ]);
            $message="outbound berhasil terupdate";
            
        // alihkan halaman ke halaman inbound
        return redirect('/inventory')->with('success', $message);
        }
    }

    // method untuk posting data inbound
    public function postinginbound($id, $item_id, $qty)
    {
        // Ambil qty saat ini dari tabel item
        $item = DB::table('item')->where('id', $item_id)->first();

        // Pastikan item ditemukan
        if (!$item) {
            return redirect('/inventory')->with('error1', 'Item tidak ditemukan.');
        }

        // Tambahkan qty inbound ke qty item
        $newQty = $item->qty + $qty;
        $status = "Posting";

        // Update qty di tabel item
        DB::table('item')->where('id', $item_id)->update([
            'qty' => $newQty
        ]);

        // Update status di tabel inbound
        DB::table('inbound')->where('id', $id)->update([
            'status' => $status
        ]);

        // Flash message untuk alert
        return redirect('/inventory')->with('success1', 'Inbound berhasil terposting.');
    }

    public function postingoutbound($id, $item_id, $qty)
    {
        // Ambil qty saat ini dari tabel item
        $item = DB::table('item')->where('id', $item_id)->first();

        // Pastikan item ditemukan
        if (!$item) {
            return redirect('/inventory')->with('error', 'Item tidak ditemukan.');
        }

        // Hitung qty baru setelah outbound
        $newQty = $item->qty - $qty;

        // Jika stok mencukupi
        if ($newQty >= 0) {
            // Update qty di tabel item
            DB::table('item')->where('id', $item_id)->update([
                'qty' => $newQty
            ]);

            // Update status di tabel outbound
            DB::table('outbound')->where('id', $id)->update([
                'status' => 'Posting'
            ]);

            // Flash message untuk alert sukses
            return redirect('/inventory')->with('success', 'Outbound berhasil terposting.');
        } else {
            // Flash message untuk alert error
            return redirect('/inventory')->with('error', 'Stok kurang, tidak dapat memproses outbound.');
        }
    }



    // method untuk hapus data inbound
    public function hapusinbound($id)
    {
        // menghapus data inbound berdasarkan id yang dipilih
        DB::table('inbound')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman inbound
        return redirect('/inventory');
    }
    // method untuk hapus data outbound
    public function hapusoutbound($id)
    {
        // menghapus data inbound berdasarkan id yang dipilih
        DB::table('outbound')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman outbound
        return redirect('/inventory');
    }
}