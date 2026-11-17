
<div class="mb-4">
    <label for="nama" class="form-label">Nama menu</label>
    <input
        id="nama"
        name="nama"
        class="form-control"
        value="{{ old('nama', $menu->nama) }}"
        required
        maxlength="100"
        placeholder="Contoh: Kopi Susu Gula Aren"
    >
    @error('nama')
        <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <label for="kategori" class="form-label">Kategori</label>
        <select id="kategori" name="kategori" class="form-select" required>
            <option value="">Pilih kategori</option>
            <option value="Makanan" @selected(old('kategori', $menu->kategori) === 'Makanan')>
                🍽️ Makanan
            </option>
            <option value="Minuman" @selected(old('kategori', $menu->kategori) === 'Minuman')>
                ☕ Minuman
            </option>
        </select>
        @error('kategori')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-4">
        <label for="harga" class="form-label">Harga (Rupiah)</label>
        <input
            id="harga"
            name="harga"
            type="number"
            min="0"
            step="1"
            class="form-control"
            value="{{ old('harga', $menu->harga) }}"
            required
            placeholder="Contoh: 25000"
        >
        @error('harga')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-4">
    <label for="deskripsi" class="form-label">
        Deskripsi <span class="text-secondary fw-normal">(opsional)</span>
    </label>
    <textarea
        id="deskripsi"
        name="deskripsi"
        rows="3"
        maxlength="500"
        class="form-control"
        placeholder="Contoh: Espresso, susu segar, dan gula aren khas rumah."
    >{{ old('deskripsi', $menu->deskripsi) }}</textarea>
    @error('deskripsi')
        <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
</div>

{{-- Upload foto menu --}}
<div class="mb-4">
    <label for="gambar" class="form-label">Foto Makanan / Minuman</label>

    @if ($menu->gambar)
        <div class="mb-3">
            <img
                src="{{ asset('storage/' . $menu->gambar) }}"
                alt="Foto {{ $menu->nama }}"
                style="width:150px;height:120px;object-fit:cover;border-radius:14px;"
            >
            <div class="text-secondary small mt-1">Foto saat ini</div>
        </div>
    @endif

    <input
        id="gambar"
        name="gambar"
        type="file"
        class="form-control"
        accept=".jpg,.jpeg,.png,.webp"
    >

    <div class="form-text">
        Pilih foto menu dengan format JPG, PNG, atau WEBP. Maksimal 2 MB.
        Kosongkan jika tidak ingin mengganti foto.
    </div>

    @error('gambar')
        <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="d-flex flex-wrap gap-2 pt-2">
    <button type="submit" class="btn btn-primary">
        {{ $tombol }} →
    </button>

    <a href="{{ route('menu.index') }}" class="btn btn-light">
        Batal
    </a>
</div>
