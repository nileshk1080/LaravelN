<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" 
    href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <title>View Tickets</title>
</head>
<body>
    
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo site_url('homepage'); ?>">Ticketing System</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <>
            <?php
                if ($this->session->has_userdata('Users')) {
                    $users = $this->session->userdata('Users');

                    echo '<li class="navbar-brand">'.$users[0]->Username.'</li>';

                echo '<li>
                    <a href='.site_url('authentication/logout').'>
                    <span class="glyphicon glyphicon-user"></span> Logout</a>
                    </li>';
                }else{
                    echo '<li>
                    <a href='.site_url('signUp').'>
                    <span class="glyphicon glyphicon-user"></span> Sign Up</a>
                    </li>

                    <li>
                    <a href='.site_url('login').'><span class="glyphicon glyphicon-log-in"></span> Login</a>
                    </li>';
                }
            ?>
            <>
        </ul>
    </nav>

    <h1>View Tickets</h1>
    

    <!-- <div>
    
        <div class="container mt-4">
        <form method="post" action="<?php echo site_url('complete'); ?>">
            <label for="username">Username<br>
            <input type="text" name="username" placeholder="Username"><br><br>

            <label for="status">Status</label>
            <select  name="status" >
                <option value="Incomplete">Incomplete</option>    
                <option value="Complete">Complete</option>
            </select>

            <label for="priority">Priority</label>
            <select  name="priority" >
                <option value="Medium">Medium</option>    
                <option value="High">High</option>
                <option value="Low">Low</option>
            </select>
            <button type="submit" >Filter</button>
        </form>
        </div>
    </div> -->
    
    <table id="myTable" class="table table-bordered table-striped ">
        <thead>
            <tr>
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
            </tr>
        </thead>
        <tbody>
            
            <?php for($i = 0 ; $i<count($Tickets);$i++):?>
    
                <tr>
                    <td><?php echo $Tickets[$i]->id; ?></td>
                    <td><?php echo $Tickets[$i]->Title; ?></td>
                    <td><?php echo $Tickets[$i]->Description; ?></td>
                    <td class="uf"><?php echo $Tickets[$i]->Username; ?></td>
                    <td><?php echo $Tickets[$i]->Added; ?></td>
                    <td><?php echo $Tickets[$i]->Assigned; ?></td>
                    <td class="pf"><?php echo $Tickets[$i]->Priority; ?></td>
                    <td class="sf"><?php echo $Tickets[$i]->Status; ?></td>
                    <td><?php echo $Tickets[$i]->Comments; ?></td>
                    <td>
                        <form method="post" action="<?php echo site_url('complete'); ?>">
                            <input type="hidden" name="id" value="<?php echo $Tickets[$i]->id; ?>">
                            <button type="submit">Complete</button>
                        </form>
                    </td>

                    <td>
                        <form method="post" action="<?php echo site_url('edit/'.$Tickets[$i]->id); ?>">
                            <input type="hidden" name="id" value="<?php echo $Tickets[$i]->id; ?>">
                            <button type="submit">Edit</button>
                        </form>
                    </td>

                    <td>
                        <form method="post" action="<?php echo site_url('delete'); ?>">
                            <input type="hidden" name="id" value="<?php echo $Tickets[$i]->id; ?>">
                            <button type="submit" onclick="return confirm('Delete?')">
                            Delete</button>
                        </form>
                    </td>

                </tr>
            <?php endfor;?>
        </tbody>         
    </table>

   <script src="/assets/js/ticketview.js"></script> 
   
   <script>
    $(document).ready(function(){

        $('#myTable').DataTable({
            "searching": false
        });

    });
    </script>
</body>
</html>


