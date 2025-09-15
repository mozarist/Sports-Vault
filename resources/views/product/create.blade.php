<x-app-layout>

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data"
        class="w-full p-5 mt-6 rounded-2xl border border-zinc-800 bg-gradient-to-tr from-black to-zinc-900 shadow-lg">
        @csrf

        <h2 class="text-2xl font-semibold mb-4 text-white">Menambahkan Barang Baru</h2>

        <label class="block mb-3">
            <span class="text-sm text-zinc-300">Nama Barang</span>
            <input type="text" name='nama_barang' placeholder="Masukkan nama barang" required
                class="mt-1 block w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2 text-white placeholder:text-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-600" />
        </label>

        <label for="status_barang" class="block mb-3">
            <span class="text-sm text-zinc-300">Status Barang</span>

            <select name="status_barang"
                class="mt-1 block w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2 text-white placeholder:text-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-600"
                required>
                <option value="Baik" class="bg-zinc-950 text-white">Baik</option>
                <option value="Rusak" class="bg-zinc-950 text-white">Rusak</option>
            </select>
        </label>

        <label class="block mb-3">
            <span class="text-sm text-zinc-300">Jumlah</span>
            <input type="number" min="0" value="1" name="jumlah_barang"
                placeholder="Masukkan jumlah barang" required
                class="mt-1 block w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2 text-white placeholder:text-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-600" />
        </label>

        <label class="block mb-4">
            <span class="text-sm text-zinc-300">Gambar (Max: 5mb)</span>
            <input type="file" name="gambar_barang" accept="image/*" onchange="previewImage(event)"
                class="mt-1 block w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2 text-white focus:outline-none file:bg-transparent file:text-white file:border-0 file:rounded-lg" />
            <div id="imgPreview" class="mt-3 hidden">
                <p class="text-xs text-zinc-400 mb-2">Preview:</p>
                <img id="previewEl" src="#" alt="preview"
                    class="max-h-48 rounded-md object-cover border border-zinc-700" />
            </div>
        </label>

        <div class="flex items-center justify-end gap-3">
            <a href="/product"
                class="px-4 py-2 rounded-lg border border-zinc-700 text-sm text-zinc-300 hover:bg-zinc-800">
                Batal
            </a>
            <button type="submit"
                class="px-5 py-2 rounded-lg bg-gradient-to-bl from-emerald-600 to-zinc-900 text-white text-sm border border-zinc-800 hover:brightness-110">
                Kirim
            </button>
        </div>
    </form>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const previewWrap = document.getElementById('imgPreview');
            const previewEl = document.getElementById('previewEl');

            if (!file) {
                previewWrap.classList.add('hidden');
                previewEl.src = '#';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                previewEl.src = e.target.result;
                previewWrap.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    </script>

</x-app-layout>
