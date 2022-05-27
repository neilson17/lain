// ========================================================================
// Add Target
// ========================================================================

window.onload = () => {
    var addSuccess = sessionStorage.getItem("add-target-success");
    if (addSuccess){
        sessionStorage.removeItem("add-target-success");
        $("#notification-add-target-success").removeClass("d-none");
    }
}

$("#btn-new-target").on('click', function(e){
    var title = $('input[name="inptargettitle"]').val();
    var date = $('input[name="inptargetdate"]').val();
    var amount = $('input[name="inptargetamount"]').val();
    var description = $('#inptargetdescription').val();

    // Add new target to db
    var token_name = $('input[name="_token"]').val();
    $.ajax({
        url: "/api/createtarget",
        type:"POST",
        data:{
            "_token": token_name,
            title: title,
            date: date,
            amount: amount,
            description: description,
        },
        success:function(response){
            console.log(response.success);
            sessionStorage.setItem("add-target-success", "true");
            location.reload();
        },
        error: function(response) {
            e.preventDefault();
            $("#notification-add-target-fail").removeClass("d-none");
            console.log("Error while adding target");
        },
    });
});