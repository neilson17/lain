// ========================================================================
// Add Todo
// ========================================================================

window.onload = () => {
    var addSuccess = sessionStorage.getItem("add-note-success");
    if (addSuccess){
        sessionStorage.removeItem("add-note-success");
        $("#notification-add-note-success").removeClass("d-none");
    }
}

$("#btn-new-note").on('click', function(e){
    var title = $('input[name="inpnotetitle"]').val();
    var type = $('#inpnotetype option:selected').val();
    var clients_id = $('#inpnoteclientsid option:selected').val();
    var content = $('#inpnotecontent').val();

    // Add new todo to db
    var token_name = $('input[name="_token"]').val();
    $.ajax({
        url: "/api/createnote",
        type:"POST",
        data:{
            "_token": token_name,
            title: title,
            type: type,
            clients_id: clients_id,
            content: content
        },
        success:function(response){
            console.log(response.success);
            sessionStorage.setItem("add-note-success", "true");
            location.reload();
        },
        error: function(response) {
            e.preventDefault();
            $("#notification-add-note-fail").removeClass("d-none");
            console.log("Error while adding note");
        },
    });
});