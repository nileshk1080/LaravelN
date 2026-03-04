<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use App\Models\Ticket;

class Users extends Authenticatable{
    use HasFactory;

    protected $table = 'Users';

    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;

    public function passwordRecord(){
        return $this->hasOne(Passwords::class , 'Username' , 'Username');
    }

    public function getAuthPassword(){
        return $this->passwordRecord->Password;
    }

    public function role(){
        return $this->belongsToMany(Role::class , 'User_Role_Mapping' , 'User_id' , 'Role_id');
    }

    public function tickets(){
        return $this->belongsToMany(Ticket::class , 'Ticket_User_Assignment_Mapping' , 'Assigned_User_id' , 'Ticket_id')->using(TicketUserAssignmentMapping::class)->withPivot('Assigning_User_id');
    }

    public function getRoleNameAttribute()
    {
        return $this->role->first()->Role;
    }

    public function getTicketNameAttribute()
    {
        return $this->ticket->Tickets;
    }

    protected $fillable = [
        'Username',
        'Age'
    ];
    
}
