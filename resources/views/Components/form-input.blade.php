<div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
    <!-- All the attributes are going to be passed to this child input. Default type for an input is text already, so deleted that. Name and
    id are passed in -->

    <!-- $attributes variable captures any additional attributes passed to the component. -->
    <!-- ->merge([...]): This method merges the captured attributes with the predefined ones. If there are any overlapping attributes, 
    the ones passed to the component will override the defaults. -->
    
    <input {{ $attributes->merge(['class' => 'block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6']) }}>
</div>