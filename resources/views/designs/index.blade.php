@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Design Management</h1>
            <p class="text-sm text-gray-500">Submit and track design requests with reviewer details.</p>
        </div>
        <a href="{{ route('designs.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add New Design
        </a>
    </div>

    @if(auth()->check() && auth()->user()->isAdmin())
        <form method="GET" action="{{ route('designs.index') }}" class="mb-4 flex flex-wrap items-center gap-3">
            <label class="text-sm text-gray-700">Filter by designer:</label>
            <select name="designer_id" class="rounded-lg border-gray-300 px-3 py-2 text-sm text-gray-700">
                <option value="">All Designers</option>
                @foreach($designers as $designer)
                    <option value="{{ $designer->id }}" {{ request('designer_id') == $designer->id ? 'selected' : '' }}>{{ $designer->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded">Apply</button>
        </form>
    @endif

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order By</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                    @if(auth()->check() && auth()->user()->isAdmin())
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Designer</th>
                    @endif
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($designs as $design)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $design->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $design->date }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ Str::limit($design->description, 50) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $design->type == 'poster' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ ucfirst($design->type) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $design->order_by }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $design->quantity }}</td>
                    @if(auth()->check() && auth()->user()->isAdmin())
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $design->designer?->name ?? 'Unknown' }}</td>
                    @endif
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('designs.show', $design) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">View</a>
                        <a href="{{ route('designs.edit', $design) }}" class="text-yellow-600 hover:text-yellow-900 mr-2">Edit</a>
                        <form action="{{ route('designs.destroy', $design) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection