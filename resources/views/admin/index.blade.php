<x-app-layout>

    <body class="bg-white h-9000">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mx-10 gap-8 px-5 mt-10">
                

                @forelse($admin as $a)
                    <div class="max-w-sm bg-white shadow-lg rounded-lg overflow-hidden">
                        @if ($a->image)
                            <img src="{{ asset('storage/' . $a->image) }}" alt="{{ $a->nama_barang }}"
                                class="w-full h-48 object-contain">

                        @else
                            <img src="{{ asset('images/default.jpg') }}" alt="Default Image" class="w-full h-48 object-cover">
                        @endif


                        <div class="p-5">
                            <div class="mb-4">
                                <h1 class="font-bold text-2xl text-stone-800">
                                    {{ $a->nama_barang }}
                                </h1>
                                <h2 class="text-md mt-2 mb-1 font-semibold text-neutral-700">Status barang:
                                    {{ $a->status_barang }}
                                </h2>
                            </div>

                            <div class="flex justify-between items-center text-neutral-500 text-sm mb-3">
                                <a href="{{ route('form.create', $a->id) }}"
                                    class="bg-stone-800 text-white font-bold py-2 px-5 rounded-3xl hover:bg-stone-800 transition">
                                    Pinjam barang
                                </a>
                            </div>
                        </div>


                    </div>
                @empty
                    <p>Tidak ada data.</p>
                @endforelse

            </div>

    </body>

</x-app-layout>