<x-guest-layout>

    <div class="text-center">
        <h1 class="font-bold">{{$title}}</h1>
    </div>
    <form method="POST" action="{{ route('karyawan.register') }}">
        @csrf

    {{-- Nama --}}
    <div class="mb-6">
      <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 ">Your nama</label>
      <input type="text" name="nama" value="{{old('nama')}}" id="nama"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-200 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
    </div>

    {{-- Nip --}}
    <div class="mb-6">
        <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 ">Your nip</label>
        <input type="text" name="nip" value="{{old('nip')}}" id="nip"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-200 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
      </div>

    {{-- Jenis Kelamin --}}
    <div class="mb-6">
        <label for="jk" class="block mb-2 text-sm font-medium text-gray-900 ">Your gender</label>
        <input type="text" name="jk" value="{{old('jk')}}" id="jk"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-200 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
      </div>

    {{-- Jabatan --}}
    <div class="mb-6">
        <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900 ">Your jabatan</label>
        <input type="text" name="jabatan" value="{{old('jabatan')}}" id="jabatan"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-200 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
      </div>

    {{-- Divisi --}}
    <div class="mb-6">
        <label for="divisi" class="block mb-2 text-sm font-medium text-gray-900 ">Your divisi</label>
        <input type="text" name="divisi" value="{{old('divisi')}}" id="divisi"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-200 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
      </div>

    <div class="mb-6">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Your password</label>
      <input type="password" name="password" id="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-200 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
    </div>
    
    <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register new account</button>
    <p class="text-blue">Already have an account? <a href="/karyawan/login ">Login</a></p>
  </form>
</x-guest-layout>
