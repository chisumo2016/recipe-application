@extends('layouts.app-layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>{{ $recipe->name }}</h1>
                <a href="{{  route('recipes.index') }}" class="btn btn-primary"> Back</a>
            </div>
            <div class="card-body">
                <p><strong>Description:</strong>{{ $recipe->description }}</p>
                <p><strong>Instruction:</strong>{{ $recipe->instructions }}</p>
                <p><strong>Ingredients:</strong>{{ $recipe->ingredients }}</p>
            </div>
        </div>
    </div>
@endsection
