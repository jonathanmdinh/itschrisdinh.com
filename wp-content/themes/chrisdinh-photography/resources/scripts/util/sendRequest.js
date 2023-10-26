/**
 *
 * @param {String} url URL the request will be made to
 * @param {Object} fetchSettings An object of settings for the fetch request
 * @param {Object} data The data to be passed to the request URL
 * @returns {JSON}
 */
async function sendRequest( url, fetchSettings = {}, data = {} ) {

  // Set default settings for the fetch request
  const defaultSettings = {
      method: 'POST',
      body: data
  };

  // Replace any setting values with the fetchSettings object passed
  const settings = { ...defaultSettings, ...fetchSettings };

  const response = await fetch( url, settings );

  return response.json();
}

export default sendRequest;
