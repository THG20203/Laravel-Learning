<!-- Laravel out of the box include a request() helper function. You can call it to obtain information about the current 
request. One of the methods on the request() object is is(). is() allows us to pass a regular expression, a pattern - 
so if is("/") if the is method has / as a parameter (home page) then apply the active styling -->

<!-- Remember we shouldn't hard code the href this should be passed in from layout blade file -->

<!-- aria-current attribute is used to indicate the element that represents the current item within a container or set of elements,
so I've added a dynamic check in for it. Page if true and false if not true. -->

<!------------ BLADE LOGIC FOR THE LOGIC OF CHECKING ACTIVE PAGE ------------------->
@props(["active"])

<a class="{{ request()->is("/") ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" }} rounded-md px-3 py-2 text-sm font-medium" aria-current="{{ request()->is("/") ? "page" : "false" }}" {{ $attributes }}> 
    <!-- slot to inside content into from the layout regarding the link title -->
    {{ $slot }} 
</a>