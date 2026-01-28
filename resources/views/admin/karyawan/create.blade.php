@extends('layouts.admin')

@section('title', 'Create Karyawan')
@section('page-title', 'Create New Karyawan')

@section('content')
<div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-200/50 overflow-hidden">
    <div class="bg-gradient-to-r from-blue-500 to-cyan-600 px-6 py-4">
        <h3 class="text-xl font-bold text-white">Create New Karyawan</h3>
        <p class="text-sm text-blue-100">Add a new employee to the system</p>
    </div>
    <div class="p-8">
        <form method="POST" action="{{ route('admin.karyawan.store') }}">
            @csrf
            @include('admin.karyawan._form', ['users' => $users])
            <div class="mt-8 flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.karyawan.index') }}" class="px-6 py-3 border-2 border-gray-300 rounded-xl text-gray-700 hover:bg-gray-50 transition-all duration-200 font-semibold">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-cyan-600 text-white rounded-xl hover:from-blue-700 hover:to-cyan-700 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl">
                    Create Karyawan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

