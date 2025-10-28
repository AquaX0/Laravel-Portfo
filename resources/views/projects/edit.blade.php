@extends('layouts.app')

@section('title', 'Edit Project - Portfo')

@section('content')
    <div class="max-w-3xl mx-auto px-6 py-12">
        <h1 class="text-2xl font-bold mb-6">Edit project</h1>

        @if($errors->any())
            <div class="mb-4 text-red-700">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('projects.update', $project->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label class="block mb-2">Title</label>
            <input name="title" value="{{ old('title', $project->title) }}" class="w-full mb-3 px-3 py-2 border rounded" required />

            <label class="block mb-2">Body</label>
            <textarea name="body" class="w-full mb-3 px-3 py-2 border rounded" rows="8">{{ old('body', $project->body) }}</textarea>

            <label class="block mb-2">Publish date (optional)</label>
            <input name="published_at" type="datetime-local" value="{{ old('published_at', $project->published_at) }}" class="w-full mb-3 px-3 py-2 border rounded" />

            <label class="block mb-2">Feature image (optional, replace)</label>

            <div class="flex items-center space-x-4 mb-3">
                <input id="image" name="image" type="file" accept="image/*" class="sr-only" />

                <label for="image" class="inline-flex items-center px-4 py-2 bg-gray-100 border rounded cursor-pointer hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7M16 3v4M8 3v4m0 0h8" />
                    </svg>
                    <span class="text-sm text-gray-700">Choose image</span>
                </label>

                <span id="image-filename" class="text-sm text-gray-500">No file chosen</span>

                <div class="ml-auto">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
                </div>
            </div>

            <div id="image-preview" class="mb-3 {{ $project->image ? '' : 'hidden' }}">
                <img id="image-preview-img" src="{{ $project->image ? 'data:' . $project->image_mime . ';base64,' . base64_encode($project->image) : '#' }}" alt="preview" class="w-48 h-32 object-cover rounded border" />
            </div>

            <script>
                (function(){
                    const input = document.getElementById('image');
                    const filename = document.getElementById('image-filename');
                    const preview = document.getElementById('image-preview');
                    const previewImg = document.getElementById('image-preview-img');

                    if(!input) return;

                    input.addEventListener('change', function(e){
                        const file = this.files && this.files[0];
                        if(file) {
                            filename.textContent = file.name;
                            if(file.type.startsWith('image/')){
                                const reader = new FileReader();
                                reader.onload = function(ev){
                                    previewImg.src = ev.target.result;
                                    preview.classList.remove('hidden');
                                };
                                reader.readAsDataURL(file);
                            }
                        } else {
                            filename.textContent = 'No file chosen';
                            // don't hide preview if project already had image
                            if(!previewImg.src) preview.classList.add('hidden');
                        }
                    });
                })();
            </script>
        </form>
    </div>
@endsection
