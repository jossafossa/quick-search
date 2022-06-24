// ACTION SELECT
export default class ActionSelector {
	constructor() {
		this.root = document.querySelector(".wpqs-actions");
		this.actions = [];
		let template = document.querySelector("#wpqs-action-template");
		this.actionTemplate = template.content.children[0];

		this.actionClickEvent = e => { };
	}

	getActionHTML(action) {
		let element = this.actionTemplate.cloneNode(true);
		let imageElement = element.querySelector(".wpqs-action-image");
		let title = element.querySelector(".wpqs-action-title");
		let tags = element.querySelector(".wpqs-action-tags");

		title.innerText = action.label;
		if ("icon" in action) {
			imageElement.src = action.icon;
		} else {
			imageElement.remove();
		}

		console.log("tags", tags);

		if ("tags" in action) {
			tags.append(...this.getTagElements(action.tags));
		}
		return element;
	}

	getTagElements(tags) {
		let all = [];
		for (let tag of tags) {
			let element = document.createElement("span");
			element.innerText = tag;
			all.push(element);
		}
		return all;
	}

	getSelected() {
		return this.selectedIndex;
	}

	select(index) {
		for (let action of this.actions) {
			action.classList.remove("is-selected");
		}

		if (this.actions.length > 0 && index < this.actions.length) {

			let action = this.actions[index];
			action.classList.add("is-selected");
			// console.log(this.actions, index, action);
			this.selectedIndex = index;
			this.actions[index].scrollIntoView(false);
		}
	}

	onActionClick(actionClickEvent) {
		this.actionClickEvent = actionClickEvent;
	}

	selectPrev() {
		let index = this.selectedIndex - 1 > 0 ? this.selectedIndex - 1 : 0;
		this.select(index);
	}

	selectNext() {
		let index = this.selectedIndex + 1 < this.actions.length ? this.selectedIndex + 1 : this.selectedIndex;
		this.select(index);
	}

	loadActions(actions) {
		// actions = actions.reverse();
		this.root.innerHTML = "";
		this.actions = [];
		for (let [index, action] of Object.entries(actions)) {
			let element = this.getActionHTML(action);
			this.root.appendChild(element);
			this.actions.push(element);

			element.addEventListener("mousedown", e => {
				this.actionClickEvent(index);
			});
		}

		this.select(0);
	}
}
