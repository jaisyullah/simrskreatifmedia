var alertMessage = $('.alert-message');

$('.alert-message .close').click(function(){
    $('.alert-message').removeClass('active');
})

function scDisplayUserError(errorMessage) {
    alertMessage.addClass('active').find('.message').html("ERROR\r\n" + errorMessage.replace(/<br \/>/gi, "\n"));
}

function scDisplayUserDebug(debugMessage) {
    alertMessage.addClass('active').find('.message').html("DEBUG\r\n" + debugMessage.replace(/<br \/>/gi, "\n"));
}

function scDisplayUserMessage(userMessage) {
    alertMessage.addClass('active').find('.message').html("MESSAGE\r\n" + userMessage.replace(/<br \/>/gi, "\n"));
}