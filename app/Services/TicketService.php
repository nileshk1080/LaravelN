<?php

namespace App\Services;
use App\Models\Ticket;
use App\Models\Users;
use App\Models\TicketUserAssignmentMapping;
use Illuminate\Support\Facades\DB;

class TicketService{
    
    public function getAllTickets(string $username , string $role){

        $tickets;
        if($role == 'Admin'){
            $tickets = Ticket::all();
        }else{
            $tickets = Ticket::where('Username' , $username)->get();
        }
        return $tickets;
    }

    public function addTicket(array $ticketdata){

        $ticketb = Ticket::create($ticketdata);
     
        if(isset($ticketb)){
            return true;
        }else{
            return false;
        }
    }

    public function getTicket(int $id){

        $ticket = Ticket::where('id' , $id)->get();
        return $ticket;
    }

    public function deleteTicket(int $id){

        $ticketstatus = Ticket::destroy($id);
    
        if($ticketstatus == 1){
            return true;
        }else{
            return false;
        }
    }

    public function editTicket(array $ticketdata){

        $ticket = Ticket::find($ticketdata['id']);

        $ticket->Title = $ticketdata['Title'];
        $ticket->Description = $ticketdata['Description'];
        $ticket->Priority = $ticketdata['Priority'];
        $ticket->Comments = $ticketdata['Comments'];

        $ticket->save();
        return true;

    }

    public function completeTicket(int $id){
 
        $ticket = Ticket::find($id);
        $ticket->Status = 'Complete';
        $ticket->save();
        return true;
    }

    // public function assignTicket(int $id ,string $assigningUserId, $assignToId){

    //     if($assignToId == null){return true;}
    //     $mapping = DB::table('Ticket_User_Assignment_Mapping')->select('Ticket_id')->where('Ticket_id',$id)->get();

    //     if($mapping->isNotEmpty()){
    //         DB::table('Ticket_User_Assignment_Mapping')
    //         ->where('Ticket_id' , $id)
    //         ->update([
    //             'Assigning_User_id' => $assigningUserId,
    //             'Assigned_User_id' => $assignToId]);
    //     }else{
    //         DB::table('Ticket_User_Assignment_Mapping')->insert([
    //             'Ticket_id' => $id,
    //             'Assigning_User_id' => $assigningUserId,
    //             'Assigned_User_id' => $assignToId]);
    //     };

    //     return true;
    // }

    //this addds
    // public function assignTicket(int $id ,string $assigningUserId, $assignToId){

    //     $ticket = Ticket::find($id);
    //     $ticket->assignedUsers()->attach($assignToId , [
    //         'Assigning_User_id' => $assigningUserId
    //     ]);
    //     return true;
    // }

    //this edits
    public function assignTicket(int $id ,string $assigningUserId, $assignToId , bool $seen){
        if($assignToId == null){
            $assignToId = 4;
        }

        $ticket = Ticket::find($id);
        $ticket->assignedUsers()->sync([$assignToId => [
            'Assigning_User_id' => $assigningUserId , 
            'Seen' => $seen
        ]]);
        return true;
    }

    //this removes
    // public function assignTicket(int $id ,string $assigningUserId, $assignToId){

    //     $ticket = Ticket::find($id);
    //     $ticket->assignedUsers()->detach($oldUserId);
    //     return true;
    // }


    // public function getAllAssignment(){

    //     $assign = DB::table('Ticket_User_Assignment_Mapping')
    //     ->join('Users' , 'Ticket_User_Assignment_Mapping.Assigned_User_id' , '=' , 'Users.id')
    //     ->select('Ticket_id' , 'Username')
    //     ->get();
    //     return $assign;
    // }

    public function getAllAssignment(){

        $assign = DB::table('Ticket_User_Assignment_Mapping')
        ->join('Users' , 'Ticket_User_Assignment_Mapping.Assigned_User_id' , '=' , 'Users.id')
        ->select('Ticket_id', 'Assigned_User_id', 'Username')
        ->get();
        return $assign;
    }

    public function getNewTickets(int $id){

        $ticketsp = null;
        $tickets = null;

        $ticketNo = TicketUserAssignmentMapping::
            where('Assigned_User_id' , $id)->
            where('Seen' , 0)
            ->get();

        if(isset($ticketNo)){
            
            for($i = 0 ; $i < count($ticketNo) ; $i++){
                $ticketsp[$i] = Ticket::where('id' , $ticketNo[$i]->Ticket_id)->get(); 
                $tickets[$i] = $ticketsp[$i][0];
            }

            if(isset($ticketsp)){
                for($i = 0 ; $i < count($ticketsp) ; $i++){
                    TicketUserAssignmentMapping::where('Ticket_id' , $ticketsp[$i][0]->id)
                    ->update(['Seen' => 1]);
                }
            }
        }

        return $tickets;
    }

}

