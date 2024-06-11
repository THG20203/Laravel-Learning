<!-- Layout - custom html tag -->
<!-- x-nameOfComponent -->
<x-layout>
    <!-- Heading Slot -->
    <x-slot:heading>Home Page</x-slot:heading>

    <!-- Going to do a foreach with a blade directive -->
    @foreach ($jobs as $job)
        <!-- list item, where I echo out the job title -->
        <li><strong>{{ $job['title']}}:</strong> pays {{ $job['salary'] }} per year.</li>
    <!-- End of the foreach block -->
    @endforeach
</x-layout>