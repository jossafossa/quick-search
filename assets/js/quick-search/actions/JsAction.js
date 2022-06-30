import Action from "./Action.js";


// FIRE AJAX ACTION
export default class JSAction extends Action {
	constructor(settings) {
		super(settings);
		settings = Object.assign({
      callback: () => {}
		}, settings);
		this.callback = settings.callback;
	}
	
	async execute() {
		this.sendNotification(`Executing ${this.label}`);
		let result = this.callback().then(result => {
			this.sendSuccessNotification(`[200] Response from ${this.label}: <br> ${result}`);
		}).catch(err => {
			this.sendErrorNotification(`[404] Response from ${this.label}: <br>${err}`);
		});
	}
}