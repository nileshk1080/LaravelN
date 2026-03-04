
$(function () {
    $.ajax({
        url: "/getAllTickets",
        type: "GET",
        dataType: "json", 
        success: function (response) {
                
            let rows = "";

            response.forEach(function (tickets) {
                rows += ` 
                <tr>
                    <td>${tickets.id}</td>
                    <td>${tickets.Title}</td>
                    <td>${tickets.Description}</td>
                    <td class="uf">${tickets.Username}</td>
                    <td>${tickets.Added}</td>
                    <td>
                        
                    </td>
                    <td class="pf">${tickets.Priority}</td>
                    <td class="sf">${tickets.Status}</td>
                    <td>${tickets.Comments}</td>
                    <td>
                        <form method="post" action="completeTicket">                
                            <input type="hidden" name="id" value="${tickets.id}"></input>
                            <button type="submit" class="btn btn-primary">Complete</button>
                        </form>
                    </td>

                    <td>
                        <form method="post" action="editTicket">                
                            <input type="hidden" name="id" value="${tickets.id}"></input>
                            <button type="submit">Edit</button>
                        </form>
                    </td>

                    <td>
                        <form method="post" action="deleteTicket">
                            <input type="hidden" name="id" value="${tickets.id}"></input>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Delete?')">
                            Delete</button>
                        </form>
                    </td> 
                </tr>
                `;
            });
            $('#myTable tbody').html(rows);
        }
    });
});

