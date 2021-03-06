import NotificationDisplay from "./NotificationDisplay.js";
import ActionFormatter from "./ActionFormatter.js";
import Searcher from "./Searcher.js";
import InputListener from "./InputListener.js";
import ActionSelector from "./ActionSelector.js";
import ActionPopup from "./ActionPopup.js";
import ActionHistory from "./ActionHistory.js";


// MAIN
export default class QuickSearch {
	constructor(options, settings) {
		settings = Object.assign({
			shortcutValidator: e => e.code == "KeyX" && (e.metaKey || e.ctrlKey) && e.shiftKey
		}, settings)
		this.shortcutValidator = settings.shortcutValidator;

    // actions
		// this.options = Object.values(options); // hack
		this.options = options; // hack
		for (let [index, option] of Object.entries(options)) {
			option.id = index;
			option.keywords = [option.label, ...option.tags].join(" ");
		}
		this.options = Object.values(this.options);
		console.log(options);



		// setup
		this.notifications = new NotificationDisplay();
		let actionFormatter = new ActionFormatter(this.notifications);
		
		
		this.actions = actionFormatter.format(options);  
    
		console.log(this.actions);
    
		let searcher = new Searcher(this.actions);
    
		let input = document.querySelector(".qs-search-term");
		let inputListener = new InputListener(input);

		this.actionSelector = new ActionSelector();

		let popup = document.querySelector(".qs-action-popup");
		this.actionPopup = new ActionPopup(popup);
		
		this.actionHistory = new ActionHistory(this.notifications);


		// labels
		this.historyTitle = popup.querySelector("[data-qs-history-title]");
		this.clearHistory = popup.querySelector("[data-qs-clear-history]");
		this.searchTitle = popup.querySelector("[data-qs-search-title]");
		this.noneNotice = popup.querySelector("[data-qs-search-none]");


		



		// load initial history
		this.loadHistory();



		// setup listeners
		this.actionSelector.loadActions(this.actionResults);

		inputListener.onInput(value => {
			if (value.length > 0) {
				// search
				this.actionResults = searcher.search(value);
				this.actionSelector.loadActions(this.actionResults);

				// update labels
				this.historyTitle.classList.remove("qs-visible");
				this.searchTitle.classList.add("qs-visible");
				if (this.actionResults.length === 0) {
					this.noneNotice.classList.add("qs-visible");
				} else {
					this.noneNotice.classList.remove("qs-visible");
				}

			} else {	
				this.loadHistory();
			}
		})

		inputListener.on("Enter", e => {
			let index = this.actionSelector.getSelected();
			this.executeAtIndex(index);
		});
		
		this.actionSelector.onActionClick(index => {
			this.executeAtIndex(index);
		});
		this.actionSelector.actionSelectEvent = (index) => {
			this.prefetch(this.actions[this.indexToId(index)]);
		};

		inputListener.on("ArrowUp", action => this.actionSelector.selectPrev())
		inputListener.on("ArrowDown", action => this.actionSelector.selectNext())

		// open popup
		document.addEventListener("keydown", e => {
			if (this.shortcutValidator(e)) {
				e.preventDefault();
				this.actionPopup.show();
				inputListener.focus();
			}
		})
		
		let openButtons = document.querySelectorAll(".qs-open-search");
		for(let button of openButtons) {
			button.addEventListener("click", e => {
				inputListener.focus();
				this.actionPopup.show();
			})
		}
		
		// hide popup
		document.addEventListener("keydown", e => {
			if (e.key === "Escape") this.actionPopup.hide();
		});
		inputListener.onBlur(() => this.actionPopup.hide())


		// clear history
		this.clearHistory.addEventListener("click", e => {
			this.actionHistory.clearHistory();
			this.actionSelector.loadActions([]);
		});

	}

	
	prefetch(action) {
		// TODO: prefetch?
		// console.log(action);
		// if ('url' in action ) {
		// 	console.log({preload: action});
		// 	const prefetcher = document.createElement('link')
		// 	prefetcher.rel = 'prefetch'
		// 	prefetcher.href = action.url
		// 	document.head.appendChild(prefetcher)
		// }
	}
	
	loadHistory() {
		// load all
		this.actionResults = this.getActionsByKeys(this.actionHistory.get());
		console.log(this.actionHistory.get(), this.actionResults);
		this.actionSelector.loadActions(this.actionResults);

		console.log({asdasdasd: this.actionResults});

		// update labels
		this.historyTitle.classList.add("qs-visible");
		this.searchTitle.classList.remove("qs-visible");
		this.noneNotice.classList.remove("qs-visible");
	}

	getActionsByKeys(keys) {
		let actions = [];
		for(let key of keys) {
			if (key in this.actions) actions.push(this.actions[key]);
		}
		return actions;
	}
	
	indexToId(index) {
		console.log({actionResults: this.actionResults});
		return this.actionResults[index].id;
	}
	
	executeAtIndex(index) {
		console.log({index, results: this.actionResults })
		if (index < this.actionResults.length) {
			let id = this.actionResults[index].id;
			let action = this.actions[id];
			console.log(action);;
			action.execute();
			this.actionPopup.hide();
			this.actionHistory.push(id);
			this.loadHistory();
		} else {
			this.actionPopup.shake();
		}
	}

	addAction(id, action) {

	}
	
}

function addUrlAction(id, settings) {
	let action = Object.assign({
		"label": "label",
		"icon": "dashicons-admin-generic",
		"tags": [],
		"type": "url",
		"url": "/robots.txt",
	}, settings);
	
	// if qsActions is not initialized
	if (!("quickSearch" in window) ) {
		qsActions[id] = action;
	} else {
		window.quickSearch.addAction(id, action);
	}
	
}

addUrlAction('jossafossa', {
	label: 'jossafossa action',
	url: 'https://www.jossafossa.nl/'
})