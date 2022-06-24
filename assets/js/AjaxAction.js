import Action from "./Action";

// FIRE AJAX ACTION
export default class AjaxAction extends Action {
	constructor(settings) {
		super(settings);
		settings = Object.assign({
			action: false,
		}, settings);
		this.action = settings.action;
	}

	async execute() {
		this.sendNotification("firing " + this.label);
		let result = this.wpAjax().then(result => {
			this.sendNotification(result);
		}).catch(result => {
			this.sendNotification(result);
		});
	}

	async wpAjax(action, body, signal) {
		return new Promise((resolve, reject) => {
			if ("wpAjaxUrl" in window && this.action && "wpNonce" in window) {
				fetch(window.wpAjaxUrl, {
					"headers": {
						"accept": "application/json, text/javascript, */*; q=0.01",
						"accept-language": "en-GB,en-US;q=0.9,en;q=0.8",
						"content-type": "application/x-www-form-urlencoded; charset=UTF-8",
						"x-requested-with": "XMLHttpRequest"
					},
					"dataType": "json",
					"referrerPolicy": "strict-origin-when-cross-origin",
					"method": "POST",
					"mode": "cors",
					"credentials": "include",
					signal,
					body: new URLSearchParams({
						action: this.action,
						...body,
						security: window.wpNonce,
					})
				}).then(e => resolve("[Successfully executed]" + this.label + "]"))
					.catch(e => reject("[Failed to executed]" + this.label + "] " + e));
			} else {
				reject("[Failed to execute " + this.label + "] Could not verify ajax call");
			}
		});
	}
}
