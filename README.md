# hackaday-skull-counter
Hackaday.io project skull counter
- Uses new hackaday.io API to automatically display skull counts for a given project
- Counter is considerate, stores the skull count in a csv file cache.  This allows skull count to be displayed without querying the API every time someone visits the page.
- Time interval can be set to determine the minimum time between fresh get requests to the API (default = 30 seconds)
- Remember, you have to register for your own API key here: https://dev.hackaday.io/applications
