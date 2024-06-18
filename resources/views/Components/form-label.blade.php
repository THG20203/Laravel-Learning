<!-- Dynamic Attribute Merging: The merge method allows for dynamic addition and merging of attributes, ensuring the 
component is flexible and can be customized as needed. -->

<!-- Default Styling: By providing a default class attribute, the component ensures a consistent base styling that 
can be extended. -->
<label {{ $attributes->merge(['class' => "block text-sm font-medium leading-6 text-gray-900"]) }}>{{ $slot }}</label>
