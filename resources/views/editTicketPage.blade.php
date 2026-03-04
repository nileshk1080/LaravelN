<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Ticket</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @include('layouts.navbar2')
</head>
<body>

    <div class="frm">

    <h1>Edit Ticket</h1>
    
    <form action="editSubmitTicket" method="post">
        @csrf
        
        <input type="hidden" name="id" value="{{ $tickets[0]->id }}">
        
        <div class="form-group">
            <label for="Title">Title:</label><br>
            <input type="text" name="title" value='{{$tickets[0]->Title}}' ><br><br>

            <label for="assigned_to">Assigned To :</label><br>
            <select  name="assigned_to" class="form-control form-group col-md-4">
                <option value="">Not Assigned</option>  
                @for($i = 0 ; $i < count($users) ; $i++)
                <option value="{{ $users[$i]->id }}"
                    @if(isset($assignedUser) && $assignedUser->id == $user->id)
                        selected
                    @endif>
                    @if($users[$i]->Username == 'null')
                    {{ "Not Assigned" }}
                    @else
                    {{ $users[$i]->Username }}
                    @endif</option>    
                @endfor
            </select>

            <label for="description">Description:</label><br>
            <textarea name="description" rows="5" cols="40" class="form-control" >{{$tickets[0]->Description}}</textarea><br>

            <label for="comments">Comments:</label><br>
            <textarea name="comments" rows="5" cols="40" class="form-control" >{{$tickets[0]->Comments}}</textarea><br>
        </div>
        <div >
            <label for="priority">Priority</label>
            <select  name="priority" value="{{$tickets[0]->Priority}}" class="form-control form-group col-md-4">
                <option value="Medium">Medium</option>    
                <option value="High">High</option>
                <option value="Low">Low</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</body>
</html>