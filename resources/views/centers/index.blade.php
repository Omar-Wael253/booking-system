
@extends('layouts.app')

@section('title', 'All Centers')

@section('content')
    <div class="page-header">
        <div>
            <h1>Centers</h1>
            <p class="subtitle">Manage all registered centers.</p>
        </div>

        <a href="{{ route('centers.create') }}" class="btn btn-primary">
            + Add Center
        </a>
    </div>

    <div class="card">
        @if($centers->isEmpty())
            <div class="empty-state">
                <h2>No centers yet</h2>
                <p>Create your first center to get started.</p>
                <a href="{{ route('centers.create') }}" class="btn btn-primary">
                    Create Center
                </a>
            </div>
        @else
            <div class="table-wrapper">
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Center Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($centers as $center)
                        <tr>
                            <td>{{ $center->id }}</td>
                            <td class="center-name">{{ $center->name }}</td>
                            <td>
                                <a
                                    href="{{ route('centers.show', ['center' => $center]) }}"
                                    class="btn btn-secondary"
                                >
                                    View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

