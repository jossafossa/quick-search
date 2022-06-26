// import Fuse from 'fuse.js'
import fuzzysort from 'fuzzysort';

// SEARCH THROUGH ACTIONS
export default class Searcher {
	constructor(options = [], actions = []) {
		this.options = options;
		this.actions = actions;

		console.log(this.options, this.actions);
		
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
    
    this.optionsCopy = JSON.parse(JSON.stringify(this.options));

		for (let [index, option] of Object.entries(options)) {
			this.optionsCopy[index].action = actions[option.id];
		}
		console.log(this.optionsCopy);
		
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
		for (let result of results) {
			let action = result.obj.action; // ugly
			console.log(action);

			// let label = action.label + ".";

			// highlight
			const label = this.highlight(query, result.obj.label);
			if (label) action.label = label;

			let tags = [];
			for(let tag of result.obj.tags) {
				const higlighted =this.highlight(query, tag);
				tags.push(higlighted ? higlighted : tag);
			}
			action.tags = tags;

			// return
			formatted.push(action);
			
		}

		console.log(this.actions);
		console.log(formatted);
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