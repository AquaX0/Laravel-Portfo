@extends('layouts.app')

@section('title', 'Edit Skill - Portfo')

@section('content')
    <div class="max-w-3xl mx-auto px-6 py-12">
        <h1 class="text-2xl font-bold mb-6">Edit Skill</h1>

        @if($errors->any())
            <div class="mb-4 text-red-700">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('skills.update', $item->id) }}" method="post">
            @csrf
            @method('PUT')
            <label class="block mb-2">Name</label>
            <input name="name" value="{{ old('name', $item->name) }}" class="w-full mb-3 px-3 py-2 border rounded" required />

            {{-- Only 'name' is used now. --}}

            <div class="text-right">
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
            </div>
        </form>
    </div>
@endsection
