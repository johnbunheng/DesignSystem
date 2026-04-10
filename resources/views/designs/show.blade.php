@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Design Details</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <strong class="text-gray-700">ID:</strong>
                <p class="text-gray-900">{{ $design->id }}</p>
            </div>
            <div>
                <strong class="text-gray-700">Date:</strong>
                <p class="text-gray-900">{{ $design->date }}</p>
            </div>
            <div class="md:col-span-2">
                <strong class="text-gray-700">Description:</strong>
                <p class="text-gray-900">{{ $design->description }}</p>
            </div>
            <div>
                <strong class="text-gray-700">Type:</strong>
                <p class="text-gray-900">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $design->type == 'poster' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                        {{ ucfirst($design->type) }}
                    </span>
                </p>
            </div>
            <div>
                <strong class="text-gray-700">Order By:</strong>
                <p class="text-gray-900">{{ $design->order_by }}</p>
            </div>
            <div>
                <strong class="text-gray-700">Quantity:</strong>
                <p class="text-gray-900">{{ $design->quantity }}</p>
            </div>
            <div>
                <strong class="text-gray-700">More Details:</strong>
                <p class="text-gray-900">{{ $design->more ?? '-' }}</p>
            </div>
            <div class="md:col-span-2">
                <strong class="text-gray-700">Designer:</strong>
                <p class="text-gray-900">{{ $design->designer?->name ?? 'Unknown' }}</p>
            </div>
        </div>

        <div class="mt-6 flex space-x-4">
            <a href="{{ route('designs.edit', $design) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                Edit
            </a>
            <a href="{{ route('designs.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Back to List
            </a>
        </div>
    </div>
</div>
@endsection