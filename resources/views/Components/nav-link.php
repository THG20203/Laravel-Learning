<!-- Slot technique to pass down information -->
<!-- All laravel blade components also have access to an attributes object -->
<a {{ $attributes }}>{{ $slot }}</a>