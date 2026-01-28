<?php

namespace App\Http\Controllers\Admin;

use App\Exports\KaryawanExport;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Activitylog\Models\Activity;

class ExportController extends Controller
{
    public function exportUsers(Request $request, string $format)
    {
        $this->authorize('export data');

        $filters = $request->only(['search', 'role', 'status']);

        if ($format === 'excel') {
            return Excel::download(new UsersExport($filters), 'users-'.now()->format('Y-m-d').'.xlsx');
        }

        $users = User::query()->with('roles');

        if ($request->filled('search')) {
            $search = $request->search;
            $users->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->filled('role')) {
            $users->role($request->role);
        }

        if ($request->filled('status')) {
            $users->where('status', $request->status);
        }

        $users = $users->get();

        $pdf = Pdf::loadView('admin.exports.users-pdf', compact('users'));
        return $pdf->download('users-'.now()->format('Y-m-d').'.pdf');
    }

    public function exportKaryawan(Request $request, string $format)
    {
        $this->authorize('export data');

        $filters = $request->only(['search', 'jabatan', 'departemen', 'status']);

        if ($format === 'excel') {
            return Excel::download(new KaryawanExport($filters), 'karyawan-'.now()->format('Y-m-d').'.xlsx');
        }

        $karyawan = Karyawan::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $karyawan->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('nip', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->filled('jabatan')) {
            $karyawan->where('jabatan', $request->jabatan);
        }

        if ($request->filled('departemen')) {
            $karyawan->where('departemen', $request->departemen);
        }

        if ($request->filled('status')) {
            $karyawan->where('status', $request->status);
        }

        $karyawan = $karyawan->get();

        $pdf = Pdf::loadView('admin.exports.karyawan-pdf', compact('karyawan'));
        return $pdf->download('karyawan-'.now()->format('Y-m-d').'.pdf');
    }

    public function exportActivityLogs(Request $request, string $format)
    {
        $this->authorize('export data');

        $query = Activity::with('causer')->latest();

        if ($request->filled('user_id')) {
            $query->where('causer_id', $request->user_id);
        }

        if ($request->filled('subject_type')) {
            $query->where('subject_type', $request->subject_type);
        }

        if ($request->filled('event')) {
            $query->where('event', $request->event);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $logs = $query->get();

        if ($format === 'excel') {
            return Excel::download(new \App\Exports\ActivityLogExport($logs), 'activity-logs-'.now()->format('Y-m-d').'.xlsx');
        }

        $pdf = Pdf::loadView('admin.exports.activity-logs-pdf', compact('logs'));
        return $pdf->download('activity-logs-'.now()->format('Y-m-d').'.pdf');
    }
}
