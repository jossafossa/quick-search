import Fuse from 'fuse.js'

// SEARCH THROUGH ACTIONS
export default class Searcher {
	constructor(options = [], actions = []) {
		this.options = options;
		this.actions = actions;
		
		let fuseSettings = {
			keys: [
				"label",
				"tags"
			],
			threshold: 0.2,
			minMatchCharLength: 1,
			ignoreLocation: true,
			includeScore: true,
			// findAllMatches: true
		};
		
		// merge actions into options
    
    let optionsCopy = JSON.parse(JSON.stringify(options));

		for (let [index, option] of Object.entries(options)) {
			optionsCopy[index].action = actions[index];
		}
		
		this.fuse = new Fuse(optionsCopy, fuseSettings);
	}
	
	search(query) {
    // flags
    if (this.isFlag(query, "all")) return this.getAll();

		let formatted = [];
		
		let results = this.fuse.search(query);
		console.log(query, ...results);
		for (let result of results) {
			formatted.push(result.item.action);
		}
		return formatted;
	}

	isFlag(query, flag) {
		return [
			`$${flag}`, 
			`-${flag}`, 
			`--${flag}`, 
		].includes(query);
	}


	// flags
	getAll() {
		return this.actions;
	}
}