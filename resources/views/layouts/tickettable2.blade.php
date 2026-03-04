<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    
        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    
    </head>

    <body>
    

    <div class="tabl">

        <h2>View Tickets</h2>

    <table id="myTable" class="table table-bordered table-striped ">
        <thead>
            <tr class="info">
                <th></th>
                <th data-sortable="true">ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Username</th>
                <th>Added</th>
                <th>Assigned To</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Comment</th>
                <th>Completed</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>

            <tr>
                <th class="fcol"><input type="checkbox" id="selectAll"></th>
                <th></th>
                <th></th>
                <th></th>
                <th><input type="text" id="InputUser" placeholder="Username"></th>
                <th></th>
                <th></th>
                <th><select  id="priority" >
                        <option value="All">All</option> 
                        <option value="Medium">Medium</option>    
                        <option value="High">High</option>
                        <option value="Low">Low</option>
                    </select>
                </th>
                <th><select  id="status" >
                        <option value="All">All</option>  
                        <option value="Incomplete">Incomplete</option>    
                        <option value="Complete">Complete</option>
                    </select>
                </th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            
            @for ($i = 0 ; $i<count($tickets);$i++)
    
                <tr>
                    <th class="fcol"><input type="checkbox" value="{{ $tickets[$i]->id }}"></th>
                    <td>{{ $tickets[$i]->id }}</td>
                    <td>{{ $tickets[$i]->Title }}</td>
                    <td>{{ $tickets[$i]->Description }}</td>
                    <td class="uf">{{ $tickets[$i]->Username }}</td>
                    <td>{{ $tickets[$i]->Added }}</td>
                    <td>
                        @for ($j = 0 ; $j < count($allAssignment) ; $j++)
                            @if($allAssignment[$j]->Assigned_User_id == 4)
                                {{ "" }}
                            @elseif($tickets[$i]->id == $allAssignment[$j]->Ticket_id)
                               {{ $allAssignment[$j]->Username }} 
                            @endif
                        @endfor
                    </td>
                    <td class="pf">{{ $tickets[$i]->Priority }}</td>
                    <td class="sf">{{ $tickets[$i]->Status }}</td>
                    <td>{{ $tickets[$i]->Comments }}</td>
                    <td>
                        <form method="post" action="completeTicket">
                            @csrf
                            <input type="hidden" name="id" value="{{ $tickets[$i]->id }}">
                            <button type="submit" class="btn btn-primary">Complete</button>
                        </form>
                    </td>

                    <td>
                        <form method="post" action="editTicket">
                            @csrf
                            <input type="hidden" name="id" value="{{ $tickets[$i]->id }}">
                            <button type="submit">Edit</button>
                        </form>
                    </td>

                    <td>
                        <form method="post" action="deleteTicket">
                            @csrf
                            <input type="hidden" name="id" value="{{ $tickets[$i]->id }}">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Delete?')">
                            Delete</button>
                        </form>
                    </td>

                </tr>
            @endfor
        </tbody>         
    </table>
   
   <script>
    $(document).ready(function(){

        $('#myTable').DataTable({
            "searching": false
        });

    });
    </script>

    </div>

        <script src="{{ asset('js/ticketview.js') }}"></script>
    </body>
</html>