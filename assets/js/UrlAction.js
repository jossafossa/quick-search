import Action from "./Action";

// GOTO URL ACTION
export default class UrlAction extends Action {
	constructor(settings) {
		super(settings);
		settings = Object.assign({
			url: window.location.href,
		}, settings);

		this.url = settings.url;
	}

	execute() {
		// console.log("navigating to " + this.label);
		this.sendNotification("navigating to " + this.label);
		window.location.href = this.url;
	}
}
