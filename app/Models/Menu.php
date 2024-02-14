<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 't_menus';

    public $fillable = ['menu','controller','slug'];

    protected $guarded=[];

    public function roles(){
        return $this
            ->belongsToMany(Role::class, 't_roles_menus');
            //->belongsToMany('App\Models\Menu', 't_menu_role', 'menu_id', 'role_id');
    }
}
