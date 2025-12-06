<x-layout>
  <x-slot:title>
    Register
  </x-slot:title>
  
  <div class="max-w-md mx-auto mt-10">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Register</h2>
      
      <form action="/register" method="POST">
        @csrf
        
        <!-- Nama Input -->
        <div class="mb-4">
          <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
            Nama
          </label>
          <input 
            type="text" 
            name="name" 
            id="name" 
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" 
            placeholder="Masukkan nama lengkap Anda"
            value="{{ old('name') }}"
            required
          >
          @error('name')
            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Email Input -->
        <div class="mb-4">
          <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
            Email
          </label>
          <input 
            type="email" 
            name="email" 
            id="email" 
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" 
            placeholder="Masukkan email Anda"
            value="{{ old('email') }}"
            required
          >
          @error('email')
            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Password Input -->
        <div class="mb-4">
          <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
            Password
          </label>
          <input 
            type="password" 
            name="password" 
            id="password" 
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" 
            placeholder="Masukkan password"
            required
          >
          @error('password')
            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Konfirmasi Password Input -->
        <div class="mb-6">
          <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">
            Konfirmasi Password
          </label>
          <input 
            type="password" 
            name="password_confirmation" 
            id="password_confirmation" 
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" 
            placeholder="Masukkan ulang password"
            required
          >
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-between">
          <button 
            type="submit" 
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full"
          >
            Register
          </button>
        </div>

        <!-- Additional Links -->
        <div class="mt-4 text-center">
          <p class="text-sm text-gray-600">
            Sudah punya akun? 
            <a href="/login" class="text-blue-500 hover:text-blue-800 font-semibold">
              Login di sini
            </a>
          </p>
        </div>
      </form>
    </div>
  </div>
  
</x-layout>