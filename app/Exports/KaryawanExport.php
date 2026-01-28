<?php

namespace App\Exports;

use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KaryawanExport implements FromCollection, WithHeadings, WithMapping
{
    protected $filters;

    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = Karyawan::query();

        if (isset($this->filters['search'])) {
            $search = $this->filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('nip', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if (isset($this->filters['jabatan'])) {
            $query->where('jabatan', $this->filters['jabatan']);
        }

        if (isset($this->filters['departemen'])) {
            $query->where('departemen', $this->filters['departemen']);
        }

        if (isset($this->filters['status'])) {
            $query->where('status', $this->filters['status']);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'NIP',
            'Email',
            'Phone',
            'Jabatan',
            'Departemen',
            'Tanggal Masuk',
            'Status',
            'Created At',
        ];
    }

    public function map($karyawan): array
    {
        return [
            $karyawan->id,
            $karyawan->nama,
            $karyawan->nip,
            $karyawan->email,
            $karyawan->phone ?? '-',
            $karyawan->jabatan,
            $karyawan->departemen,
            $karyawan->tanggal_masuk->format('Y-m-d'),
            ucfirst($karyawan->status),
            $karyawan->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
