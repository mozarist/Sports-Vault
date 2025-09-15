<x-app-layout>

    <div class="flex justify-between items-center">
        <h2 class="text-2xl text-white font-semibold">
            Daftar Perlengkapan Olahraga
        </h2>

        <a href="{{ route('product.create') }}" class="bg-gradient-to-tr from-zinc-900 to-zinc-800 px-4 py-2 text-white border border-zinc-800 rounded-md hover:brightness-110">
            + Tambah Barang 
        </a>
    </div>

    <div class="w-full">
        <div class="w-full mx-auto">
            <div class="bg-transparent relative border border-zinc-800 sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-white">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-zinc-800 dark:text-zinc-300">
                            <tr>
                                <th scope="col" class="px-4 py-3">Nama Barang</th>
                                <th scope="col" class="px-4 py-3 text-center">Status</th>
                                <th scope="col" class="px-4 py-3 text-center">Jumlah</th>
                                <th scope="col" class="px-4 py-3 text-center">Gambar</th>
                                <th scope="col" class="px-4 py-3 text-center">
                                    <span>Aksi</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $p)
                                <tr class="border-b dark:border-zinc-800">
                                    <th scope="row"
                                        class="px-4 py-3 font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $p['nama_barang'] }}
                                    </th>
                                    <td class="px-4 py-3 text-center">{{ $p['status_barang'] }}</td>
                                    <td class="px-4 py-3 text-center">{{ $p['jumlah_barang'] }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-center gap-2">
                                            <img src="{{ asset('storage/' . $p['gambar_barang']) }}"
                                            alt="gambar {{ $p['nama_barang'] }} tidak ditemukan"
                                            class="object-cover w-28 aspect-square bg-zinc-800 rounded-xl overflow-hidden">
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">

                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('product.edit', $p->id) }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:bg-zinc-900 dark:hover:bg-zinc-800 dark:text-zinc-300 dark:hover:text-white border border-zinc-800 rounded-md">
                                                Edit
                                            </a>

                                            <form action="{{ route('product.destroy', $p->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin hapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="w-full block bg-red-600 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-red-700 dark:text-zinc-300 dark:hover:text-white rounded-md">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
