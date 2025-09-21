<x-guest-layout>

    <div class="flex flex-col items-center justify-center w-full h-full">

        <form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data"
            class="w-full max-w-2xl self-center justify-self-center">
            @csrf

            <h2 class="text-2xl font-semibold mb-4 text-white">Isi Form Pinjaman</h2>

            <label class="block mb-3">
                <span class="text-sm text-zinc-300">Nama Peminjam</span>
                <input type="text" name='nama_peminjam' placeholder="Masukkan nama anda" required
                    class="mt-1 block w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2 text-white placeholder:text-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-600" />
            </label>

            <label for="nama_barang" class="block mb-3">
                <span class="text-sm text-zinc-300">Nama Barang</span>

                <select name="nama_barang"
                    class="mt-1 block w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2 text-white placeholder:text-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-600"
                    required>
                    @foreach ($product as $p)
                        @if ($p->status_barang === 'Baik')
                            <option value="{{ $p->nama_barang }}" class="bg-zinc-950 text-white">{{ $p->nama_barang }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </label>

            <label class="block mb-3">
                <span class="text-sm text-zinc-300">Jumlah</span>
                <input type="number" min="1" value="1" name="jumlah_barang"
                    placeholder="Masukkan jumlah barang" required
                    class="mt-1 block w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2 text-white placeholder:text-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-600" />
            </label>

            <label class="block mb-3">
                <span class="text-sm text-zinc-300">Tanggal Peminjaman</span>
                <input type="date" name="tanggal_pinjam" required
                    class="mt-1 block w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2 text-white placeholder:text-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-600 [color-scheme:dark]" />
            </label>

            <label class="block mb-3">
                <span class="text-sm text-zinc-300">Tanggal Pengembalian</span>
                <input type="date" name="tanggal_kembali" required
                    class="mt-1 block w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2 text-white placeholder:text-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-600 [color-scheme:dark]" />
            </label>

            <div class="flex items-center justify-end gap-2 mt-5">
                <a href="/"
                    class="px-4 py-2 rounded-lg border border-zinc-700 text-sm text-zinc-300 hover:bg-zinc-800">
                    Batal
                </a>
                <button type="submit"
                    class="px-5 py-2 rounded-lg bg-gradient-to-bl from-emerald-600 to-green-950 text-white text-sm border border-zinc-800 hover:brightness-110">
                    Kirim
                </button>
            </div>
        </form>

    </div>

</x-guest-layout>
