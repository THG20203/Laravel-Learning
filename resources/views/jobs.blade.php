<!-- Layout - custom html tag -->
<!-- x-nameOfComponent -->
<x-layout>
    <!-- Heading Slot -->
    <x-slot:heading>Jobs Page</x-slot:heading>

    <!-- Adding ul browser automatically adds it but adding it AROUND foreach for good practice -->
    <ul>
        <!-- Going to do a foreach with a blade directive -->
        @foreach ($jobs as $job)
            <!-- list item, where I echo out the job title -->
            <li>
                <!-- <a> tag to take me to a new route. Identifier in place for 'said route' -->
                <a href="/jobs/">
                    <strong>{{ $job['title']}}:</strong> pays {{ $job['salary'] }} per year.
                </a>
            </li>
        <!-- End of the foreach block -->
        @endforeach
    </ul>
</x-layout>