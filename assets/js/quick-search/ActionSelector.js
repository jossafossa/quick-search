
// ACTION SELECT
export default class ActionSelector {
	constructor() {
		this.root = document.querySelector(".qs-actions");
		this.actions = [];
		let template = document.querySelector("#qs-action-template")
		this.actionTemplate = template.content.children[0];
		
		this.actionClickEvent = e => {};
	}
	
	getActionHTML(action) {
		let element = this.actionTemplate.cloneNode(true);
		let iconElement = element.querySelector(".qs-action-icon");
		let imageTitle = element.querySelector(".qs-action-title");
		let tagsElement = element.querySelector(".qs-action-tags");
		
		imageTitle.innerHTML = action.label;
		// console.log({action});
		for (let tag of action.tags) {
			tagsElement.innerHTML+= `<span>${tag}</span>`;
		}
		if (action.icon) {
			iconElement.classList.add(action.icon);
		} else {
			iconElement.remove();
		}
		return element;
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
		for (let [index ,action] of Object.entries(actions)) {
			let element = this.getActionHTML(action);
			this.root.appendChild(element);
			this.actions.push(element);
			
			element.addEventListener("click", e => {
				this.actionClickEvent(index);
			})
		}
		
		this.select(0);
	}
}
