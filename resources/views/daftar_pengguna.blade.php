<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Peminjam') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Search" required="">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-600 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-4 py-2">No</th>
                                <th scope="col" class="px-4 py-3">Nama Peminjam</th>
                                <th scope="col" class="px-4 py-3">Nama Barang</th>
                                <th scope="col" class="px-4 py-3">Jumlah Barang</th>
                                <th scope="col" class="px-4 py-3">Tanggal Pinjam</th>
                                <th scope="col" class="px-4 py-3">Tanggal Kembali</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($form) && count($form) > 0)
                                @foreach ($form as $f)
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-3">{{ $f->nama_peminjam }}</td>
                                        <td class="px-4 py-3">{{ $f->nama_barang }}</td>
                                        <td class="px-4 py-3">{{ $f->jumlah_barang }}</td>
                                        <td class="px-4 py-3">{{ $f->tanggal_pinjam }}</td>
                                        <td class="px-4 py-3">{{ $f->tanggal_kembali }}</td>
                                        <td class="px-4 py-3">
                                            {{ ucfirst($f->status) }}
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex justify-start gap-2">
                                                <button type="button" onclick="openApproveModal({{ $f->id }})"
                                                    class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow">
                                                    Approve
                                                </button>

                                                <button type="button" onclick="openDeclineModal({{ $f->id }})"
                                                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg shadow">
                                                    Decline
                                                </button>
                                            </div>
                                        </td>

                                        <div id="approveModal-{{ $f->id }}"
                                            class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50 z-50">
                                            <div class="bg-white p-8 rounded-3xl shadow-md w-100 max-w-md text-center">
                                                <h2 class="text-2xl font-bold text-stone-800 mb-6">Setujui peminjaman ini?</h2>

                                                <form id="approveForm-{{ $f->id }}"
                                                    action="{{ route('dashboard.approve', $f->id) }}" method="POST">
                                                    @csrf
                                                    <div class="flex justify-center space-x-4">
                                                        <button type="submit"
                                                            class="w-[100px] bg-green-600 text-white font-bold py-2 rounded-3xl hover:bg-green-700 transition">
                                                            Approve
                                                        </button>
                                                        <button type="button" onclick="closeApproveModal({{ $f->id }})"
                                                            class="w-[100px] bg-gray-300 text-gray-700 font-bold py-2 rounded-3xl hover:bg-gray-400 transition">
                                                            Batal
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div id="declineModal-{{ $f->id }}"
                                            class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50 z-50">
                                            <div class="bg-white p-8 rounded-3xl shadow-md w-80 max-w-md text-center">
                                                <h2 class="text-2xl font-bold text-stone-800 mb-6">Tolak peminjaman ini?</h2>

                                                <form id="declineForm-{{ $f->id }}"
                                                    action="{{ route('dashboard.decline', $f->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="flex justify-center space-x-4">
                                                        <button type="submit"
                                                            class="w-20 bg-red-600 text-white font-bold py-2 rounded-3xl hover:bg-red-700 transition">
                                                            Decline
                                                        </button>
                                                        <button type="button" onclick="closeDeclineModal({{ $f->id }})"
                                                            class="w-20 bg-gray-300 text-gray-700 font-bold py-2 rounded-3xl hover:bg-gray-400 transition">
                                                            Batal
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <script>
                                            function openApproveModal(id) {
                                                document.getElementById('approveModal-' + id).classList.remove('hidden');
                                                document.getElementById('approveModal-' + id).classList.add('flex');
                                            }
                                            function closeApproveModal(id) {
                                                document.getElementById('approveModal-' + id).classList.add('hidden');
                                                document.getElementById('approveModal-' + id).classList.remove('flex');
                                            }

                                            function openDeclineModal(id) {
                                                document.getElementById('declineModal-' + id).classList.remove('hidden');
                                                document.getElementById('declineModal-' + id).classList.add('flex');
                                            }
                                            function closeDeclineModal(id) {
                                                document.getElementById('declineModal-' + id).classList.add('hidden');
                                                document.getElementById('declineModal-' + id).classList.remove('flex');
                                            }
                                        </script>


                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center text-gray-400 py-4">Data belum ada</td>
                                </tr>
                            @endif
                        </tbody>

                    </table>
                </div>

                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                    aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Showing
                        <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                        of
                        <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                    </span>
                    <ul class="inline-flex items-stretch -space-x-px">
                        <li>
                            <a href="#"
                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <span class="sr-only">Previous</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                        </li>
                        <li>
                            <a href="#" aria-current="page"
                                class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-primary-600 bg-primary-50 border border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <span class="sr-only">Next</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</x-app-layout>