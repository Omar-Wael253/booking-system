
@extends('layouts.app')

@section('title', 'Edit ' . $center->name)

@section('content')
    <div class="page-header">
        <div>
            <p class="subtitle">Center Management</p>
            <h1>Edit Center</h1>
            <p class="subtitle">
                Update the information for {{ $center->name }}.
            </p>
        </div>

        <a href="{{ route('centers.show', ['center' => $center]) }}"
           class="btn btn-secondary">
            Back to Center
        </a>
    </div>

    <div class="card form-card">
        <div class="form-heading">
            <h2>Center Information</h2>
            <p>Make your changes below, then save them.</p>
        </div>

        <form method="POST" action="{{ route('centers.update', ['center' => $center]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Center Name</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $center->name) }}"
                    placeholder="Enter center name"
                    required
                    autofocus
                >

                <p class="field-hint">
                    The current center name is filled in automatically.
                </p>
            </div>

            <div class="form-actions">
                <a href="{{ route('centers.show', ['center' => $center]) }}"
                   class="btn btn-secondary">
                    Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
@endsection
