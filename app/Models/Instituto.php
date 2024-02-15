<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituto extends Model
{
    use HasFactory;

    protected $table = 't_institutos';
    //
    //protected $appends = ['age'];
    protected $fillable = [
        'cod_mod',
        'instituto',
        'es_licenciado',
        'rm_licenciamiento',
        'es_idex',
        'codgeo',
        'd_dpto',
        'd_prov',
        'd_dist',
        'created_by',
        'updated_by'
    ];

    protected $guarded=[];

    public function region(){
        return $this->belongsTo(Region::class);
    }
}
