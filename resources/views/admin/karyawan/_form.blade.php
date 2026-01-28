<div class="space-y-6">
    <!-- Nama -->
    <div>
        <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">Nama <span class="text-red-500">*</span></label>
        <input type="text" name="nama" id="nama" value="{{ old('nama', $karyawan->nama ?? '') }}" required class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-white">
        @error('nama')
            <p class="mt-2 text-sm text-red-600 flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    <!-- NIP -->
    <div>
        <label for="nip" class="block text-sm font-semibold text-gray-700 mb-2">NIP <span class="text-red-500">*</span></label>
        <input type="text" name="nip" id="nip" value="{{ old('nip', $karyawan->nip ?? '') }}" required class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-white font-mono">
        @error('nip')
            <p class="mt-2 text-sm text-red-600 flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    <!-- Email -->
    <div>
        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
        <input type="email" name="email" id="email" value="{{ old('email', $karyawan->email ?? '') }}" required class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-white">
        @error('email')
            <p class="mt-2 text-sm text-red-600 flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    <!-- Phone -->
    <div>
        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone', $karyawan->phone ?? '') }}" class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-white">
        @error('phone')
            <p class="mt-2 text-sm text-red-600 flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Jabatan -->
        <div>
            <label for="jabatan" class="block text-sm font-semibold text-gray-700 mb-2">Jabatan <span class="text-red-500">*</span></label>
            <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan', $karyawan->jabatan ?? '') }}" required class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-white">
            @error('jabatan')
                <p class="mt-2 text-sm text-red-600 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Departemen -->
        <div>
            <label for="departemen" class="block text-sm font-semibold text-gray-700 mb-2">Departemen <span class="text-red-500">*</span></label>
            <input type="text" name="departemen" id="departemen" value="{{ old('departemen', $karyawan->departemen ?? '') }}" required class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-white">
            @error('departemen')
                <p class="mt-2 text-sm text-red-600 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Tanggal Masuk -->
        <div>
            <label for="tanggal_masuk" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Masuk <span class="text-red-500">*</span></label>
            <input type="date" name="tanggal_masuk" id="tanggal_masuk" value="{{ old('tanggal_masuk', isset($karyawan) ? $karyawan->tanggal_masuk->format('Y-m-d') : '') }}" required class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-white">
            @error('tanggal_masuk')
                <p class="mt-2 text-sm text-red-600 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Status -->
        <div>
            <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status <span class="text-red-500">*</span></label>
            <select name="status" id="status" required class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-white">
                <option value="active" {{ old('status', $karyawan->status ?? 'active') === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $karyawan->status ?? '') === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <p class="mt-2 text-sm text-red-600 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>
    </div>

    <!-- User ID -->
    <div>
        <label for="user_id" class="block text-sm font-semibold text-gray-700 mb-2">User (Optional)</label>
        <select name="user_id" id="user_id" class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-white">
            <option value="">No User</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id', $karyawan->user_id ?? '') == $user->id ? 'selected' : '' }}>{{ $user->name }} ({{ $user->email }})</option>
            @endforeach
        </select>
        @error('user_id')
            <p class="mt-2 text-sm text-red-600 flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ $message }}
            </p>
        @enderror
    </div>
</div>
