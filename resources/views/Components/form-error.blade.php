<!-- We need pass in the title - that'll be labelled as the name of this variable -->
@props(['name'])

<!-- name variable can be passed into the error directive -->

<!-- New error blade directive. reference the attribute name (title). If we have a validation error for the title
only on that condition should we procede -->
@error($name)
    <!-- Message variable is only available in error directive -->
    <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
@enderror