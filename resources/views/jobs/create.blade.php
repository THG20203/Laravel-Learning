<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>
<!-- Form functionality -->
<form method="POST" action="/jobs">
    <!-- blade directive at the top of the file -->
    @csrf
    
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Create a new job</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">We just need a handful of details from you.</p>
  
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          
          <!-- Title of Job - Form Field -->
          <x-form-field>
            <x-form-label for="title">Title</x-form-label>
            <div class="mt-2">
              <!-- Form Input -->
              <x-form-input id="title" name="title" placeholder="CEO" />
              <!-- Form error component -->
              <x-form-error name="title" />
            </div>
          </x-form-field>

           <!-- Title of Salary - Form Field -->
           <x-form-field>
            <x-form-label for="title">Salary</x-form-label>
            <div class="mt-2">
              <!-- Form Input -->
              <x-form-input id="salary" name="salary" placeholder="$50,000" />
              <!-- Form error component -->
              <x-form-error name="salary" />
            </div>
          </x-form-field>

        </div>
      </div>
    </div>
  
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
      <x-form-button></x-form-button>
    </div>
  </form>
  
</x-layout>