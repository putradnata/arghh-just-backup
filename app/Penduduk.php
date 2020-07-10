<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Penduduk extends Model
{
    use SoftDeletes;

    protected $table = 'penduduk';
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'NIK';

    protected $fillable = [
        'NIK',
        'noKK',
        'nama',
        'jenisKelamin',
        'statusPerkawinan',
        'tempatLahir',
        'tanggalLahir',
        'kedudukanKeluarga',
        'agama',
        'pendidikanTerakhir',
        'pekerjaan',
        'alamatLengkap',
        'idBanjar',
        'statusPenduduk',
        'namaAyah',
        'namaIbu',
        'rumahTanggaMiskin',
        'kebutuhanKhusus'
    ];

    protected $guarded = ['created_at', 'updated_at'];

    public function getDefaultValues()
    {
        return [
            'NIK' => '',
            'noKK' => '',
            'nama' => '',
            'jenisKelamin' => '',
            'statusPerkawinan' => '',
            'tempatLahir' => '',
            'tanggalLahir' => '',
            'kedudukanKeluarga' => '',
            'agama' => '',
            'pendidikanTerakhir' => '',
            'pekerjaan' => '',
            'alamatLengkap' => '',
            'idBanjar' => '',
            'statusPenduduk' => '',
            'namaAyah' => '',
            'namaIbu' => '',
            'rumahTanggaMiskin' => '',
            'kebutuhanKhusus' => ''
        ];
    }
}
