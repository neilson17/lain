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