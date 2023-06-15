<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminUserController extends Controller
{
    public function index()
    {
        $title = 'Hapus User!';
        $text = "Apakah anda yakin untuk menghapus?";
        confirmDelete($title, $text);
        $users = User::has('profileUser')->get();
        return view('admin.user.index', compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        Alert::success('Berhasil', 'Menghapus user');
        return redirect()->route('admin.user.index');
    }
}
