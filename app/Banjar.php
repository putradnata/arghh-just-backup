<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banjar extends Model
{
    use SoftDeletes;

    protected $fillable = ['nama','alamat'];
    protected $dates = ['deleted_at'];
    protected $table = 'banjar';
    protected $guarded = ['id','created_at','updated_at','deleted_at'];

    public function getDefaultValues()
    {
        return [
            'nama' => '',
            'alamat' => '',
            'keterangan' => '',
            'kelian' => '',
            'noTelp' => '',
        ];
    }

}
