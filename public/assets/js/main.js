//     GET YANG SUDAH FIX BISAAAAAAAAAAAAAAAAAAAAAAAAA
// $('#ajax-login').on('click', function () {
//     var username = $("#textUsername").val();
//     var password = $("#textPassword").val()
//     $.ajax({
//         method:'GET',
//         url:"api/login/" + username + "/" + password,
//         success: function(data){
//             if (data.res == "YES") window.location.href = "dashboard";
//             else alert("Wrong username or password");
//         }
//         });
// });

// coba post
$('#ajax-login').on('click', function () {
    var username = $("#textUsername").val();
    var password = $("#textPassword").val();
    var token_name = $('input[name="_token"]').val();
    $.ajax({
        url: "/api/login",
        type:"POST",
        data:{
            "_token": token_name,
            username: username,
            password: password,
        },
        success:function(response){
            if (response.status == "success"){
                window.location = "/dashboard";
            }
            else alert("Wrong username or password!\nPlease try again.");
        },
        error: function(response) {
            alert("There is an error while logging in!");
        },
    });
});

// ========================================================================
// Todo List
// ========================================================================
$("#btn-search-todo").on('click', function(){
    $("#search-todo").submit();
});

// Juga dipake buat todo detail di bagian mark done
$(".done-todo-list").on('click', function(){
    var todoid = $(this).attr('id');
    var done = ($(this).is(":checked")) ? 1 : 0;

    var token_name = $('input[name="_token"]').val();
    $.ajax({
        url: "/api/donetodo",
        type:"POST",
        data:{
            "_token": token_name,
            id:todoid,
            done: done,
        },
        success:function(response){
            console.log(response.success);
        },
        error: function(response) {
            console.log("Error while updating todo");
        },
    });
});

// ========================================================================
// Note List
// ========================================================================

$("#btn-search-note").on('click', function(){
    $("#search-note").submit();
});

// ========================================================================
// Event List
// ========================================================================

$("#btn-search-event").on('click', function(){
    $("#search-event").submit();
});

// ========================================================================
// Team List
// ========================================================================

$("#btn-search-team").on('click', function(){
    $("#search-team").submit();
});

// ========================================================================
// Client List
// ========================================================================

$("#btn-search-client").on('click', function(){
    $("#search-client").submit();
});

// ========================================================================
// Client Detail
// ========================================================================

$(".done-todo-client-detail").on('click', function(){
    var todoid = $(this).attr('id');
    var done = ($(this).is(":checked")) ? 1 : 0;

    var token_name = $('input[name="_token"]').val();
    $.ajax({
        url: "/api/donetodo",
        type:"POST",
        data:{
            "_token": token_name,
            id:todoid,
            done: done,
        },
        success:function(response){
            console.log(response.success);
        },
        error: function(response) {
            console.log("Error while updating todo");
        },
    });

    var tt = parseInt($("#progressvalue").attr("tt"));
    var td = parseInt($("#progressvalue").attr("td"));
    td = (done == 1) ? td + 1 : td - 1;
    $("#progressvalue").attr("tt", tt);
    $("#progressvalue").attr("td", td);
    $("#progressvalue").html("Task Done: " + td + "/" + tt);
    var percentage =  td/tt*100;
    $("#progressclientdetail").attr("value", percentage);
    $("#progresspercentage").html(+percentage.toFixed(2) + "%");

    $("#clientdonecard").html((tt == td) ? '<div class="dashboard-tag-item font-12x btn-progress">Done</div>' : '<div class="dashboard-tag-item font-12x">In Progress</div>');
});