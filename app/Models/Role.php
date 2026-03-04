<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;

class Role extends Model{
    
    use HasFactory;

    protected $table = 'Roles';

    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'Role',
    ];

    public function user()
    {
        return $this->belongsToMany(Users::class, 'User_Role_Mapping', 'User_id' , 'Role_id');
    }
}
