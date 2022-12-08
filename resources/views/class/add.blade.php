@extends('layouts.app')
@section('title', 'Add Class')

@section('main')
    <div class="container p-4">
        <h2>Form Add New Class</h2>

        <form action="{{ route('class.store') }}" method="post" role="form" class="mt-3">
            @csrf
            <div class="form-group">
                <label for="name">Class's Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Class's Name">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Class's Status</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" id="status1" value="1" checked>
                        Online
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" id="status2" value="0">
                        Offline
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-block rounded-0">Submit</button>
        </form>
    </div>
@endsection
