// ========================================================================
// Add Transaction
// ========================================================================

window.onload = () => {
    var addSuccess = sessionStorage.getItem("add-transaction-success");
    if (addSuccess){
        sessionStorage.removeItem("add-transaction-success");
        $("#notification-add-transaction-success").removeClass("d-none");
    }
}

$("#btn-new-transaction").on('click', function(e){
    var title = $('input[name="inptransactiontitle"]').val();
    var amount = $('input[name="inptransactionamount"]').val();
    var category_id = $('#inptransactioncategory option:selected').val();
    var bank_acc = $('#inptransactionaccount option:selected').val();
    var date = $('input[name="inptransactiondate"]').val();
    var clients_id = $('#inptransactionclientid option:selected').val();
    var description = $('#inptransactiondescription').val();

    // Add new event to db
    var token_name = $('input[name="_token"]').val();
    $.ajax({
        url: "/api/createtransaction",
        type:"POST",
        data:{
            "_token": token_name,
            title: title,
            amount: amount,
            category_id: category_id,
            bank_acc: bank_acc,
            date: date,
            clients_id: clients_id,
            description: description,
        },
        success:function(response){
            if (response.success == "success"){
                console.log("Successfully added new transaction");
                sessionStorage.setItem("add-transaction-success", "true");
                location.reload();
            }
            else{
                e.preventDefault();
                console.log(response.success);
                $("#notification-add-transaction-fail").removeClass("d-none");
                $("#add-transaction-fail-message").html("Insufficient available balance");
            }
        },
        error: function(response) {
            e.preventDefault();
            $("#notification-add-transaction-fail").removeClass("d-none");
            console.log("Error while adding transaction");
        },
    });
});