<div class="space-y-6">
    <!-- Name -->
    <div>
        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Name <span class="text-red-500">*</span></label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name ?? '') }}" required class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all bg-white">
        @error('name')
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
        <input type="email" name="email" id="email" value="{{ old('email', $user->email ?? '') }}" required class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all bg-white">
        @error('email')
            <p class="mt-2 text-sm text-red-600 flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    <!-- Password -->
    <div>
        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
            Password @if(isset($user))<span class="text-gray-500 font-normal text-xs">(leave blank to keep current)</span>@else<span class="text-red-500">*</span>@endif
        </label>
        <input type="password" name="password" id="password" {{ !isset($user) ? 'required' : '' }} class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all bg-white">
        @error('password')
            <p class="mt-2 text-sm text-red-600 flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    @if(!isset($user))
    <!-- Password Confirmation -->
    <div>
        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Confirm Password <span class="text-red-500">*</span></label>
        <input type="password" name="password_confirmation" id="password_confirmation" required class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all bg-white">
    </div>
    @endif

    <!-- Phone -->
    <div>
        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone ?? '') }}" class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all bg-white">
        @error('phone')
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
        <select name="status" id="status" required class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all bg-white">
            <option value="active" {{ old('status', $user->status ?? 'active') === 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status', $user->status ?? '') === 'inactive' ? 'selected' : '' }}>Inactive</option>
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

    <!-- Roles -->
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-3">Roles <span class="text-red-500">*</span></label>
        <div class="grid grid-cols-2 gap-3 p-4 bg-gray-50 rounded-xl border border-gray-200">
            @foreach($roles as $role)
                <label class="flex items-center p-3 bg-white rounded-lg border-2 border-gray-200 hover:border-indigo-300 cursor-pointer transition-all {{ in_array($role->name, old('roles', isset($user) ? $user->roles->pluck('name')->toArray() : [])) ? 'border-indigo-500 bg-indigo-50' : '' }}">
                    <input type="checkbox" name="roles[]" value="{{ $role->name }}" {{ in_array($role->name, old('roles', isset($user) ? $user->roles->pluck('name')->toArray() : [])) ? 'checked' : '' }} class="w-5 h-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <span class="ml-3 text-sm font-medium text-gray-700">{{ ucfirst($role->name) }}</span>
                </label>
            @endforeach
        </div>
        @error('roles')
            <p class="mt-2 text-sm text-red-600 flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ $message }}
            </p>
        @enderror
    </div>
</div>

