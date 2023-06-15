<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminMitraController extends Controller
{
    public function index()
    {
        $title = 'Hapus Mitra!';
        $text = "Apakah anda yakin untuk menghapus?";
        confirmDelete($title, $text);
        $mitras = User::has('profileMitra')->get();
        return view('admin.mitra.index', compact('mitras'));
    }

    public function destroy(User $mitra)
    {
        $mitra->delete();
        Alert::success('Berhasil', 'Menghapus mitra');
        return redirect()->route('admin.mitra.index');
    }
}
