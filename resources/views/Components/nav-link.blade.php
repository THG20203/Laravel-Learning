<!-- Remember we shouldn't hard code the href this should be passed in from layout blade file -->

<!-- aria-current attribute is used to indicate the element that represents the current item within a container or set of elements,
so I've added a dynamic check in for it. Page if true and false if not true. -->

<!-- going to use this prop to check the variable - use $active variable -->
<!-- Because we are using $active variable there should be a default just in case its passed in when we reference the nav link. -->
<!-- hence: ["active" => false] -->

<!-- if you do not provide a prop you can assume its type a, an anchor tag. -->
@props(["active" => false, "type" => "a"])

<!-- For type check logic should split it into two tags? Use traditional php tags -> if type is a display, then if type = button display a 
button. -->
<?php if ($type === "a") : ?>
<a class="{{ $active ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" }} rounded-md px-3 py-2 text-sm font-medium" aria-current="{{ $active ? "page" : "false" }}" {{ $attributes }}> 
    <!-- slot to inside content into from the layout regarding the link title -->
    {{ $slot }} 
</a>
<!-- php else condition for button element -->
<?php else : ?>
<button  class="{{ $active ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" }} rounded-md px-3 py-2 text-sm font-medium" aria-current="{{ $active ? "page" : "false" }}" {{ $attributes }}> 
    <!-- slot to inside content into from the layout regarding the link title -->
    {{ $slot }} 
</button>
<!-- php close the conditional -->
<?php endif ?>