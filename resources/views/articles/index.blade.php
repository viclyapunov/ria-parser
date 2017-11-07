@extends('articles.master')

@section('content')
      <ul>
        @foreach ($articles as $article)
        <div class="row mt-4">
          <div class="col-lg-4"><img src="{{ $article->pic_link }}"></div>
          <div class="col-lg-8">{{ $article->id }}.<a href="https://ria.ru{{ $article->link }}"> {{ $article->title }}</a><p>{{ $article->date }}, {{$article->time}}</p>
            <p>{{ str_limit($article->body, 200, '...') }}</p>
            <a href="{{ route('show', ['id' => $article->id]) }}" class="btn btn-primary btn-sm">Подробнее</a>
          </div>
        </div>
        <hr>
        @endforeach
      </ul>
      <?= $articles->links('pagination::bootstrap-4'); ?>
@endsection
