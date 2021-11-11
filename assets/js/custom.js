//######################### show password #############################
$(".reveal").on('click',function() {
    var $pwd = $(".pwd");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
});

//data table
$(document).ready(function() {
    $('#example').DataTable();
} );
$(document).ready(function(){
    $("#myModal").modal('show');
});