@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Design</h1>

        <form action="{{ route('designs.update', $design) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date</label>
                <input type="date" name="date" id="date" value="{{ $design->date }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea name="description" id="description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ $design->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type</label>
                <select name="type" id="type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="poster" {{ $design->type == 'poster' ? 'selected' : '' }}>Poster</option>
                    <option value="video" {{ $design->type == 'video' ? 'selected' : '' }}>Video</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="order_by" class="block text-gray-700 text-sm font-bold mb-2">Order By</label>
                <input type="text" name="order_by" id="order_by" value="{{ $design->order_by }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Quantity</label>
                <input type="number" name="quantity" id="quantity" min="1" value="{{ $design->quantity }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="more" class="block text-gray-700 text-sm font-bold mb-2">More Details</label>
                <textarea name="more" id="more" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Extra notes or report details">{{ $design->more }}</textarea>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Design
                </button>
                <a href="{{ route('designs.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection