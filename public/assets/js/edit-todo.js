// ========================================================================
// Edit Todo
// ========================================================================

var assignlist = [];
var taglist = [];

window.onload = () => {
    $('.todo-assign-delete').each(function() {
        assignlist.push($(this).attr('username'));
    });

    $('.todo-tag-delete').each(function() {
        taglist.push($(this).attr('id'));
    });
}

$('#btn-edit-todo-add-assign').on('click', function(e){
    e.preventDefault();
    var assignval = $('#edit-todo-add-assign-list').find(":selected").val();
    if (assignval != null){
        assignlist.push(assignval);
        var assignname = $('#edit-todo-add-assign-list').find(":selected").text();
        var assignphoto = $('#edit-todo-add-assign-list').find(":selected").attr('photo');
        $('#edit-todo-assign-list').append(`
            <div class="position-relative">
                <div class="dashboard-tag-item font-12x item-align-center d-flex">
                    <img src="${assignphoto}" class="img-avatar h-20x mr-10x" alt="">
                    ${assignname}
                </div>
                <span photo="${assignphoto}" username="${assignval}" assignname="${assignname}" class="todo-assign-delete color-white text-align-center font-10x">x</span>
            </div>
        `);
        $("#edit-todo-add-assign-list option[value='" + assignval + "']").remove();
    }
    else {
        alert('All user have been used!')
    }
});

$(document).on('click', '.todo-assign-delete', function(){
    var assignval = $(this).attr('username');
    var assignname = $(this).attr('assignname');
    var assignphoto = $(this).attr('photo');
    $('#edit-todo-add-assign-list').append("<option photo=" + assignphoto + " value=" + assignval + ">"+ assignname + "</option>");
    assignlist.splice( $.inArray(assignval, assignlist), 1 );
    $(this).parent().remove();
});

$('#btn-edit-todo-add-tag').on('click', function(e){
    e.preventDefault();
    var tagval = $('#edit-todo-add-tag-list').find(":selected").val();
    if (tagval != null){
        taglist.push(tagval);
        var tagname = $('#edit-todo-add-tag-list').find(":selected").text();
        $('#edit-todo-tag-list').append(`
            <div class="position-relative">
                <div class="dashboard-tag-item font-12x">${tagname}</div>
                <span id=${tagval} tagname="${tagname}" class="todo-tag-delete color-white text-align-center font-10x">x</span>
            </div>
        `);
        $("#edit-todo-add-tag-list option[value='" + tagval + "']").remove();
    }
    else {
        alert('All tags have been used! Please create a new one!')
    }
});

$(document).on('click', '.todo-tag-delete', function(){
    var tagval = $(this).attr('id');
    var tagname = $(this).attr('tagname');
    $('#edit-todo-add-tag-list').append("<option value=" + tagval + ">"+ tagname + "</option>");
    taglist.splice( $.inArray(tagval, taglist), 1 );
    $(this).parent().remove();
});

$("#btn-new-tag").on('click', function(e){
    e.preventDefault();
    var tagname = $("#inpnewtag").val();
    if (tagname != ""){
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
                $('#edit-todo-tag-list').append(`
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
    }
    else alert("Please fill in the new tag name!");
});

$("#btn-edit-todo").on('click', function(e){
    var id = $('#inptodoid').val();
    var name = $('input[name="inptodotitle"]').val();
    var deadline = $('input[name="inptododeadline"]').val();
    var clientid = $('#inptodoclientid option:selected').val();
    var description = $('#inptododescription').val();

    // Edit todo 
    var token_name = $('input[name="_token"]').val();
    $.ajax({
        url: "/api/edittodo",
        type:"POST",
        data:{
            "_token": token_name,
            todoid: id,
            name: name,
            description: description,
            deadline: deadline,
            clients_id: clientid,
            assign: assignlist,
            tag: taglist,
        },
        success:function(response){
            e.preventDefault();
            $("#notification-edit-todo-success").removeClass("d-none");
            console.log(response.success);
        },
        error: function(response) {
            e.preventDefault();
            $("#notification-edit-todo-fail").removeClass("d-none");
            console.log("Error while editing todo");
        },
    });
});