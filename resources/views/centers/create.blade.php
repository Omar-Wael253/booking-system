
@extends('layouts.app')

@section('title', 'Create Center')

@section('content')
    <div class="page-header">
        <div>
            <p class="subtitle">Center Management</p>
            <h1>Create a New Center</h1>
            <p class="subtitle">Add a center to your booking system.</p>
        </div>

        <a href="{{ route('centers.index') }}" class="btn btn-secondary">
            Back to Centers
        </a>
    </div>

    <div class="card form-card">
        <div class="form-heading">
            <h2>Center Information</h2>
            <p>Enter the name of the new center below.</p>
        </div>

        <form method="POST" action="{{ route('centers.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Center Name</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="e.g. Future Academy"
                    required
                    autofocus
                >

                <p class="field-hint">Choose a clear name for your center.</p>
            </div>

            <div class="form-actions">
                <a href="{{ route('centers.index') }}" class="btn btn-secondary">
                    Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    Create Center
                </button>
            </div>
        </form>
    </div>
@endsection
