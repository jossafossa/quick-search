// import Fuse from 'fuse.js'
import fuzzysort from 'fuzzysort';
// import FuzzySearch from 'fuzzy-search';
import {deepCopy} from './helpers'

// SEARCH THROUGH ACTIONS
export default class Searcher {
	constructor(actions = []) {
		this.actions = actions;
		
		// console.log(this.options, this.actions);
		
		// merge actions into options
    // this.options = JSON.parse(JSON.stringify(this.options)); // ugly
    // this.actions = JSON.parse(JSON.stringify(this.actions)); // ugly

		// for (let [index, option] of Object.entries(options)) {
		// 	this.options[index].action = this.actions[option.id];
		// }
		// console.log(this.options);
	}
	
	getSearchable() {
		return Object.values(this.actions);
	}

	// fuzzySearch(query) {
	// 	let actionArr = this.getSearchable();
	// 	let searcher = new FuzzySearch(actionArr, ['keywords'], {
	// 		caseSensitive: true,
	// 		sort: true,

	// 	});

	// 	let results = searcher.search(query);
		
	// 	let formatted = [];

	// 	for (let result of results) {
	// 		let action = deepCopy(this.actions[result.id]);
	// 		console.log(this.actions, result.id, action);

	// 		// highlight
	// 		const label = this.highlight(query, action.label);
	// 		if (label) action.label = label;

	// 		let tags = [];
	// 		for(let tag of action.tags) {
	// 			const higlighted =this.highlight(query, tag);
	// 			tags.push(higlighted ? higlighted : tag);
	// 		}
	// 		action.tags = tags;
			
	// 		action.matchedChars = 

	// 		// return
	// 		formatted.push(action);
			
	// 	}

	// 	return formatted;
	// }
	

	fuzzysort(query) {

		let formatted = [];

		console.log(this.actions);
		
		// let results = this.fuse.search(query);
		let actionArr = this.getSearchable();
		let results = fuzzysort.go(query, actionArr, {
			keys: ["keywords"],
			threshold: -100,
			limit: 30,
		})

		for (let result of results) {
			let action = deepCopy(this.actions[result.obj.id]);
			let length = 0;
			console.log(result)

			// highlight
			let highlight = this.highlight(query, action.label);
				length+= highlight.length;
				const label = highlight.results;
			if (label) action.label = label;

			let tags = [];
			for(let tag of action.tags) {
				let tagHighlight = this.highlight(query, tag);
				const higlighted = tagHighlight.results;
				length+= tagHighlight.length;
				tags.push(higlighted ? higlighted : tag);
			}
			action.tags = tags;
			action.count = length;

			// return
			formatted.push(action);
		}

		formatted = formatted.sort((a, b) => (a.count < b.count) ? 1 : -1);

		return formatted;
	}
	
	search(query) {
		// flags
		if (this.isFlag(query, "all")) return this.getAll();

   return this.fuzzysort(query);
	}

	highlight(query, results) {
		const queryArr = query.split(" ");
		let length = 0;
		for(let queryWord of queryArr) {
			const highlight = fuzzysort.highlight(fuzzysort.single(queryWord, results), '[[', ']]');
			if (highlight) {
				results = highlight;
				length += [...highlight.matchAll(/\[\[.*\]\]/g)].join("").length;
			}
		}
		results = results.replaceAll('[[', '<span class="qs-highlight">');
		results = results.replaceAll(']]', '</span>');
		return {results, length};
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