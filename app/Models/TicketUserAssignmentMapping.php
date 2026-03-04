<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TicketUserAssignmentMapping extends Pivot{
    
    protected $table = 'Ticket_User_Assignment_Mapping';

    protected $fillable = [
        'Ticket_id',
        'Assigning_User_id',
        'Assigned_User_id',
        'Seen',
    ];

    public $timestamps = false;

    public function assignedByName(){

        return "Assigned by ".$this->Assigning_User_id;

    }

}
