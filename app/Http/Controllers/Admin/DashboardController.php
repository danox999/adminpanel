<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalUsers = User::count();
        $totalKaryawan = Karyawan::count();
        $activeUsers = User::where('status', 'active')->count();
        $activeKaryawan = Karyawan::where('status', 'active')->count();

        return view('admin.dashboard', compact('totalUsers', 'totalKaryawan', 'activeUsers', 'activeKaryawan'));
    }
}
