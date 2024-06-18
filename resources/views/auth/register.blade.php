<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>
<!-- Form functionality -->
<form method="POST" action="/jobs">
    <!-- blade directive at the top of the file -->
    @csrf
    
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <!-- First Name -->
          <x-form-field>
            <!-- label section -->
            <x-form-label for="first_name">First Name</x-form-label>
            <!-- input and error section --> 
            <div class="mt-2">
                <x-form-input name="first_name" id="first_name" required />
                <x-form-error name="first_name" />
            </div>
          </x-form-field>

          <!-- Last Name -->
          <x-form-field>
            <!-- label section -->
            <x-form-label for="last_name">Last Name</x-form-label>
            <!-- input and error section --> 
            <div class="mt-2">
                <x-form-input name="last_name" id="last_name" required />
                <x-form-error name="last_name" />
            </div>
          </x-form-field>

          <!-- Email -->
          <x-form-field>
            <!-- label section -->
            <x-form-label for="email">Email</x-form-label>
            <!-- input and error section -->
            <div class="mt-2">
                <!-- On email overwriting the type to make it email -->
                <x-form-input name="email" id="email" type="email" required />
                <x-form-error name="email" />
            </div>
          </x-form-field>

          <!-- Password -->
          <x-form-field>
            <!-- label section -->
            <x-form-label for="password">Password</x-form-label>
            <!-- input and error section -->
            <div class="mt-2">
                <!-- On email overwriting the type to make it email -->
                <x-form-input name="password" id="password" type="password" required />
                <x-form-error name="password" />
            </div>
          </x-form-field>

          <!-- Password Confirmation -->
          <x-form-field>
            <!-- label section -->
            <x-form-label for="password_confirmation">Confirm Password</x-form-label>
            <!-- input and error section -->
            <div class="mt-2">
                <!-- On email overwriting the type to make it email -->
                <x-form-input name="password_confirmation" id="password_confirmation" type="password_confirmation" required />
                <x-form-error name="password_confirmation" />
            </div>
          </x-form-field>

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