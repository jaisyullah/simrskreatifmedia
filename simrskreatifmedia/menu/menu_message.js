function scJs_alert_default(message) {
	alert(message);
} // scJs_alert_default

function scJs_confirm_default(message, callbackOk, callbackCancel) {
	if (confirm(message)) {
		callbackOk();
	}
	else {
		callbackCancel();
	}
} // scJs_confirm_default

function scJs_alert(message, params) {
	scJs_alert_default(message);
} // scJs_alert

function scJs_confirm(message, callbackOk, callbackCancel) {
	scJs_confirm_default(message, callbackOk, callbackCancel);
} // scJs_confirm

