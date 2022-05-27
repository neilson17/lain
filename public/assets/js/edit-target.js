// ========================================================================
// Target Edit
// ========================================================================
window.onload = () => {
    var addSuccess = sessionStorage.getItem("edit-target-success");
    if (addSuccess){
        sessionStorage.removeItem("edit-target-success");
        $("#notification-edit-target-success").removeClass("d-none");
    }
}

$("#btn-edit-target").on('click', function(e){
    var name = $('input[name="inptargettitle"]').val();
    var current_amount = $('input[name="inpcurrentamount"]').val();
    var target_amount = $('input[name="inptargetamount"]').val();
    var aval = $("#availableBalance").attr("balance");
    var id = $("#idtarget").val();
    var date = $('input[name="inptargetdate"]').val();
    var description = $('#inptargetdescription').val();

    if(parseInt(current_amount) <= parseInt(aval)){
        if (parseInt(current_amount) <= parseInt(target_amount)){
            var token_name = $('input[name="_token"]').val();
            $.ajax({
                url: "/api/edittarget",
                type:"POST",
                data:{
                    "_token": token_name,
                    id: id,
                    name: name,
                    current_amount: current_amount,
                    target_amount: target_amount,
                    date: date,
                    description: description,
                },
                success:function(response){
                    console.log("Successfully edited target");
                    sessionStorage.setItem("edit-target-success", "true");
                    location.reload();
                },
                error: function(response) {
                    e.preventDefault();
                    $("#notification-edit-target-fail").removeClass("d-none");
                    console.log("Error while adding target");
                },
            });
        }
        else{
            alert("Current amount cannot be greater than target amount!");
        }
    }
    else {
        alert("Current amount cannot be greater than available balance for this target!");
    }
});
