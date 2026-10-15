
@extends('layouts.app')

@section('title', 'Create Academic Year')

@section('content')
    <div class="page-header">
        <div>
            <h1>Create Academic Year</h1>
            <p class="page-description">
                Add a new academic year to the booking system.
            </p>
        </div>

        <a href="{{ route('academic-year.index') }}" class="btn btn-secondary">
            Back to Academic Years
        </a>
    </div>

    <div class="form-card">
        <form action="{{ route('academic-year.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="start_year">Start Year</label>

                <input
                    type="number"
                    id="start_year"
                    name="start_year"
                    value="{{ old('start_year') }}"
                    placeholder="e.g. 2026"
                    min="1900"
                    max="9998"
                    required
                    class="@error('start_year') is-invalid @enderror"
                >

                @error('start_year')
                <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="end_year">End Year</label>

                <input
                    type="number"
                    id="end_year"
                    name="end_year"
                    value="{{ old('end_year') }}"
                    placeholder="e.g. 2027"
                    min="1901"
                    max="9999"
                    required
                    class="@error('end_year') is-invalid @enderror"
                >

                @error('end_year')
                <p class="field-error">{{ $message }}</p>
                @enderror

                <p class="field-hint">
                    The end year must be exactly one year after the start year.
                </p>
            </div>

            <div class="form-actions">
                <a href="{{ route('academic-year.index') }}" class="btn btn-secondary">
                    Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    Create Academic Year
                </button>
            </div>
        </form>
    </div>
@endsection
