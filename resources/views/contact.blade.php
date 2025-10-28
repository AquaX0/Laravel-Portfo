@extends('layouts.app')

@section('title', 'Contact - Portfo')

@section('content')
    <div class="max-w-6xl mx-auto px-6 py-24">
        <h1 class="text-4xl md:text-5xl font-extrabold text-center">Contacts</h1>

        <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card: Contact Number -->
            <div class="bg-white rounded-xl shadow-md p-8 text-center">
                <div class="w-24 h-24 mx-auto rounded-full bg-blue-600 flex items-center justify-center text-white text-2xl mb-6">
                    📞
                </div>
                <h3 class="text-lg font-semibold">Contact Number</h3>
                <p class="mt-4 text-blue-600">08XX-XXXX-XXXX</p>
            </div>

            <!-- Card: Email -->
            <div class="bg-white rounded-xl shadow-md p-8 text-center">
                <div class="w-24 h-24 mx-auto rounded-full bg-blue-600 flex items-center justify-center text-white text-2xl mb-6">
                    ✉️
                </div>
                <h3 class="text-lg font-semibold">Email Address</h3>
                <p class="mt-4 text-blue-600">bglorychen@student.ciputra.ac.id</p>
            </div>

            <div class="bg-white rounded-xl shadow-md p-8 text-center">
                <div class="w-24 h-24 mx-auto rounded-full bg-blue-600 flex items-center justify-center text-white mb-6">
                    <!-- Instagram-like camera icon (white) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <rect x="3.5" y="3.5" width="17" height="17" rx="4.5" stroke="white" stroke-width="1.5" fill="none" />
                        <circle cx="12" cy="12" r="3" fill="white" />
                        <circle cx="17" cy="7" r="0.9" fill="white" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold">Instagram</h3>
                <p class="mt-4 text-gray-400">@britneygloryc</p>
            </div>
        </div>
    </div>
@endsection