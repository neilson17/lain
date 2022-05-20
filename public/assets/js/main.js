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
// Photo Preview
// ========================================================================
$(document).ready(function (e) {
    $('#image').change(function(){    
        let reader = new FileReader();
        reader.onload = (e) => { 
        $('#preview-image').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
    });
});

// ========================================================================
// Todo List
// ========================================================================
$("#btn-search-todo").on('click', function(){
    var search = $("#inpsearchtodo").val();
    var token_name = $('input[name="_token"]').val();
    $.ajax({
        url: "/api/searchtodos",
        type:"POST",
        data:{
            "_token": token_name,
            search: search,
        },
        success:function(response){
            console.log(response.success);
            $("#todo-list-wrapper").html(response.elements);
        },
        error: function(response) {
            console.log("Error while searching todos");
        },
    });
});

// Juga dipake buat todo detail di bagian mark done
$(document).on('click', ".done-todo-list", function(){
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
// Todo Detail
// ========================================================================
$("#btn-delete-todo-detail").on('click', function(){
    let confirmAction = "Are you sure to delete this todo?";
    if (confirm(confirmAction)){
        $("#delete-todo-detail").submit();
    }
    else alert("Delete canceled");
});

// ========================================================================
// Note List
// ========================================================================
$("#btn-search-note").on('click', function(){
    var search = $("#inpsearchnote").val();
    var token_name = $('input[name="_token"]').val();
    $.ajax({
        url: "/api/searchnotes",
        type:"POST",
        data:{
            "_token": token_name,
            search: search,
        },
        success:function(response){
            console.log(response.success);
            $("#private-note-list-wrapper").html(response.private);
            $("#public-note-list-wrapper").html(response.public);
        },
        error: function(response) {
            console.log("Error while searching notes");
        },
    });
});

// ========================================================================
// Note Detail
// ========================================================================
$("#btn-delete-note-detail").on('click', function(){
    let confirmAction = "Are you sure to delete this note?";
    if (confirm(confirmAction)){
        $("#delete-note-detail").submit();
    }
    else alert("Delete canceled");
});

// ========================================================================
// Note Edit
// ========================================================================
$("#btn-edit-note").on('click', function(e){
    var noteid = $("#inpnoteid").val();
    var title = $('input[name="inpnotetitle"]').val();
    var type = $('#inpnotetype option:selected').val();
    var clients_id = $('#inpnoteclientsid option:selected').val();
    var content = $("#inpnotecontent").val();
    var token_name = $('input[name="_token"]').val();
    $.ajax({
        url: "/api/editnote",
        type:"POST",
        data:{
            "_token": token_name,
            noteid: noteid,
            title: title,
            type: type,
            clients_id: clients_id,
            content: content,
        },
        success:function(response){
            e.preventDefault();
            $("#notification-edit-note-success").removeClass("d-none");
            console.log(response.success);
        },
        error: function(response) {
            e.preventDefault();
            $("#notification-edit-note-fail").removeClass("d-none");
            console.log("Error while editing note");
        },
    });
});

// ========================================================================
// Event List
// ========================================================================
$("#btn-search-event").on('click', function(){
    var search = $("#inpsearchevent").val();
    var token_name = $('input[name="_token"]').val();
    $.ajax({
        url: "/api/searchevents",
        type:"POST",
        data:{
            "_token": token_name,
            search: search,
        },
        success:function(response){
            console.log(response.success);
            $("#event-list-wrapper").html(response.elements);
        },
        error: function(response) {
            console.log("Error while searching events");
        },
    });
});

// ========================================================================
// Event Detail
// ========================================================================
$("#btn-delete-event-detail").on('click', function(){
    let confirmAction = "Are you sure to delete this event?";
    if (confirm(confirmAction)){
        $("#delete-event-detail").submit();
    }
    else alert("Delete canceled");
});

// ========================================================================
// Event Edit
// ========================================================================
$("#btn-edit-event").on('click', function(e){
    var eventid = $("#inpeventid").val();
    var title = $('input[name="inptodotitle"]').val();
    var date = $('input[name="inpdate"]').val();
    var clients_id = $('#inpclientid option:selected').val();
    var description = $('#inpdescription').val();

    var token_name = $('input[name="_token"]').val();
    $.ajax({
        url: "/api/editevent",
        type:"POST",
        data:{
            "_token": token_name,
            eventid: eventid,
            title: title,
            description: description,
            date: date,
            clients_id: clients_id,
        },
        success:function(response){
            e.preventDefault();
            $("#notification-edit-event-success").removeClass("d-none");
            console.log(response.success);
        },
        error: function(response) {
            e.preventDefault();
            $("#notification-edit-event-fail").removeClass("d-none");
            console.log("Error while editing event");
        },
    });
});

// ========================================================================
// Team List
// ========================================================================

$("#btn-search-team").on('click', function(){
    var search = $("#inpsearchteam").val();
    var token_name = $('input[name="_token"]').val();
    $.ajax({
        url: "/api/searchteams",
        type:"POST",
        data:{
            "_token": token_name,
            search: search,
        },
        success:function(response){
            console.log(response.success);
            $("#team-list-wrapper").html(response.elements);
        },
        error: function(response) {
            console.log("Error while searching teams");
        },
    });
});

$(".btn-delete-team").on('click', function(){
    let confirmAction = "Are you sure to set this account to inactive?";
    if (confirm(confirmAction)){
        $("#delete-team-" + $(this).attr('username')).submit();
    }
    else alert("Delete canceled");
});

// ========================================================================
// Client List
// ========================================================================

$("#btn-search-client").on('click', function(){
    var search = $("#inpsearchclient").val();
    var token_name = $('input[name="_token"]').val();
    $.ajax({
        url: "/api/searchclients",
        type:"POST",
        data:{
            "_token": token_name,
            search: search,
        },
        success:function(response){
            console.log(response.success);
            $("#client-list-wrapper").html(response.elements);
        },
        error: function(response) {
            console.log("Error while searching clients");
        },
    });
});

// ========================================================================
// Client Detail
// ========================================================================
$("#btn-delete-client-detail").on('click', function(){
    let confirmAction = "Are you sure to delete this client and all its todos, notes, and events?";
    if (confirm(confirmAction)){
        $("#delete-client-detail").submit();
    }
    else alert("Delete canceled");
});

$(document).on('click', '.done-todo-client-detail', function(){
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

$("#range-event-client-detail").on('change', function(){
    var range = $(this).val();
    var clientid = $(this).attr('client');

    var token_name = $('input[name="_token"]').val();
    $.ajax({
        url: "/api/rangeevent",
        type:"POST",
        data:{
            "_token": token_name,
            range: range,
            client_id:clientid,
        },
        success:function(response){
            console.log(response.success);
            $("#event-list-client-detail").html(response.elements);
        },
        error: function(response) {
            console.log("Error while updating range on events");
        },
    });
});

$("#range-todo-client-detail").on('change', function(){
    var range = $(this).val();
    var clientid = $(this).attr('client');

    var token_name = $('input[name="_token"]').val();
    $.ajax({
        url: "/api/rangetodo",
        type:"POST",
        data:{
            "_token": token_name,
            range: range,
            client_id:clientid,
        },
        success:function(response){
            console.log(response.success);
            $("#todo-list-client-detail").html(response.elements);
        },
        error: function(response) {
            console.log(response);
            console.log("Error while updating range on events");
        },
    });
});