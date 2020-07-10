<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisSurat extends Model
{
    use SoftDeletes;

    protected $fillable = ['jenis'];

    protected $dates = ['deleted_at'];

    protected $table = 'jenis_surat';

    protected $guarded = ['id','created_at','updated_at'];

    public function getDefaultValues(){
        return [
            'jenis' => '',
        ];
    }
}
