<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;
    protected $fillable = ['menu_id', 'role_access_id'];
    protected $guarded = [];

    public function role()
    {
        return $this->belongsTo(RoleAccess::class, 'role_access_id', 'id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
}
