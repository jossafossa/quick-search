

// NOTIFICATIONS
export default class NotificationDisplay {
	constructor() {
		this.element = document.createElement("div");
		this.element.classList.add("popup");
		document.body.append(this.element);

		this.container = document.createElement("div");
		this.container.classList.add("qs-popup-container");
		document.body.append(this.container);

		this.timeout = 8000;
		this.timer;
	}
	
	async wait(time) {
		return new Promise((resolve, reject) => {
			
			setTimeout(e => {
				resolve();
			}, time)
		}) 
	} 

	async showText(text, image = false, classes = []) {
		let element = document.createElement("div");
		element.classList.add("notification");
		classes.forEach(e => {element.classList.add(e); });
		element.innerHTML = "";
		element.innerHTML += (image) ? `<img src=${image}></img>` : "";
		element.innerHTML += `<span>${text}</span>`;
		let close = document.createElement("i");
		element.append(close);
		this.container.appendChild(element);

		// enable click to close
		close.addEventListener("click", () => element.classList.remove("is-active"));
		
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
