<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WebsiteContent extends Model
{
    use SoftDeletes;

    protected $fillable = [
                        'visi',
                        'misi',
                        'lokasiDesa',
                        'logoDesa',
                        'sliderPhoto',
                        'sliderTextH1',
                        'sliderTextH2',
                        'idUser',
                        ];
    protected $dates = ['deleted_at'];
    protected $table = 'website_contents';
    protected $guarded = ['id','created_at','updated_at','deleted_at'];

    public function getDefaultValues()
    {
        return [
            'visi' => '',
            'misi' => '',
            'lokasiDesa' => '',
            'logoDesa' => '',
            'sliderPhoto' => '',
            'sliderTextH1' => '',
            'sliderTextH2' => '',
        ];
    }
}
