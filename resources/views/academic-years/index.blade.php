
@extends('layouts.app')

@section('title', 'Academic Years')

@section('content')
    <div class="page-header">
        <div>
            <h1>Academic Years</h1>
            <p class="page-description">
                Manage the academic years available in the booking system.
            </p>
        </div>

        <a href="{{ route('academic-year.create') }}" class="btn btn-primary">
            + Add Academic Year
        </a>
    </div>

    {{-- Success and error messages --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    <div class="table-card">
        @if ($academicYears->isEmpty())
            <div class="empty-state">
                <h2>No Academic Years Yet</h2>
                <p>
                    You haven't created any academic years. Add one to get started.
                </p>

                <a href="{{ route('academic-year.create') }}" class="btn btn-primary">
                    Create First Academic Year
                </a>
            </div>
        @else
            <div class="table-wrapper">
                <table class="data-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Start Year</th>
                        <th>End Year</th>
                        <th>Academic Period</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($academicYears as $academicYear)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $academicYear->start_year }}</td>
                            <td>{{ $academicYear->end_year }}</td>
                            <td>
                                    <span class="year-badge">
                                        {{ $academicYear->start_year }}–{{ $academicYear->end_year }}
                                    </span>
                            </td>
                            <td>
                                {{ $academicYear->created_at?->format('d M Y') ?? '—' }}
                            </td>
                            <td>
                                <a
                                    href="{{ route('academic-year.edit', $academicYear) }}"
                                    class="btn btn-secondary"
                                >
                                    Edit
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

