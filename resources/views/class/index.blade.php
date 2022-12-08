@extends('layouts.app')
@section('title', 'Class')

@section('main')
    <div class="container p-4">
        @if (session('success'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        <h2>View List Class</h2>
        <a href="{{ route('class.add') }}" class="btn btn-outline-success rounded-0">&plus; Add New Class</a>
        <table class="table mt-3 table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->id }}</td>
                        <td>
                            <a href="" class="card-link" title="View List Student Of {{ $item->name }}">{{ $item->name }}</a>
                        </td>
                        <td>{!! $item->status == 1
                            ? "<p class='badge badge-success'>Online</p>"
                            : "<p class='badge badge-danger'>Offline</p>" !!}</td>
                        <td style="width: 20%;">
                            <form action="" method="POST">
                                @method('DELETE') @csrf
                                <a href="" class="btn btn-outline-success rounded-0">Update</a>
                                <button type="submit" class="btn btn-outline-danger rounded-0">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
