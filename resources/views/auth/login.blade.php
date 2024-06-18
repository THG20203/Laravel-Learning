<x-layout>
    <x-slot:heading>
        Login
    </x-slot:heading>
<!-- Form functionality -->
<form method="POST" action="/jobs">
    <!-- blade directive at the top of the file -->
    @csrf
    
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          
        </div>
      </div>
    </div>
  
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <!-- This can be a simple link takes you back to the home page -->
      <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
      <x-form-button>Register</x-form-button>
    </div>
  </form>
  
</x-layout>