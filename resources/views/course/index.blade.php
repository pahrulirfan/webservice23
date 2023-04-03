@extends('master')

@section('title', 'Course')

@section('content')
    <div class="alert alert-info">Course</div>

    <a href="{{ route('course.create') }}" class="btn btn-success float-end mb-3">Tambah Data</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Institution</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->description }}</td>
                <td>Rp. {{ number_format($row->price) }}</td>
                <td>{{ $row->institution_id }}</td>
                <td>
                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
