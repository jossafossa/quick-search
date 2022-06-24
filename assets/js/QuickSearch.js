import ActionPopup from "./ActionPopup";
import NotificationDisplay from "./NotificationDisplay";
import ActionFormatter from "./ActionFormatter";
import Searcher from "./Searcher";
import InputListener from "./InputListener";
import ActionSelector from "./ActionSelector";
import ActionHistory from "./ActionHistory";

// MAIN
export default class QuickSearch {
	constructor(options) {
		this.dev = true;

		// actions
		this.options = options;
		for (let [index, option] of Object.entries(options)) {
			option.id = index;
		}

		// setup
		this.notifications = new NotificationDisplay();
		let actionFormatter = new ActionFormatter(this.notifications);

		this.actions = actionFormatter.format(this.options);
		console.log(this.options);

		let searcher = new Searcher([...this.options], [...this.actions]);

		let input = document.querySelector(".wpqs-search-term");
		let inputListener = new InputListener(input);

		this.actionSelector = new ActionSelector();

		let popup = document.querySelector(".wpqs-action-popup");
		this.actionPopup = new ActionPopup(popup);

		this.actionHistory = new ActionHistory(this.notifications);




		// format actions
		this.actionResults = this.actionHistory.get();
		// console.log(this.actionResults);
		// setup environment
		
		window.wpNonce = "ditte";
		window.wpAjaxUrl = "https://www.jossafossa.nl";

		// setup listeners
		this.actionSelector.loadActions(this.actionResults);

		inputListener.onInput(value => {
			if (value.length > 0) {
				// search
				this.actionResults = searcher.search(value);
				this.actionSelector.loadActions(this.actionResults);
			} else {
				// load all
				this.actionResults = this.actionHistory.get();
				this.actionSelector.loadActions(this.actionResults);
			}
		});

		inputListener.on("Enter", e => {
			let index = this.actionSelector.getSelected();
			this.executeAtIndex(index);
		});

		this.actionSelector.onActionClick(index => {
			this.executeAtIndex(index);
		});

		inputListener.on("ArrowUp", action => this.actionSelector.selectPrev());
		inputListener.on("ArrowDown", action => this.actionSelector.selectNext());

		// open popup
		document.addEventListener("keydown", e => {
			if (e.code == "KeyX" && e.metaKey && e.shiftKey) {
				e.preventDefault();
				this.actionPopup.show();
				inputListener.focus();
			}
		});

		let openButtons = document.querySelectorAll(".wpqs-open-search");
		for (let button of openButtons) {
			button.addEventListener("click", e => {
				inputListener.focus();
				this.actionPopup.show();
			});
		}

		// hide popup
		inputListener.on("Escape", action => this.actionPopup.hide());

		if (!this.dev) {

			inputListener.onBlur(e => this.actionPopup.hide());
		}
	}

	indexToId(index) {
		return parseInt(this.actionResults[index].id);
	}

	executeAtIndex(index) {
		if (index < this.actionResults.length) {
			let id = this.indexToId(index);

			console.log(this.options);
			this.actionResults[index].execute();
			this.actionPopup.hide();
			this.actionHistory.push(this.options[id]);
			this.actionResults = this.actionHistory.get();
			this.actionSelector.loadActions(this.actionResults);
		} else {
			this.actionPopup.shake();
		}
	}
}
