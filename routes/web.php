<?php
use Symfony\Component\DomCrawler\Crawler;
use App\Article;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return redirect('/articles');
});

Route::get('/ria', function () {
	$crawler = Goutte::request('GET',  'https://ria.ru/');
    $crawler->filter('.b-index__main-list-place li')->each(function ($node) {
      dump($node->text());
    });
    //return view('welcome');
});

Route::get('/ria-lenta', function () {
	$crawler = Goutte::request('GET',  'https://ria.ru/lenta/');
    $crawler->filter('.b-list .b-list__item a .b-list__item-title')->each(function ($node) {
      dump($node->text());
    });
    //return view('welcome');
});

Route::get('/ria-lenta-links', function () {
	$crawler = Goutte::request('GET',  'https://ria.ru/lenta/');
    $crawler->filter('.b-list .b-list__item')->each(function ($node) {
      $a = new Article();
      $a->link = $node->filter('a')->attr('href');
      $a->pic_link = $node->filter('a .b-list__item-img .b-list__item-img-ind img')->attr('src');

      $a->title = $node->filter('a .b-list__item-title')->text();
      $a->date = $node->filter('.b-list__item-info .b-list__item-date')->text();
      $a->time = $node->filter('.b-list__item-info .b-list__item-time')->text();
      $article = Article::where('link', '=', $a->link)->first();
      if ($article === null)
      	$a->save();
    });
    //return view('welcome');
});

Route::get('/articles', 'ArticleController@showAction');
