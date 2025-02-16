@extends('layouts.app-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session('success'))
                    <div class="alert alert-success p-1">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger p-1">{{ session('error') }}</div>
                @endif

                <h1>Categories</h1>
                <a href="{{ route('categories.create') }}" class="btn btn-primary"> Add New Category</a>

                <table class="table">
                    <thead>
                    <tr>
                        <th> Name</th>
                        <th>Description</th>
                        <th>Created On</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ date('m/d/Y H:m:i', strtotime($category->created_at)) }}</td>

                            <td>
                                <a href="{{ route('categories.show', $category) }}" class="btn btn-success">View</a>
                                <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('categories.destroy',$category) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="confirm('Are you sure ? ')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
