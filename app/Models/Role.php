<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 't_roles';

    public $fillable = ['rolename','guard_name','description'];

    protected $guarded=[];

    public function menus(){
        return $this
            ->belongsToMany(Menu::class, 't_roles_menus','menu_id', 'role_id');
            //->belongsToMany('App\Models\Menu', 't_menu_role', 'menu_id', 'role_id');
    }

    public function users(){
        return $this
            ->belongsToMany(User::class)->get();
            //->belongsToMany('App\Models\Menu', 't_menu_role', 'menu_id', 'role_id');
    }

}
