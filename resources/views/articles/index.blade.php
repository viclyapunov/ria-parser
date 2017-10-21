<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <style>
    .rounded {
      border-color: #fff;
      padding: 10px;
      -moz-border-radius: 5px;
      -webkit-border-radius: 5px;
      border-width: 1px;
    }
    img {
      max-width: 150px;
    }
    </style>
  </head>
  <body>
    <div class="container rounded">
      <ul>
        @foreach ($articles as $article)
        <div class="row poster">
          <div class="col-md-3"><img src="{{ $article->pic_link }}"></div>
          <div class="col-md-8">{{ $article->id }}.<a href="https://ria.ru{{ $article->link }}"> {{ $article->title }}</a><p>{{ $article->date }}, {{$article->time}}</p>
            <p>{{ $article->body }}</p>
          </div>
        </div>
        <hr>
        @endforeach
      </ul>
      <?= $articles->links('pagination::bootstrap-4'); ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>