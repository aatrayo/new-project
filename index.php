<style>
    td.details-control { background: url('../resources/details_open.png') no-repeat center center; cursor: pointer; } tr.shown td.details-control { background: url('../resources/details_close.jpg') no-repeat center center; }
</style>    


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />




<button id="delete">Delete</button>

<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Image</th>
            <th>Address</th>
            <th>Gender</th>
            
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Image</th>
            <th>Address</th>
            <th>Gender</th>
            
        </tr>
    </tfoot>
    <tbody>
        
    </tbody>
</table>
</div>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>



function format ( d ) { // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+ '<tr>'+ '<td>name:</td>'+ '<td>'+d.name+'</td>'+ '</tr>'+ '<tr>'+ '<td>Address:</td>'+ '<td>'+d.address+'</td>'+ '</tr>'+ '</table>'; } 

$(document).ready(function() {
    ////////////////////////////////////////////////////////////////////////////////////////


    var table = $('#example').DataTable( { "ajax": "scripts/ids-objects.php", "columns": [ { "class": 'details-control', "orderable": false, "data": null, "defaultContent": '' }, 
    { "data": "name" },
    { "data": "image" ,
            "render": function ( data) {
            return '<img src="https://img.freepik.com/premium-vector/piece-cheese-pizza-pixel-art-style_475147-1272.jpg?w=740" width="40px">';
        }
    },
    //{ "data": "image" },
    { "data": "address" }, 
    { "data": "gender" } ], "order": [[1, 'asc']] } ); 
    // Add event listener for opening and closing details 
    $('#example tbody').on('click', 'td.details-control', function () 
    { 
        var tr = $(this).closest('tr'); var row = table.row( tr ); 
        if ( row.child.isShown() ) 
        { 
            // This row is already open - close it 
            row.child.hide(); tr.removeClass('shown'); 
        } else { 
            // Open this row 
            row.child( format(row.data()) ).show(); tr.addClass('shown'); 
        } 
    } );

    //////////////////////////////////////////////////////////////////////////////////////
    var table1 = $('#example').DataTable(); 

    

    $('#example tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) { 
            $(this).removeClass('selected'); 
        } else { 
            table1.$('tr.selected').removeClass('selected'); $(this).addClass('selected'); 
        } 
    } ); 
    $('#button').click(function () {
        //var data = table.rows().data()
        var data = table1.rows('.selected').data();
        console.log(data);
        var ids = $.map(table1.rows('.selected').data(), function (item) {
            return item[0]
        });
        console.log(ids)
        alert(table1.rows('.selected').data().length + ' row(s) selected');
        //alert(table.rows('.selected').data());

        
    });
    $('#delete').click( function () { 
        table1.row('.selected').remove().draw( false ); 
    } ); 
} );




</script>

