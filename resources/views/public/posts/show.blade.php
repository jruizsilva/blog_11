@extends('layouts.app')

@section('title', "Post $post->id")

@section('content')
  <h1>{{ $post->title }}</h1>
  <h1>{{ $post->description }}</h1>
@endsection
