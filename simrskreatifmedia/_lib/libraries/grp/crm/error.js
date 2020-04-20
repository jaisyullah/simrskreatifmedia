function scDisplayUserError(errorMessage) {
	alert("ERROR\r\n" + errorMessage.replace(/<br \/>/gi, "\n"));
}
function scDisplayUserDebug(debugMessage) {
	alert("DEBUG\r\n" + debugMessage.replace(/<br \/>/gi, "\n"));
}