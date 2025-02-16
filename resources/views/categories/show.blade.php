@extends('layouts.app-layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>{{ $category->name }}</h1>
                <a href="{{  route('recipes.index') }}" class="btn btn-primary"> Back</a>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong>{{ $category->name }}</p>
                <p><strong>Description:</strong>{{ $category->description }}</p>
            </div>
        </div>
    </div>
@endsection
