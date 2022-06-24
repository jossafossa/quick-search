// ACTION POPUP
export default class ActionPopup {
	constructor(element) {
		this.root = element;
		this.shakeTimeout = null;
	}

	show() {
		this.root.classList.add("is-active");
	}

	hide() {
		this.root.classList.remove("is-active");
	}

	shake() {
		this.root.classList.add("is-shaking");
		clearTimeout(this.shakeTimeout);
		this.shakeTimeout = setTimeout(() => {
			this.root.classList.remove("is-shaking");
		}, 500);
	}
}
