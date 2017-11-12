<?php
use Symfony\Component\DomCrawler\Crawler;
use App\Http\Resources\Article as ArticleResource;
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
    Artisan::call('news:get');
})->name('ria-lenta-links');

Route::get('/articles', 'ArticleController@indexAction')->name('articles');

Route::get('/article-bodies', function () {
    $crawler = Goutte::request('GET', 'https://ria.ru/lenta/');
    $crawler->filter('.b-list .b-list__item')->each(function ($node) {
        $link = $node->filter('a')->attr('href');
        $crawler = Goutte::request('GET', $link);
        $body = $crawler->filter('.b-article__body')->text();
    });
});

Route::get('article/{id}', 'ArticleController@showAction')->name('show');

Route::get('/articlesapi', function () {
    return ArticleResource::collection(Article::all());
});
