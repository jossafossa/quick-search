// GENERIC ACTION
export default class Action {
	constructor(settings) {
		settings = Object.assign({
			label: "No label",
			type: "action",
			notifications: false,
			id: 0,
			tags: [],
		}, settings);
		this.label = settings.label;
		this.type = settings.type;
		this.notifications = settings.notifications;
		this.id = settings.id;
		this.tags = settings.tags;
	}

	execute() {
		this.sendNotification("executing " + this.label);
	}

	sendNotification(text) {
		if (this.notifications) {
			this.notifications.showText(text);
		}
	}
}
