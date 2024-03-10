@extends('layouts.admin')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">All Users</h1>

        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="border border-gray-200 px-4 py-2">#</th>
                    <th class="border border-gray-200 px-4 py-2">Name</th>
                    <th class="border border-gray-200 px-4 py-2">Email</th>
                    <th class="border border-gray-200 px-4 py-2">Admin</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border border-gray-200 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-200 px-4 py-2">{{ $user->name }}</td>
                        <td class="border border-gray-200 px-4 py-2">{{ $user->email }}</td>
                        <td class="border border-gray-200 px-4 py-2">{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
