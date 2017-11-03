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



    .cssload-container{
      position:relative;
      padding-left: 70px;
      visibility: hidden;

    }

    .cssload-whirlpool,
    .cssload-whirlpool::before,
    .cssload-whirlpool::after {
      position: absolute;
      top: 50%;
      left: 50%;
      border: 1px solid rgb(204,204,204);
      border-left-color: rgb(0,0,0);
      border-radius: 774px;
        -o-border-radius: 774px;
        -ms-border-radius: 774px;
        -webkit-border-radius: 774px;
        -moz-border-radius: 774px;
    }

    .cssload-whirlpool {
      margin: -19px 0 0 -19px;
      height: 39px;
      width: 39px;
      animation: cssload-rotate 1600ms linear infinite;
        -o-animation: cssload-rotate 1600ms linear infinite;
        -ms-animation: cssload-rotate 1600ms linear infinite;
        -webkit-animation: cssload-rotate 1600ms linear infinite;
        -moz-animation: cssload-rotate 1600ms linear infinite;
    }

    .cssload-whirlpool::before {
      content: "";
      margin: -18px 0 0 -18px;
      height: 34px;
      width: 34px;
      animation: cssload-rotate 1600ms linear infinite;
        -o-animation: cssload-rotate 1600ms linear infinite;
        -ms-animation: cssload-rotate 1600ms linear infinite;
        -webkit-animation: cssload-rotate 1600ms linear infinite;
        -moz-animation: cssload-rotate 1600ms linear infinite;
    }

    .cssload-whirlpool::after {
      content: "";
      margin: -22px 0 0 -22px;
      height: 43px;
      width: 43px;
      animation: cssload-rotate 3200ms linear infinite;
        -o-animation: cssload-rotate 3200ms linear infinite;
        -ms-animation: cssload-rotate 3200ms linear infinite;
        -webkit-animation: cssload-rotate 3200ms linear infinite;
        -moz-animation: cssload-rotate 3200ms linear infinite;
    }
    @keyframes cssload-rotate {
      100% {
        transform: rotate(360deg);
      }
    }
    @-o-keyframes cssload-rotate {
      100% {
        -o-transform: rotate(360deg);
      }
    }
    @-ms-keyframes cssload-rotate {
      100% {
        -ms-transform: rotate(360deg);
      }
    }
    @-webkit-keyframes cssload-rotate {
      100% {
        -webkit-transform: rotate(360deg);
      }
    }
    @-moz-keyframes cssload-rotate {
      100% {
        -moz-transform: rotate(360deg);
      }
    }
    </style>

  </head>
  <body>

<nav class="navbar navbar-light bg-faded">
  <form class="form-inline">
    <a href="{{ route('ria-lenta-links') }}" class="btn btn-outline-success" id="download" type="button">Скачать</a>
    <div class="cssload-container" id="progress">
      <div class="cssload-whirlpool"></div>
    </div>
  </form>
</nav>



    <div class="container rounded">
      <ul>
        @foreach ($articles as $article)
        <div class="row poster">
          <div class="col-md-3"><img src="{{ $article->pic_link }}"></div>
          <div class="col-md-8">{{ $article->id }}.<a href="https://ria.ru{{ $article->link }}"> {{ $article->title }}</a><p>{{ $article->date }}, {{$article->time}}</p>
            <p>{{ str_limit($article->body, 200, '...') }}</p>
            <a href="{{ route('show', ['id' => $article->id]) }}" class="btn btn-primary btn-sm">Подробнее</a>
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
        <script>
      $('#download').click(function(){
        $('.cssload-whirlpool').css("visibility", "visible");
        $(this).prop("disabled",true);
        $(this).removeClass('btn-outline-success').addClass('btn-secondary');
      });
    </script>
  </body>
</html>
