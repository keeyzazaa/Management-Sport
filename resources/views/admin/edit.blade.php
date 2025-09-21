<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Daftar Barang') }}
    </h2>
  </x-slot>

  <div class="bg-gray-100 flex-grow flex items-center justify-center min-h-screen">
    <form action="{{ route('dashboard.update', $admin->id) }}" method="POST" enctype="multipart/form-data"
      class="bg-white p-10 rounded-3xl shadow-md w-full max-w-md">
      @csrf
      @method('PUT')
      <h2 class="text-3xl text-stone-800 font-bold mb-10 text-center">Edit</h2>

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nama Barang</label>
        <input type="text" id="nama_barang" name="nama_barang"
          class="mt-1 block w-full p-2 border border-gray-300 rounded-3xl"
          value="{{ old('nama_barang', $admin->nama_barang) }}" required>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Jumlah Barang</label>
        <input type="text" id="jumlah_barang" name="jumlah_barang"
          class="mt-1 block w-full p-2 border border-gray-300 rounded-3xl"
          value="{{ old('jumlah_barang', $admin->jumlah_barang) }}" required>
      </div>

      <div class="mb-4">
        <label for="status" class="block text-sm font-medium text-gray-700">Status Barang</label>
        <div class="relative">
          <select id="status_barang" name="status_barang"
            class="mt-1 block w-full p-2 border border-gray-300 rounded-3xl"
            value="{{ old('status_barang', $admin->status_barang) }}" required>
            <option value="baik">Baik</option>
            <option value="rusak">Rusak</option>
          </select>
        </div>
      </div>
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Image</label>
        <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png" class="mt-1 block w-full text-stone-800 border border-gray-300 rounded-3xl cursor-pointer file:mr-4 file:py-2 file:px-4
                        file:rounded-3xl file:border-0 file:text-sm file:font-semibold
                        file:bg-stone-800 file:text-white hover:file:bg-stone-700">
      </div>

      <button type="submit"
        class="w-full bg-stone-800 text-white font-bold py-2 rounded-3xl hover:bg-stone-800 transition mt-3">
        Submit
      </button>
    </form>
  </div>
</x-app-layout>