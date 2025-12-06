<x-layout>
  <x-slot:title>Login</x-slot:title>
    
  <div class="max-w-md mx-auto mt-10">
    <div class="bg-white shadow rounded-lg p-8">
      <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
      
      <form action="/login" method="POST">
        @csrf
        
        <div class="mb-4">
          <label for="email" class="block text-gray-700 mb-2">Email</label>
          <input 
            type="email" 
            name="email" 
            id="email" 
            class="border rounded w-full py-2 px-3 @error('email') border-red-500 @enderror" 
            value="{{ old('email') }}"
            required
          >
          @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-4">
          <label for="password" class="block text-gray-700 mb-2">Password</label>
          <input 
            type="password" 
            name="password" 
            id="password" 
            class="border rounded w-full py-2 px-3 @error('password') border-red-500 @enderror" 
            required
          >
          @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-4">
          <label class="flex items-center">
            <input type="checkbox" name="remember" class="mr-2">
            <span class="text-sm">Remember Me</span>
          </label>
        </div>

        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded w-full hover:bg-blue-700">
          Login
        </button>

        <div class="mt-4 text-center">
          <p class="text-sm">Belum punya akun? <a href="/register" class="text-blue-600 hover:underline">Register</a></p>
        </div>
      </form>
    </div>
  </div>
    
</x-layout>