<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class PendudukPindah extends Model
{
    protected $table = 'detail_pindah';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'NIK',
        'alasanPindah',
        'alamat',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'padaTanggal'
    ];

    protected $guarded = ['created_at', 'updated_at'];

    public function getDefaultValues()
    {
        return [
            'NIK' => '',
            'alasanPindah' => '',
            'alamat' => '',
            'desa' => '',
            'kecamatan' => '',
            'kabupaten' => '',
            'provinsi' => '',
            'padaTanggal' => ''
        ];
    }
}
