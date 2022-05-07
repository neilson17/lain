// ========================================================================
// Add Todo
// ========================================================================
window.onload = () => {
    var addSuccess = sessionStorage.getItem("add-client-success");
    if (addSuccess){
        sessionStorage.removeItem("add-client-success");
        $("#notification-add-client-success").removeClass("d-none");
    }
}


$("#btn-new-client").on('click', function(e){
    var fd = new FormData();
    var files = $('#inpclientphotourl').files;

    if (files.length > 0) {
        fd.append('file', files[0]);
    }
    console.log(fd);

    var name = $('input[name="inpclientname"]').val();
    var description = $('#inpclientdescription').val();
    var jobcategories = $('#inpclientjobcategories option:selected').val();
    var deadline = $('input[name="inpclientdeadline"]').val();
    var email = $('input[name="inpclientemail"]').val();
    var phonenumber = $('input[name="inpclientphonenumber"]').val();
    var instagram = $('input[name="inpclientinstagram"]').val();
    var linkedin = $('input[name="inpclientlinkedin"]').val();
    // var photourl = $('input[name="inpclientphotourl"]').val();

    // Add new todo to db
    var token_name = $('input[name="_token"]').val();
    $.ajax({
        url: "/api/addclient",
        type:"POST",
        data:{
            "_token": token_name,
            name: name,
            description: description,
            jobcategories: jobcategories,
            deadline: deadline,
            email: email,
            phonenumber: phonenumber,
            instagram: instagram,
            linkedin: linkedin,
            photourl: fd,
        },
        success:function(response){
            console.log(response.success);
            sessionStorage.setItem("add-client-success", "true");
            location.reload();
        },
        error: function(response) {
            e.preventDefault();
            $("#notification-add-client-fail").removeClass("d-none");
            console.log("Error while adding client");
        },
    });
});