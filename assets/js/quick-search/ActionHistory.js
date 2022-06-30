import ActionFormatter from "./ActionFormatter.js";

// history
export default class ActionHistory {
	constructor(notifications) {
		this.max = 20;
		this.actionFormatter = new ActionFormatter(notifications);
	}

	getUnformatted() {
		return localStorage.getItem("actionHistory") !== null ? JSON.parse(localStorage.getItem("actionHistory")) : [];
	}

	get() {
		return this.getUnformatted();
	}

	set(items) {
		localStorage.setItem("actionHistory", JSON.stringify(items));
	}

	push(actionId) {
		let items = this.getUnformatted();
		console.log({actionId});
		if (items.length > 0 && actionId === items[0]) return;
		items.unshift(actionId);

		if (items.length > this.max) {
			items.pop();
		}
		this.set(items);
	}

	clearHistory() {
		this.set([]);
	}
}
