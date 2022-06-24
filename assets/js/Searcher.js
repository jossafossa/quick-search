import Fuse from 'fuse.js';

// SEARCH THROUGH 
export default class Searcher {
	constructor(options = [], actions = []) {
		this.options = options;
		this.actions = actions;

		console.log(this.options, this.actions);

		let fuseSettings = {
			keys: [
				"label",
				"tags"
			],
			threshold: 0.2,
			minMatchCharLength: 1,
			// ignoreLocation: true,
			includeScore: true,
			// findAllMatches: true
		};

		// merge actions into options
		for (let [index, option] of Object.entries(options)) {
			options[index].action = actions[index];
		}

		this.fuse = new Fuse(this.options, fuseSettings);
	}

	search(query) {
		let formatted = [];

		let results = this.fuse.search(query);
		console.log(query, ...results);
		for (let result of results) {
			formatted.push(result.item.action);
		}
		return formatted;
	}
}
