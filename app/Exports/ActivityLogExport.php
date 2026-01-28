<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ActivityLogExport implements FromCollection, WithHeadings, WithMapping
{
    protected $logs;

    public function __construct(Collection $logs)
    {
        $this->logs = $logs;
    }

    public function collection()
    {
        return $this->logs;
    }

    public function headings(): array
    {
        return [
            'ID',
            'User',
            'Action',
            'Model',
            'Description',
            'Timestamp',
        ];
    }

    public function map($log): array
    {
        return [
            $log->id,
            $log->causer ? $log->causer->name : 'System',
            ucfirst($log->event ?? 'N/A'),
            $log->subject_type ? class_basename($log->subject_type) : 'N/A',
            $log->description,
            $log->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
