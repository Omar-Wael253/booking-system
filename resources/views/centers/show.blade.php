@extends('layouts.app')

@section('title', $center->name)

@section('content')
    <div class="page-header">
        <div>
            <p class="subtitle">Center Details</p>
            <h1>{{ $center->name }}</h1>
        </div>

        <a href="{{ route('centers.index') }}" class="btn btn-secondary">
            Back to Centers
        </a>
    </div>

    <div class="card">
        <div class="center-details">
            <div class="detail-item">
                <span class="detail-label">Center Name</span>
                <h2>{{ $center->name }}</h2>
            </div>

            <div class="detail-item">
                <span class="detail-label">Center ID</span>
                <p class="detail-value">#{{ $center->id }}</p>
            </div>
        </div>

        <div class="card-actions">
            <a
                href="{{ route('centers.edit', ['center' => $center]) }}"
                class="btn btn-primary"
            >
                Edit Center
            </a>

            <form
                method="POST"
                action="{{ route('centers.destroy', ['center' => $center]) }}"
                onsubmit="return confirm('Are you sure you want to delete this center?');"
            >
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                    Delete Center
                </button>
            </form>
        </div>
    </div>
@endsection


