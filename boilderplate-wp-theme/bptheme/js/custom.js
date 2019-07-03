$("#adminAjaxTest").on('submit',(function(e) {
    e.preventDefault();    //stop form from submitting

    let nonce = $('input#nonce').val();
    let action = $('input#action').val();

    let firstName = $('input#fname').val();
    let lastName = $('input#lname').val();
    let emailAddress = $('input#emailaddr').val();
    let messageBody = $('textarea#msg').val();

    $('#msgs').html('');

    let formElem = $(this);
    $.ajax({
        type : 'post',
        dataType : "json",
        url : dataxObj.ajaxurl,
        data : {action: action, first_name: firstName, last_name: lastName, email: emailAddress, message: messageBody, nonce: nonce},
        beforeSend : function(){
            $('#errors').html(''); // could do this further up on the click event,
            console.log('Preparing to make AJAX call.');
        },
        success: function(response) {
            if(response.msg) {
                $('#msgs').html(response.msg);
            }
            // response = JSON.parse(response);
            console.log(response);
            if(response.status == 'success'){
                alert('Saved');

            } else {
                alert('Try again');
                alert('YOU ARE A FAILURE');
            }
        },
        error: function(xhr) {
            alert("Error occured. Check console log for output.");
            console.log(xhr.statusText + ': ' +xhr.responseText);
        },
    });
}));