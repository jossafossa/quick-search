import UrlAction from "./actions/UrlAction.js";
import AjaxAction from "./actions/AjaxAction.js";

// ACTION FORMATTER
export default class ActionFormatter {
	constructor(notifications) {
		this.notifications = notifications;
	}
	format(actions ) {
		let formatted = {};
		for (let [index, action] of Object.entries(actions)) {

			let formattedAction = {...action};
			formattedAction.notifications = this.notifications;
			

			if (action.type === "url") formatted[index] = new UrlAction(formattedAction);
			if (action.type === "ajax") formatted[index] = new AjaxAction(formattedAction);
		}
		return formatted;
	}
}
