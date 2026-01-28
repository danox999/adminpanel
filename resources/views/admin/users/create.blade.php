@extends('layouts.admin')

@section('title', 'Create User')
@section('page-title', 'Create New User')

@section('content')
<div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-200/50 overflow-hidden">
    <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-6 py-4">
        <h3 class="text-xl font-bold text-white">Create New User</h3>
        <p class="text-sm text-indigo-100">Add a new user to the system</p>
    </div>
    <div class="p-8">
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf
            @include('admin.users._form', ['roles' => $roles])
            <div class="mt-8 flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.users.index') }}" class="px-6 py-3 border-2 border-gray-300 rounded-xl text-gray-700 hover:bg-gray-50 transition-all duration-200 font-semibold">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl">
                    Create User
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

