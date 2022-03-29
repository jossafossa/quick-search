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
		let items = this.getUnformatted();
		return this.actionFormatter.format([...items]);
	}

	set(items) {
		localStorage.setItem("actionHistory", JSON.stringify(items));
	}

	push(action) {
		let items = this.getUnformatted();
		// console.log("items before", [...items]);
		if (items.length > 0) {
			if (action.id === items[0].id)
				return;
		}
		items.unshift(action);

		if (items.length > this.max) {
			items.pop();
		}
		// console.log("items after", [...items]);
		this.set(items);
	}
}
