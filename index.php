
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

<style>
    td.details-control { background: url('../resources/details_open.png') no-repeat center center; cursor: pointer; } tr.shown td.details-control { background: url('../resources/details_close.jpg') no-repeat center center; }
</style>  


<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th></th>
            <th>First name</th>
            <th>Last name</th>
            <th>Position</th>
            <th>Office</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th></th>
            <th>First name</th>
            <th>Last name</th>
            <th>Position</th>
            <th>Office</th>
        </tr>
    </tfoot>
</table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>



function format ( d ) { // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+ '<tr>'+ '<td>name:</td>'+ '<td>'+d.name+'</td>'+ '</tr>'+ '<tr>'+ '<td>Address:</td>'+ '<td>'+d.address+'</td>'+ '</tr>'+ '</table>'; } 

$(document).ready(function() {
    ////////////////////////////////////////////////////////////////////////////////////////


    var table = $('#example').DataTable( { "ajax": "scripts/userlist.php", "columns": [ { "class": 'details-control', "orderable": false, "data": null, "defaultContent": '' }, 
    { "data": "name" },
    { "data": "image" ,
            "render": function ( data) {
            return '<img src="https://img.freepik.com/premium-vector/piece-cheese-pizza-pixel-art-style_475147-1272.jpg?w=740" width="40px">';
        }
    },
    { "data": "address" }, 
    { "data": "gender" } ], "order": [[1, 'asc']] } ); 
    // Add event listener for opening and closing details 
    $('#example tbody').on('click', 'td.details-control', function () 
    { var tr = $(this).closest('tr'); var row = table.row( tr );
        if ( row.child.isShown() ) { 
            // This row is already open - close it 
            row.child.hide(); tr.removeClass('shown'); 
        } else { 
            // Open this row 
            row.child( format(row.data()) ).show(); tr.addClass('shown'); 
        } 
    } );




    //////////////////////////////////////////////////////////////////////////////////////
    
} );




</script>