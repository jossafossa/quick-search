

// GENERIC ACTION
export default class Action {
	constructor(settings) {
		settings = Object.assign({
			label: "No label",
			type: "action",
			notifications: false,
			id: 0,
			icon: false,
			tags: [],
		}, settings)
		this.label = settings.label;
		this.type = settings.type;
		this.notifications = settings.notifications;
		this.id = settings.id;
		this.icon = settings.icon;
		this.tags = settings.tags;
		// this.keywords = [this.label, ...this.tags].join(" ");
	}
		
	execute() {
		this.sendNotification("executing " + this.label);
	}

  sendErrorNotification(text) {
		if (this.notifications) {
			this.notifications.showText(text, false, ["is-error"]);
		}
  }

  sendSuccessNotification(text) {
		if (this.notifications) {
			this.notifications.showText(text, false, ["is-success"]);
		}
  }
	
	sendNotification(text) {
		if (this.notifications) {
			this.notifications.showText(text);
		}
	}
}