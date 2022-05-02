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
    var password = $("#textPassword").val()
    $.ajax({
        method:'POST',
        url:"api/login",
        data:'_token= <?php echo csrf_token() ?> &username='+username + ' &password='+password,
        success: function(data){
            alert(data.msg);
            // if (data.res == "YES") window.location.href = "dashboard";
            // else alert("Wrong username or password");
        }
        });
});

// ========================================================================
// Add Todo
// ========================================================================

var taglist = [];
$('#add-todo-add-tag').on('click', function(){
    var tagval = $('#add-todo-add-tag-list').find(":selected").val();
    if (tagval != null){
        taglist.push(tagval);
        var tagname = $('#add-todo-add-tag-list').find(":selected").text();
        $('#add-todo-tag-list').append(`
            <div class="position-relative">
                <div class="dashboard-tag-item font-12x">${tagname}</div>
                <span class="todo-tag-delete color-white text-align-center font-10x">x</span>
            </div>
        `);
        $("#add-todo-add-tag-list option[value='" + tagval + "']").remove();
        alert(taglist);
    }
    else {
        alert('All tags have been used! Please create a new one!')
    }
});

$(document).on('click', '.todo-tag-delete', function(){
    $(this).parent().remove();
});