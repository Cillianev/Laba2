$(function(){
    console.log('start');
    

    $('a#saveData').on('click ', function(event) { 
        event.preventDefault();
        console.log('clicked');
        var ajaxRequest;
        
        console.log('clicked end');
    });
    console.log('end');
});