import QuickSearch from "./quick-search/QuickSearch.js";





function docReady(fn) {
  // see if DOM is already available
  if (document.readyState === "complete" || document.readyState === "interactive") {
    // call on next available tick
    setTimeout(fn, 1);
  } else {
    document.addEventListener("DOMContentLoaded", fn);
  }
}    

docReady(e => {

	let options = qsActions;
	
  window.quickSearch = new QuickSearch(options);
})



// setup environment
window.wpNonce = qsData.nonce;
window.wpAjaxUrl = ajaxurl;