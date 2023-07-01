<x-guest-layout>

    <div class="text-center">
        <h1 class="font-bold">{{$title}}</h1>
    </div>
    <form method="POST" action="{{ route('karyawan.login') }}">
        @csrf

    {{-- Nip --}}
    <div class="mb-6">
        <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 ">Your nip</label>
        <input type="text" name="nip" value="{{old('nip')}}" id="nip"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-200 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
      </div>

    {{-- Password --}}
    <div class="mb-6">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Your password</label>
      <input type="password" name="password" id="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-200 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
    </div>
    
    <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
    </form>
</x-guest-layout>
