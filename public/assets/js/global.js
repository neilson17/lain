if(performance.navigation.type == 2){
    location.reload(true);
}

$("#hamburger-menu").on('click', function(){
    $("#sidebar").css('display', 'unset');
    $("#close-hamburger").css('display', 'unset');
    $(".home").css('height', '100vh');
    $(".home").css('overflow', 'hidden');
    $(".dashboard-tag-item").css('display', 'none');
    $(".todo-tag-delete").css('display', 'none');
    $(".todo-assign-delete").css('display', 'none');
    $(".input-datetime").css('display', 'none');
});

$("#close-hamburger").on('click', function(){
    $("#sidebar").css('display', 'none');
    $("#close-hamburger").css('display', 'none');
    $(".home").css('height', 'unset');
    $(".home").css('overflow', 'unset');
    $(".dashboard-tag-item").css('display', 'flex');
    $(".todo-tag-delete").css('display', 'unset');
    $(".todo-assign-delete").css('display', 'unset');
    $(".input-datetime").css('display', 'unset');
});