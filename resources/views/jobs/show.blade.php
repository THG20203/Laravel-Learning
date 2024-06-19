<x-layout>

    <x-slot:heading>
        Job
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job->title }}</h2>

    <p>This job pays {{ $job->salary }} per year.</p>

    <!-- if you can edit the job, (with 'edit-job' and passing in the particular job with the $job variable) 
    only should we show this mark up -->
    @can('edit', $job) 
    <p class="mt-6">
        <x-button href="/jobs/{{ $job-> id}}/edit">Edit Job</x-button>
    </p>
    @endcan

</x-layout>