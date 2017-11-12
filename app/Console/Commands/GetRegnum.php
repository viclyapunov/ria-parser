<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Article;
use App\Event;
use Weidner\Goutte\GoutteFacade as Goutte;

class GetRegnum extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'regnum:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get news from https://regnum.ru/main.html';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
            $evt = new Event("regnum:get command started");
        $evt->save();
        $crawler = Goutte::request('GET', 'https://regnum.ru/main.html');
        $crawler->filter('.news-container .news-container-item')->each(function ($node) {
            $article = new Article();
            $article->link = trim($node->filter('a.news-container-item')->attr('href'));
            $article->title = trim($node->filter('.news-container-item__article .news-container-item__article-header')->text());
            $article->date = trim($node->filter('.news-container-item__datetime .news-container-item__datetime-date')->text());

            $cr = Goutte::request('GET', $article->link);
             $article->body = implode(" ", $cr->filter('.news_body p')->each(function ($node) {
                 return $node->text();
             }));


             $pattern = '/\d{2}:\d{2}/';
             $success = preg_match($pattern, $article->body, $match);
             if($success)
             {
                $article->time = trim($match[0]);
             }

             $article->pic_link_large = trim($cr->filter('.detail-main-picture-wrapper img')->attr('src'));
             $article->pic_link = $article->pic_link_large;

             $a = Article::where('link', '=', $article->link)->first();
             if ($a === null)
             {
                $article->save();
                $evt = new Event("got article from REGNUM.");
                $evt->save();
             }
        });
        $evt = new Event("regnum:get command ended.");
        $evt->save();
    }
}
