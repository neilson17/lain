// ========================================================================
// Add Todo
// ========================================================================

window.onload = () => {
    var addSuccess = sessionStorage.getItem("add-todo-success");
    if (addSuccess){
        sessionStorage.removeItem("add-todo-success");
        $("#notification-add-todo-success").removeClass("d-none");
    }
}

var assignlist = [];
$('#btn-add-todo-add-assign').on('click', function(e){
    e.preventDefault();
    var assignval = $('#add-todo-add-assign-list').find(":selected").val();
    if (assignval != null){
        assignlist.push(assignval);
        var assignname = $('#add-todo-add-assign-list').find(":selected").text();
        var assignphoto = $('#add-todo-add-assign-list').find(":selected").attr('photo');
        $('#add-todo-assign-list').append(`
            <div class="position-relative">
                <div class="dashboard-tag-item font-12x item-align-center d-flex">
                    <img src="${assignphoto}" class="img-avatar h-20x mr-10x" alt="">
                    ${assignname}
                </div>
                <span photo="${assignphoto}" username="${assignval}" assignname="${assignname}" class="todo-assign-delete color-white text-align-center font-10x">x</span>
            </div>
        `);
        $("#add-todo-add-assign-list option[value='" + assignval + "']").remove();
    }
    else {
        alert('All user have been used!')
    }
});

$(document).on('click', '.todo-assign-delete', function(){
    var assignval = $(this).attr('username');
    var assignname = $(this).attr('assignname');
    var assignphoto = $(this).attr('photo');
    $('#add-todo-add-assign-list').append("<option photo=" + assignphoto + " value=" + assignval + ">"+ assignname + "</option>");
    assignlist.splice( $.inArray(assignval, assignlist), 1 );
    $(this).parent().remove();
});

var taglist = [];
$('#btn-add-todo-add-tag').on('click', function(e){
    e.preventDefault();
    var tagval = $('#add-todo-add-tag-list').find(":selected").val();
    if (tagval != null){
        taglist.push(tagval);
        var tagname = $('#add-todo-add-tag-list').find(":selected").text();
        $('#add-todo-tag-list').append(`
            <div class="position-relative">
                <div class="dashboard-tag-item font-12x">${tagname}</div>
                <span id=${tagval} tagname="${tagname}" class="todo-tag-delete color-white text-align-center font-10x">x</span>
            </div>
        `);
        $("#add-todo-add-tag-list option[value='" + tagval + "']").remove();
    }
    else {
        alert('All tags have been used! Please create a new one!')
    }
});

$(document).on('click', '.todo-tag-delete', function(){
    var tagval = $(this).attr('id');
    var tagname = $(this).attr('tagname');
    $('#add-todo-add-tag-list').append("<option value=" + tagval + ">"+ tagname + "</option>");
    taglist.splice( $.inArray(tagval, taglist), 1 );
    $(this).parent().remove();
});

$("#btn-new-tag").on('click', function(e){
    e.preventDefault();
    var tagname = $("#inpnewtag").val();

    // Add new tag to db
    var token_name = $('input[name="_token"]').val();
    $.ajax({
        url: "/api/createtodotag",
        type:"POST",
        data:{
            "_token": token_name,
            name:tagname,
        },
        success:function(response){
            console.log(response.success);
            $('#add-todo-tag-list').append(`
                <div class="position-relative">
                    <div class="dashboard-tag-item font-12x">${tagname}</div>
                    <span id="${response.newid}" tagname="${tagname}" class="todo-tag-delete color-white text-align-center font-10x">x</span>
                </div>
            `);
            taglist.push(response.newid);
            $("#inpnewtag").val("");
        },
        error: function(response) {
            console.log("Error while adding new tag");
        },
    });
});

$("#btn-new-todo").on('click', function(e){
    var name = $('input[name="inptodotitle"]').val();
    var deadline = $('input[name="inptododeadline"]').val();
    var clientid = $('#inptodoclientid option:selected').val();
    var description = $('#inptododescription').val();

    // Add new todo to db
    var token_name = $('input[name="_token"]').val();
    $.ajax({
        url: "/api/createtodo",
        type:"POST",
        data:{
            "_token": token_name,
            name: name,
            description: description,
            deadline: deadline,
            clients_id: clientid,
            assign: assignlist,
            tag: taglist,
        },
        success:function(response){
            console.log(response.success);
            sessionStorage.setItem("add-todo-success", "true");
            location.reload();
        },
        error: function(response) {
            e.preventDefault();
            $("#notification-add-todo-fail").removeClass("d-none");
            console.log("Error while adding todo");
        },
    });
});