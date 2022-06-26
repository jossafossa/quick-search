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
		console.log({action});
		// console.log("items before", [...items], action);
		// console.log(action.id, items[0].id);
		if (items.length > 0 && action.id === items[0].id) return;
		items.unshift(action);
		// console.log("items inbetween", [...items], action);

		if (items.length > this.max) {
			items.pop();
		}
		// console.log("items after", [...items], action);
		this.set(items);
	}
}
