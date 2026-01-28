<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreKaryawanRequest;
use App\Http\Requests\Admin\UpdateKaryawanRequest;
use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view karyawan');

        $query = Karyawan::query()->with('user');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('nip', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filter by jabatan
        if ($request->filled('jabatan')) {
            $query->where('jabatan', $request->jabatan);
        }

        // Filter by departemen
        if ($request->filled('departemen')) {
            $query->where('departemen', $request->departemen);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $karyawan = $query->latest()->paginate(15)->withQueryString();
        
        $jabatans = Karyawan::distinct()->pluck('jabatan')->sort();
        $departemens = Karyawan::distinct()->pluck('departemen')->sort();

        return view('admin.karyawan.index', compact('karyawan', 'jabatans', 'departemens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $this->authorize('create karyawan');

        $users = User::all();

        return view('admin.karyawan.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKaryawanRequest $request): RedirectResponse
    {
        Karyawan::create($request->validated());

        return redirect()->route('admin.karyawan.index')
            ->with('success', 'Karyawan created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan): View
    {
        $this->authorize('edit karyawan');

        $users = User::all();

        return view('admin.karyawan.edit', compact('karyawan', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKaryawanRequest $request, Karyawan $karyawan): RedirectResponse
    {
        $karyawan->update($request->validated());

        return redirect()->route('admin.karyawan.index')
            ->with('success', 'Karyawan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan): RedirectResponse
    {
        $this->authorize('delete karyawan');

        $karyawan->delete();

        return redirect()->route('admin.karyawan.index')
            ->with('success', 'Karyawan deleted successfully.');
    }
}
