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

        @vite(['resources/js/ticketview.js']) 

        

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    </head>

    <body>
    

    <div>

        <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="page-title">Extensions</h2>

            <div class="d-flex align-items-center">

            <input type="text" class="form-control table-search mr-2" placeholder="Search">

            <button class="btn btn-refresh mr-2">
                <i class="fa fa-sync"></i>
            </button>

            <button class="btn btn-refresh mr-2">
                <i class="fa fa-filter" ></i>
            </button>

            <button class="btn btn-add">
                + Add Extension
            </button>

            </div>
        </div>

    <table id="myTable" class="table custom-table ">
        <thead>
            <tr class="info">
                <th class="fcol"><input type="checkbox" name="agree"></th>
                <th data-sortable="true">Extension Number</th>
                <th data-sortable="true">Agent</th>
                <th>Admin Broker</th>
                <th data-sortable="true">Status</th>
            </tr>

        </thead>
        <tbody>
            
            @for ($i = 0 ; $i<count($tickets);$i++)
                <tr>
                    <td><input type="checkbox" name="agree"></td>
                    <td>{{ $tickets[$i]->id }}</td>
                    <td class="uf">{{ $tickets[$i]->Username }}</td>
                    <td>
                        @for ($j = 0 ; $j < count($allAssignment) ; $j++)
                            @if($tickets[$i]->id == $allAssignment[$j]->Ticket_id)
                               {{ $allAssignment[$j]->Username }} 
                            @endif
                        @endfor
                    </td>
                    <td>
                        <form method="post" action="completeTicket">
                            <input type="hidden" name="id" value="{{ $tickets[$i]->id }}">
                            <button type="submit" class="btn btn-primary">Status</button>
                        </form>
                    </td>
                </tr>
            @endfor
        </tbody>         
    </table>
    <div id="bottom-length"></div>

</div><br><br><br>

<div >

        <div class="d-flex justify-content-between align-items-center mb-3">

        <h2 class="page-title">Agent Groups</h2>

        <div class="d-flex align-items-center">

            <input type="text" class="form-control table-search mr-2" placeholder="Search">

            <button class="btn btn-refresh mr-2">
                <i class="fa fa-sync"></i>
            </button>

            <button class="btn btn-refresh mr-2">
                <i class="fa fa-filter"></i>
            </button>

            <button class="btn btn-add">
                + Add Extension
            </button>

        </div>
    </div>

    <table id="myTable2" class="table custom-table ">
        <thead>
            <tr class="info">
                <th data-sortable="true">Name</th>
                <th>Admin Broker</th>
                <th>Extension</th>
                <th data-sortable="true">Status</th>
            </tr>

        </thead>
        <tbody>
            
            @for ($i = 0 ; $i<count($tickets);$i++)
                <tr>
                    <td class="uf">{{ $tickets[$i]->Username }}</td>
                    <td>
                        @for ($j = 0 ; $j < count($allAssignment) ; $j++)
                            @if($tickets[$i]->id == $allAssignment[$j]->Ticket_id)
                               {{ $allAssignment[$j]->Username }} 
                            @endif
                        @endfor
                    </td>
                    <td>{{ $tickets[$i]->id }}</td>
                    <td>
                        <form method="post" action="completeTicket">
                            <input type="hidden" name="id" value="{{ $tickets[$i]->id }}">
                            <button type="submit" class="btn btn-primary">Status</button>
                        </form>
                    </td>
                </tr>
            @endfor
        </tbody>         
    </table>
     <div id="bottom-length2"></div>
</div>

<script>
    $(document).ready(function(){

        $('#myTable').DataTable({
            "searching": false,
            dom: 'lrtip',   // Removes top length menu
        lengthChange: true,
            pagingType: "full_numbers",
        language: {
            paginate: {
                first: "«",
                previous: "‹",
                next: "›",
                last: "»"
            }
        }
        });
          $('#myTable_length').appendTo('#bottom-length');
    });

    $(document).ready(function(){

        $('#myTable2').DataTable({
            "searching": false,
            dom: 'lrtip',   // Removes top length menu
        lengthChange: true,
            pagingType: "full_numbers",
        language: {
            paginate: {
                first: "«",
                previous: "‹",
                next: "›",
                last: "»"
            }
        }
        });
          $('#myTable2_length').appendTo('#bottom-length2');
    });


    // $(document).ready(function(){

    //     $('#myTable2').DataTable({
    //         "searching": false
    //     });
    //     $('#yourTableId_length').appendTo('#bottom-length');
    // });
    </script>


    </body>
</html>