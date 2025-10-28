@extends('layouts.app')

@section('title', 'Add Skill - Portfo')

@section('content')
    <div class="max-w-3xl mx-auto px-6 py-12">
        <h1 class="text-2xl font-bold mb-6">Add Skill</h1>

        @if($errors->any())
            <div class="mb-4 text-red-700">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('skills.store') }}" method="post">
            @csrf
            <label class="block mb-2">Name</label>
            <input name="name" value="{{ old('name') }}" class="w-full mb-3 px-3 py-2 border rounded" required />

            {{-- Only 'name' is required now --}}

            <div class="text-right">
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
            </div>
        </form>
    </div>
@endsection
