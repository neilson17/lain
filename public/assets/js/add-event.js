// ========================================================================
// Add Event
// ========================================================================

window.onload = () => {
    var addSuccess = sessionStorage.getItem("add-event-success");
    if (addSuccess){
        sessionStorage.removeItem("add-event-success");
        $("#notification-add-event-success").removeClass("d-none");
    }
}

$("#btn-new-event").on('click', function(e){
    var title = $('input[name="inptodotitle"]').val();
    var date = $('input[name="inpdate"]').val();
    var clients_id = $('#inpclientid option:selected').val();
    var description = $('#inpdescription').val();

    // Add new todo to db
    var token_name = $('input[name="_token"]').val();
    $.ajax({
        url: "/api/createevent",
        type:"POST",
        data:{
            "_token": token_name,
            title: title,
            description: description,
            date: date,
            clients_id: clients_id,
        },
        success:function(response){
            console.log(response.success);
            sessionStorage.setItem("add-event-success", "true");
            location.reload();
        },
        error: function(response) {
            e.preventDefault();
            $("#notification-add-event-fail").removeClass("d-none");
            console.log("Error while adding todo");
        },
    });
});