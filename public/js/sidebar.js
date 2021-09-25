
$(".sidebar-toggler").click(function(e){
        e.stopPropagation();
        $('.sidebar-menu').toggleClass('show-sidebar')
})


$('body,html').click(function(){
    $('.sidebar-menu').removeClass('show-sidebar');
});
