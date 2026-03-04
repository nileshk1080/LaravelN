<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TicketService;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use App\Http\Requests\AssignTicketRequest;

class TicketController extends Controller{
    
    public function getAllTickets(TicketService $ticketService){

        $username = Auth::user()->Username;
        $role = Auth::user()->Role[0]->Role;
        $tickets = $ticketService->getAllTickets($username , $role);
        $allAssignment = $ticketService->getAllAssignment();
    
        if(isset($tickets)){
            return view('ticketview', compact('tickets') , compact('allAssignment'));
             //return response()->json($tickets);
        } else {
            echo "You have no tickets";
            sleep(2);
            return redirect('/home');
        }
    }

    public function addTicket(AssignTicketRequest $request , TicketService $ticketService ){

        $ticketdata = [
            'Title' => $request->input('Title'),
            'Username' => Auth::user()->Username,
            'Description' => $request->input('description'),
            'Priority' => $request->input('priority'),
            'Status' => "Incomplete"
        ];

        if($ticketService->addTicket($ticketdata)){
            return redirect('/getAllTickets')->with('success', 'Ticket Added Successfully');
        }else {
            return redirect()->back()->with('error', 'Failed to add ticket');
        }
    }

    public function editTicket(Request $request , TicketService $ticketService){

        $id = $request->input('id');
        $tickets = $ticketService->getTicket($id);
        $users = Users::all();
        if(isset($tickets)){
            return view('editTicketPage', compact('tickets') , compact('users'));
        }else{
            echo '<script> alert("Not Authorised")</script>';
            return redirect('/getAllTickets');
        }
    }

    public function editSubmitTicket(Request $request , TicketService $ticketService){
        $ticketdata = [
            'id' => $request->input('id'),
            'Title' => $request->input('title'),
            'Description' => $request->input('description'),
            'Priority' => $request->input('priority'),
            'Comments' => $request->input('comments'),
        ];

        $assigningUserId = Auth::user()->id;
        $id = $request->input('id');
        $assignedToId = $request->input('assigned_to');
        $seen = 0;

        $status1 = $ticketService->assignTicket($id ,$assigningUserId, $assignedToId, $seen);
        //$status1 = $this->assignTicket($request , $ticketService);
        $status2 = $ticketService->editTicket($ticketdata);
        if($status1 == true && $status2 == true){
            echo '<script> alert("Ticket updated")</script>';
            return redirect('/getAllTickets');
        }
    }

    public function completeTicket(Request $request , TicketService $ticketService){
        
        $username = Auth::user()->Username;      
        $id = $request->input('id');
        $ticketstatus = $ticketService->completeTicket($id);
        
        if($ticketstatus){
            return redirect('/getAllTickets');
        }else{
            echo '<script> alert("Not Authorised")</script>';
            return redirect('/getAllTickets');
        }
        
    }

    public function deleteTicket(Request $request , TicketService $ticketService){

        $username = Auth::user()->Username;  
        $id = $request->input('id');
        $ticketstatus = $ticketService->deleteTicket($id);
        
        if($ticketstatus){
            return redirect('/getAllTickets');
        }else{
            echo '<script> alert("Not Authorised")</script>';
            return redirect('/getAllTickets');
        }
    }

    public function newTickets(TicketService $ticketService){

        $id = Auth::user()->id;
        $tickets = $ticketService->getNewTickets($id);
        $allAssignment = $ticketService->getAllAssignment();
    
        if(isset($tickets)){
            return view('ticketview', compact('tickets') , compact('allAssignment'));
        } else {
            return redirect('/home')->with('message' , 'You have no NEW tickets');
        }
    }

}

