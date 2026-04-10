@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Daily Designer Reports</h1>
            <p class="text-sm text-gray-500">Today&#39;s submitted designs by all designers.</p>
        </div>
        <a href="{{ route('designs.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded">
            Back to Designs
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Designer</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Reports</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Latest Report</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($reportData as $designer)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $designer['name'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $designer['count'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $designer['last_report'] ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('designs.index', ['designer_id' => $designer['id']]) }}" class="text-indigo-600 hover:text-indigo-900">View Designs</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-sm text-gray-500 text-center">No reports found for today.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection