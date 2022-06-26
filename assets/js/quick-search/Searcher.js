// import Fuse from 'fuse.js'
import fuzzysort from 'fuzzysort';

// SEARCH THROUGH ACTIONS
export default class Searcher {
	constructor(options = [], actions = []) {
		this.options = options;
		this.actions = actions;
		
		// let fuseSettings = {
		// 	keys: [
		// 		"keywords",
		// 	],
		// 	threshold: 0.2,
		// 	minMatchCharLength: 1,
		// 	ignoreLocation: true,
		// 	includeScore: true,
		// 	findAllMatches: true
		// };
		
		// merge actions into options
    
    this.optionsCopy = JSON.parse(JSON.stringify(options));

		for (let [index, option] of Object.entries(options)) {
			this.optionsCopy[index].action = actions[index];
		}
		
		// this.fuse = new Fuse(optionsCopy, fuseSettings);
		
	}
	
	search(query) {
    // flags
    if (this.isFlag(query, "all")) return this.getAll();

		let formatted = [];
		
		// let results = this.fuse.search(query);
		let results = fuzzysort.go(query, this.optionsCopy, {
			key: ["keywords"],
			threshold: -1000,
			limit: 30,
		})
		console.log(query, ...results);
		for (let result of results) {
			let action = JSON.parse(JSON.stringify(result.obj)); // ugly
			console.log(action);

			// let label = action.label + ".";

			// highlight
			const label = this.highlight(query, action.label);
			if (label) action.label = label;

			let tags = [];
			for(let tag of action.tags) {
				const higlighted =this.highlight(query, tag);
				tags.push(higlighted ? higlighted : tag);
			}
			action.tags = tags;

			// return
			formatted.push(action);
			
		}
		return formatted;
	}

	highlight(query, results) {
		const queryArr = query.split(" ");
		for(let queryWord of queryArr) {
			const highlight = fuzzysort.highlight(fuzzysort.single(queryWord, results), '[[', ']]');
			if (highlight) results = highlight;
		}
		results = results.replaceAll('[[', '<span class="qs-highlight">');
		results = results.replaceAll(']]', '</span>');
		return results;
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