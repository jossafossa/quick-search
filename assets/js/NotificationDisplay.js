// NOTIFICATIONS
export default class NotificationDisplay {
	constructor() {
		this.element = document.createElement("div");
		this.element.classList.add("wpqs-popup");
		document.body.appendChild(this.element);

		this.container = document.createElement("div");
		this.container.classList.add("wpqs-popup-container");
		document.body.appendChild(this.container);

		this.timeout = 4000;
		this.timer;
	}

	async wait(time) {
		return new Promise((resolve, reject) => {

			setTimeout(e => {
				resolve();
			}, time);
		});
	}

	async showText(text, image = false, classes = []) {
		let element = document.createElement("div");
		element.classList.add("wpqs-notification");
		classes.forEach(e => { element.classList.add(e); });
		element.innerHTML = "";
		element.innerHTML += (image) ? `<img src=${image}></img>` : "";
		element.innerHTML += `<span>${text}</span>`;
		this.container.appendChild(element);

		await this.wait(20);
		element.classList.add("is-active");

		await this.wait(this.timeout);
		element.classList.remove("is-active");

		await this.wait(1000);
		element.remove();
	}

	show() {
		this.element.classList.add("active");
	}

	hide() {
		this.element.classList.remove("active");
	}
}
