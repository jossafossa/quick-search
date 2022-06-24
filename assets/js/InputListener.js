export default class InputListener {
	constructor(input) {
		this.input = input;
		this.results = [];
		this.inputEvent = e => { };
		this.blurEvent = e => { };
		this.keys = {};

		this.input.addEventListener("input", e => {
			let value = this.input.value;
			this.inputEvent(value);
		});
		this.input.addEventListener("keydown", e => {
			for (let [key, callback] of Object.entries(this.keys)) {
				if (e.key == key) {
					e.preventDefault();
					callback(e);
				}
			}
			if (e.key === "Tab") {
				e.preventDefault();
			}
		});
		this.input.addEventListener("blur", e => {
			this.blurEvent();
		});
	}

	onBlur(blurEvent) {
		this.blurEvent = blurEvent;
	}

	focus() {
		this.input.focus();
		this.input.select();
	}

	on(key, callback) {
		this.keys[key] = callback;
	}

	onInput(inputEvent) {
		this.inputEvent = inputEvent;
	}
}
