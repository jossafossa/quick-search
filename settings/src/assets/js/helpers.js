export async function wpAjax(action, body, signal) {
  return new Promise((resolve, reject) => {

    // Verify if the required variables are present
    if (!("wpAjaxUrl" in window)) {
      reject("Could not find ajax url");
      return;
    }
    if (!("wpNonce" in window)) {
      reject("Could not verify nonce");
      return; 
    }

    // fetch
    fetch(window.wpAjaxUrl, {
      "headers": {
        "accept": "application/json, text/javascript, */*; q=0.01",
        "accept-language": "en-GB,en-US;q=0.9,en;q=0.8",
        "content-type": "application/x-www-form-urlencoded; charset=UTF-8",
        "x-requested-with": "XMLHttpRequest"
      },
      "dataType": "json",
      "referrerPolicy": "strict-origin-when-cross-origin",
      "method": "POST",
      "mode": "cors",
      "credentials": "include",
      signal,
      body: new URLSearchParams({
        action,
        ...body,
        security: window.wpNonce,
      })
    }).then(async response => resolve(await response.json()))
    .catch(async error => reject(error));
  })
}

export default {};