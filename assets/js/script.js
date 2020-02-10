$(function(){
    console.log('start');
    

    $('a#saveData').on('click ', function(event) { 
        event.preventDefault();
        console.log('clicked');
        var ajaxRequest;

        /* Send the data using post and put the results in a div. */
        /* I am not aborting the previous request, because it's an
        asynchronous request, meaning once it's sent it's out
        there. But in case you want to abort it you can do it
        by abort(). jQuery Ajax methods return an XMLHttpRequest
        object, so you can just use abort(). */
        var values = $("form#gameData").serialize();
        ajaxRequest= $.ajax({
                url: "includes/hangman.php",
                type: "post",
                data: values
            });

        /*  Request can be aborted by ajaxRequest.abort() */
        ajaxRequest.done(function (response, textStatus, jqXHR){
            // Show successfully for submit message
            $("#result").html('Data is saved.');
        });

        /* On failure of request this function will be called  */
        ajaxRequest.fail(function (){
            // Show error
            $("#result").html('There is error while submit');
        });
        console.log('clicked end');
    });
    console.log('end');
});