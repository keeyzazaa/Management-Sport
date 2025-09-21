<x-guest-layout>
    <div class="flex-grow flex items-center justify-center min-h-screen bg-gray-100">
        <form method="POST" action="{{ route('register') }}" 
              class="bg-white p-10 rounded-3xl shadow-md w-full max-w-md">
            
            @csrf

            <h2 class="text-3xl font-bold text-stone-800 mb-10 text-center">Register</h2>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus
                       class="mt-1 block w-full p-2 border border-gray-300 rounded-3xl" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" :value="old('email')" required
                       class="mt-1 block w-full p-2 border border-gray-300 rounded-3xl" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" type="password" name="password" required
                       class="mt-1 block w-full p-2 border border-gray-300 rounded-3xl" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="mt-1 block w-full p-2 border border-gray-300 rounded-3xl" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
            </div>

            <button type="submit"
                    class="w-full bg-stone-800 text-white font-bold py-2 rounded-3xl hover:bg-stone-700 transition mt-3">
                Register
            </button>

            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-gray-800">
                    Already registered?
                </a>
            </div>

        </form>
    </div>
</x-guest-layout>
