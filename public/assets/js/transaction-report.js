window.onload = () => {
    var token_name = $('input[name="_token"]').val();
    var startDate = $("#initstartdate").val();
    var endDate = $("#initenddate").val();
    $.ajax({
        type:'POST',
        url:'/transactions/getReportsContent',
        data:{
            '_token':token_name,
            bankAcc:1,
            startDate: startDate,
            endDate: endDate
        },
        success: function(data){
            $("#totalIncome").html(data.income.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
            $("#totalBalance").html(data.balance.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
            $("#totalExpense").html(data.expense.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
            $("#totalPiutang").html(data.piutang.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
            $("#totalHutang").html(data.hutang.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
            $('#finance-report-content').html(data.msg);
        }
    });
}

$("#btn-search-report").on('click', function(){
    var token_name = $('input[name="_token"]').val();
    var bankAcc = $("#inpbankaccount").val();
    var startDate = $("#initstartdate").val();
    var endDate = $("#initenddate").val();
    $.ajax({
        type:'POST',
        url:'/transactions/getReportsContent',
        data:{
            '_token':token_name,
            bankAcc:bankAcc,
            startDate: startDate,
            endDate: endDate
        },
        success: function(data){
            $("#totalIncome").html(data.income.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
            $("#totalBalance").html(data.balance.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
            $("#totalExpense").html(data.expense.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
            $("#totalPiutang").html(data.piutang.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
            $("#totalHutang").html(data.hutang.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
            $('#finance-report-content').html(data.msg);
        }
    });
});