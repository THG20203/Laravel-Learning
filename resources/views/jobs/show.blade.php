<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
    <p>This job pays {{ $job['salary'] }} per year.</p>
    <p class="mt-6">
        <!-- Notice how {{ $job-> id}} is accessing them as properties, but above I'm using 
        array. Its because before I didn't know eloquent so will swap them over-->
        <x-button href="/jobs/{{ $job-> id}}/edit">Edit Job</x-button>
    </p>
</x-layout>