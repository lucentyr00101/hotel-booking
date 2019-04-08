$(function() {
    let controller = new slidebars()
    controller.init()
    // Toggle Slidebars
    $('#toggleSidebar').on( 'click', function ( event ) {
        // Stop default action and bubbling
        event.stopPropagation();
        event.preventDefault();
    
        // Toggle the Slidebar with id 'id-1'
        controller.toggle('slidebar-1');
    });


    //toggle dropdown of sidebar per menu item
    $("#menu a").click(function(event){
        if($(this).next('ul').length){
            event.preventDefault();
            $(this).next().toggle('fast');
            $(this).children('i:last-child').toggleClass('fa-caret-down fa-caret-left');
        }
    });
})