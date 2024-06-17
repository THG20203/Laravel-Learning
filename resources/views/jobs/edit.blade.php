<x-layout>
    <x-slot:heading>
        Edit Job: {{ $job->title }}
    </x-slot:heading>
<!-- Form functionality -->
<form method="POST" action="/jobs/{{ $job->id }}">
    <!-- blade directive at the top of the file -->
    @csrf
    <!-- blade directive to turn my post request into a patch -->
    @method('PATCH')
    
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
  
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <!-- Title of Job -->
          <div class="sm:col-span-4">
            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
            <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <input type="text" name="title" id="title" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Example Job" value="{{ $job->title}}" required>
              </div>
                 <!-- New error blade directive. reference the attribute name (title). If we have a validation error for the title
                  only on thatt condition should we procede -->
                  @error('title')
                    <!-- Message varialbe is only available in error directive -->
                    <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                  @enderror
            </div>
          </div>
            <!-- Salary of Job -->
            <div class="sm:col-span-4">
                <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                <div class="mt-2">
                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <input type="text" name="salary" id="salary" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="$50,000 per year" value="{{ $job->salary}}" required>
                  </div>
                  @error('salary')
                  <!-- Message varialbe is only available in error directive -->
                  <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                @enderror
                </div>
            </div>
        </div>

        <!-- One method of validation -->
        {{--
        <div class="mt-10">
          @if($errors->any()) 
             If there are any validation errors, lets loop over them and display them in list items
            <ul>
              @foreach($errors->all() as $error)
                <li class="text-red-500 italic">{{ $error }}</li>
              @endforeach
            </ul>
          @endif
        </div>
        --}}
        
      </div>
    </div>
  
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <div></div>
      <a href="/jobs/{{ $job->id }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
    </div>
  </form>
  
</x-layout>