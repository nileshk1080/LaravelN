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

    <h2>Add Ticket</h2>
    
    <form action="addticket" method="post">
        @csrf
        
        <input type="hidden" name="status" value="Incomplete">
        
        <div class="form-group">
            <label for="Title">Title:</label><br>
            <input type="text" name="Title" placeholder="Title">
            @error('Title')
                <div style="color:red;">
                    {{ $message }}
                </div>
            @enderror
            <br><br>
            
            <label for="description">Description:</label><br>
            <textarea name="description" rows="5" cols="40" class="form-control" placeholder="Add description"></textarea><br>
        </div>
        <div >
            <label for="priority">Priority</label>
            <select  name="priority" class="form-control form-group col-md-4">
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