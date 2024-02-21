<?php

namespace App\Http\Controllers;

use App\Models\CarWash;
use App\Models\Log;
use App\Models\Paket;
use App\Models\Produk;
use App\Models\User;
use App\Models\Voucher;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    function tambahPaket() {
        return view('admin.tambahPaket');
    }

    function postTambahPaket(Request $request)  {
        $request->validate([
            'paket' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
        ]);

        Produk::create([
            'paket' => $request->paket,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'user_id' => auth()->id(),
        ]);

        Log::create([
            'activity' => 'Admin Telah menambah ' . $request->paket. '!',
            'user_id' => auth()->id()
        ]);

        return redirect()->route('homeAdmin')->with('message', 'Paket berhasil di tambah');
    }

    function editPaket(Produk $produk) {
        return view('admin.editPaket', compact('produk'));
    }

    function postEditPaket(Request $request, Produk $produk) {
        $data = $request->validate([
            'paket' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required'
        ]);

        Log::create([
            'activity' => 'Admin Telah mengubah ' . $request->paket. '!',
            'user_id' => auth()->id()
        ]);
        $produk->update($data);
        return redirect()->route('homeAdmin')->with('message','Paket berhasil di ubah');
    }

    function hapusPaket(Produk $produk) {
        $produk->delete();
        Log::create([
            'user_id' => auth()->id(),
            'activity' => 'Admin Telang menghapus'. $produk->nama .'!',
        ]);
        return redirect()->route('homeAdmin')->with('message', 'Paket berhasil di hapus');
    }

    function tambahKasir() {
        $data = User::where('role', '!=', 'admin')->get();
        return view('admin.tambahKasir', compact('data'));
    }

    function postTambahUser(Request $request) {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $usernameTersedia = User::where('username', $request->username)->first();
        if($usernameTersedia){
            return redirect()->back()->with('message', 'username Sudah Tersedia');
        }

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        Log::create([
            'activity' => 'Admin Telah menambah' . $request->name . '!',
            'user_id' => auth()->id()
        ]);

        return redirect()->route('tambahKasir')->with('message' , 'Berhasil Tambah ' . $request->name . '!');
    }

    function editUser(User $user) {
        return view('admin.editKasir',compact('user'));
    }

    function postEditUser(Request $request, User $user) {
        $data = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
        ]);

        Log::create([
            'activity' => 'Admin Telah mengedit ' . $request->name . '!' ,
            'user_id' => auth()->id(),
        ]);
        $user->update($data);
        return redirect()->route('tambahKasir')->with('message', 'Berhasil mengedit ' . $request->name . '!');
    }

    function hapusUser(User $user) {
        $user->log()->delete();
        $user->delete();
        Log::create([
            'activity' => 'Admin telah menghapus ' . $user->name,
            'user_id' => auth()->id()
        ]);
        return redirect()->back()->with('message', 'Berhasil menghapus'. $user->nane .'!');
    }

    function tambahVoucher() {
        $voucher = Voucher::all();
        return view('admin.tambahVoucher', compact('voucher'));
    }

    function postTambahVoucher(Request $request) {
        $request->validate([
            'kode' => 'required',
            'diskon' => 'required',
            'kedaluwarsa' => 'required',
        ]);

        Voucher::create([
            'kode' => $request->kode,
            'diskon' => $request->diskon,
            'kedaluwarsa' => $request->kedaluwarsa,
        ]);

        Log::create([
            'activity' => 'Admin telah menambah voucher' . $request->kode . '!',
            'user_id' => auth()->id()
        ]);

        return redirect()->back()->with('message', 'Berhasil menambah voucher');
    }

    function editVoucher(Voucher $voucher) {
        return view('admin.editVoucher', compact('voucher'));
    }
    function postEditVoucher(Request $request, Voucher $voucher) {
        $data = $request->validate([
            'kode' => 'required',
            'diskon' => 'required',
            'kedaluwarsa' => 'required',
        ]);
        Log::create([
            'activity' => 'Admin Telah mengedit ' . $request->kode . '!' ,
            'user_id' => auth()->id(),
        ]);
        $voucher->update($data);
        // dd($voucher);
        return redirect()->route('tambahVoucher')->with('message', 'Berhasil mengedit ' . $request->name . '!');
    }    

    function hapusVoucher(Voucher $voucher) {
        $voucher->delete();
        Log::create([
            'activity' => 'Admin telah menghapus ' . $voucher->kode,
            'user_id' => auth()->id()
        ]);
        return redirect()->back()->with('message', 'Berhasil menghapus'. $voucher->nane .'!');
    }
}
