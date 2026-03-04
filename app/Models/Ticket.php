<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model{

    use HasFactory;
    
    protected $table = 'Tickets';

    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'Title',
        'Username',
        'Description',
        'Priority',
        'Status',
    ];

    public function assignedUsers(){
        return $this->belongsToMany(Users::class , 'Ticket_User_Assignment_Mapping' , 'Ticket_id' , 'Assigned_User_id')->using(TicketUserAssignmentMapping::class)->withPivot('Assigning_User_id');
    }

    // public function getUserNameAttribute()
    // {
    //     return $this->ticke->Tickets;
    // }
}
