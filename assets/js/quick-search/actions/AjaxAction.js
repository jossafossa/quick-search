import Action from "./Action.js";


// FIRE AJAX ACTION
export default class AjaxAction extends Action {
	constructor(settings) {
		super(settings);
		settings = Object.assign({
			action: false,
			suggestionsCallback: false
			
		}, settings);
		this.action = settings.action;
		this.suggestionsCallback = settings.suggestionsCallback;


		// init controllers
    this.executeController = new AbortController();
    this.suggestionController = new AbortController();

	}
	
	async execute() {
		
		// abort previous signal
    this.executeController.abort();
    this.executeController = new AbortController();
	this.executeSignal = this.executeController.signal;

		this.sendNotification(`Executing ${this.label}`);
		let result = this.wpAjax(this.action, {}, this.executeSignal).then(result => {
			console.log(result);
			this.sendSuccessNotification(`Response from ${this.label}: <br>${result.data}`);
		}).catch(result => {
			console.log(result);
			this.sendErrorNotification(`Response from ${this.label}: <br>${result.statusText}`);
		});
	}

	async getSuggestions(query) {

		// abort previous signal
    this.suggestionController.abort();
    this.suggestionController = new AbortController();
    this.suggestionSignal = this.suggestionController.signal;

		if (this.suggestionsCallback) {
			return wpAjax(this.suggestionsCallback, {
				query
			}, this.suggestionSignal);
		}
	}
	
	async wpAjax(action, body, signal) {
		return new Promise((resolve, reject) => {

			// Verify if the required variables are present
			if (!("wpAjaxUrl" in window)) {
				reject(this.formatResponse("Could not find ajax url"));
				return;
			}
			if (!("wpNonce" in window)) {
				reject(this.formatResponse("Could not verify nonce"));
				return; 
			}

			// fetch
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
					action,
					...body,
					security: window.wpNonce,
				})
			}).then(async rawResponse => {
				console.log(rawResponse);
				let response = await this.parseResponse(rawResponse);
				(response.ok) ? resolve(response) : reject(response);
			}).catch(async error => {
				reject(await this.formatResponse(error));
			});
		})
	}

	// formatResponse(response, message = false, data = []) {
	// 	return {
	// 		ok: response.ok,
	// 		statusText: message ? message : response.statusText,
	// 		code: response.ok,
	// 		data: data,
	// 	}
	// }

	async formatError(message) {
		return {
			status: error,
			ok: input.ok,
			statusText: input.statusText,
			data: false
		}
	}

	async parseResponse(input) {
		// formattedResponse
		let response = {
			status: input.status,
			ok: input.ok,
			statusText: input.statusText,
			data: false
		};

		// get data
		let result = await input.json();

		// console.log(result)

		// is wp_send_json_success or wp_send_json_error
		if (typeof result === "object") {

			// is wordpress response
			if ("success" in result) {


				// override with wordpress ok
				response.ok = result.success;
				
				// is formatted wordpress response
				if (!result.success && typeof result.data === "object") {

					// get formatted status text
					response.status = result.data[0].code;
					response.statusText = result.data[0].message;

				} else {

					// get raw status text
					response.statusText = "OK";
					let data = result.data;
					response.data = data;
					
				}
			} else {

				// response is object but not wordpress object
				response.data = result;

			}
		} else {

			// response is not object
			response.data = result;
		}

		
		console.log(response);

		return response;
	}
}