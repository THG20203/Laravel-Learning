<!-- Laravel out of the box include a request() helper function. You can call it to obtain information about the current 
request. One of the methods on the request() object is is(). is() allows us to pass a regular expression, a pattern - 
so if is("/") if the is method has / as a parameter (home page) then apply the active styling -->

<!-- Remember we shouldn't hard code the href this should be passed in -->
<a class="{{ request()->is("/") ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" }} rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>