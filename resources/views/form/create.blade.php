<x-app-layout>
    <div class="flex-grow flex items-center justify-center min-h-screen">
        <form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-10 rounded-3xl shadow-md w-full max-w-md">
            
            @csrf
            <h2 class="text-3xl text-stone-800 font-bold mb-10 text-center">Pinjam Barang</h2>
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nama Peminjam</label>
                <input type="text" id="nama_peminjam" name="nama_peminjam"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-3xl" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nama Barang</label>
                    <input type="text" id="nama_barang" name="nama_barang"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-3xl" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Jumlah Barang</label>
                    <input type="number" id="jumlah_barang" name="jumlah_barang"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-3xl" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Tanggal Pinjam</label>
                    <input type="date" id="tanggal_pinjam" name="tanggal_pinjam"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-3xl" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Tanggal Kembali</label>
                    <input type="date" id="tanggal_kembali" name="tanggal_kembali"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-3xl" required>
                </div>
            </div>

            <button type="submit"
                class="w-full bg-stone-800 text-white font-bold py-2 rounded-3xl hover:bg-stone-800 transition mt-3">
                Submit
            </button>
        </form>
    </div>
</x-app-layout>
