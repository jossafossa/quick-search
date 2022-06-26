import Action from "./Action.js";


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
		console.log(location.href, this.url);
		if (location.href !== this.url) {
			location.replace(this.url);
			this.sendSuccessNotification("navigating to " + this.label);
		} else {
			this.sendErrorNotification("already at " + this.url);
		}
	}
}