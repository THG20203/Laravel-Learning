<!-- Layout - custom html tag -->
<!-- x-nameOfComponent -->
<x-layout>
    <!-- Heading Slot -->
    <x-slot:heading>Jobs Page</x-slot:heading>

    <div class="space-y-4">
        <!-- Going to do a foreach with a blade directive -->
        @foreach ($jobs as $job)
                <!-- <a> tag to take me to a new route. Identifier in place for 'said route' -->
                <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                    <strong>{{ $job['title']}}:</strong> Pays {{ $job['salary'] }} per year.
                </a>
        <!-- End of the foreach block -->
        @endforeach
    </div>

</x-layout>