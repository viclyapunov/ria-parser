@extends('articles.master')

@section('content')
          <!-- Title -->
          <h1 class="mt-4">{{ $article->title }}</h1>

          <!-- Author -->
          <p class="lead">
            by
            <a href="#">Start Bootstrap</a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Posted on {{ $article->date }} {{ $article->time }}</p>
          <hr>

          <!-- Preview Image -->
          @if(!empty($article->pic_link_large))
            <img src="{{ $article->pic_link_large }}">
          @else
            <img src="{{ $article->pic_link }}">
          @endif
          <hr>
          <!-- Post Content -->
          <p>{{ $article->body }}</p>
@endsection

@section('comments')
  @include('articles.comments-form')
@endsection
