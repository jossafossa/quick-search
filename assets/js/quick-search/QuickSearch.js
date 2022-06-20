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
		this.options = options;
		for (let [index, option] of Object.entries(options)) {
			option.id = index;
		}



		// setup
		this.notifications = new NotificationDisplay();
		let actionFormatter = new ActionFormatter(this.notifications);
		
		this.actions = actionFormatter.format(this.options);  
    
    
		let searcher = new Searcher([...this.options], [...this.actions]);
    
		let input = document.querySelector(".qs-search-term");
		let inputListener = new InputListener(input);

		this.actionSelector = new ActionSelector();

		let popup = document.querySelector(".qs-action-popup");
		this.actionPopup = new ActionPopup(popup);
		
		this.actionHistory = new ActionHistory(this.notifications);


		



		// format actions
		this.actionResults = this.actionHistory.get();
		console.log(this.actionResults);


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
		})

		inputListener.on("Enter", e => {
			let index = this.actionSelector.getSelected();
			this.executeAtIndex(index);
		});
		
		this.actionSelector.onActionClick(index => {
			this.executeAtIndex(index);
		});

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
		inputListener.on("Escape", () => this.actionPopup.hide());
		inputListener.onBlur(() => this.actionPopup.hide())



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
