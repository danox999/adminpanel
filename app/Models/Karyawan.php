<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Karyawan extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'karyawan';

    protected $fillable = [
        'nama',
        'nip',
        'email',
        'phone',
        'jabatan',
        'departemen',
        'tanggal_masuk',
        'status',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_masuk' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nama', 'nip', 'email', 'phone', 'jabatan', 'departemen', 'tanggal_masuk', 'status', 'user_id'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
}
