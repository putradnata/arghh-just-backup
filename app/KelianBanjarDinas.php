<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KelianBanjarDinas extends Model
{
    use SoftDeletes;

    protected $table = 'kelian_banjar_dinas';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'NIK',
        'noTelp',
        'mulaiMenjabat',
        'selesaiMenjabat',
    ];

    protected $guarded = ['created_at','updated_at','deleted_at'];
}
