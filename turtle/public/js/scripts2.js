$(document).ready(function() {
    
    $(".sign_up_box").hide();
    $(".login_toggle").click(function(){
        console.log("clicked box");
            $(".sign_up_box").slideToggle();
    });
    
    
    $(".delete").hide();
    $(".delete_toggle").click(function(){
        console.log("clicked box");
            $(".delete").slideToggle();
    });
    
});


/*
$(document).ready(function() {
    
    $(".comment_post").hide();
    
    $(".comment_bulk").click(function(){
        console.log("clicked box");
        
            $(".comment_post").slideToggle();
    });
});
 
$(document).ready(function() {
    
    $(".comment_post2").hide();
    
    $(".comment_bulk2").click(function(){
        console.log("clicked box");
        
            $(".comment_post2").slideToggle();
    });
    
});*/


