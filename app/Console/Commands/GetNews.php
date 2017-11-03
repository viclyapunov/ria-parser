<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;
use App\Article;
use App\Event;
use Weidner\Goutte\GoutteFacade as Goutte;

class GetNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'download the news from upstream';

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
        $evt = new Event("news:get command started");
        $evt->save();
            $crawler = Goutte::request('GET',  'https://ria.ru/lenta/');
        $crawler->filter('.b-list .b-list__item')->each(function ($node) {
      $a = new Article();
      $a->link = $node->filter('a')->attr('href');


      $a->pic_link = $node->filter('a .b-list__item-img .b-list__item-img-ind img')->attr('src');

      $a->title = $node->filter('a .b-list__item-title')->text();
      $a->date = $node->filter('.b-list__item-info .b-list__item-date')->text();
      $a->time = $node->filter('.b-list__item-info .b-list__item-time')->text();

        $crawler = Goutte::request('GET', $a->link);
        $a->body = implode($crawler->filter('.b-article__body p')->each(function (Crawler $node, $i) {
            return $node->text();
        }));
        dd($a->body);

      $article = Article::where('link', '=', $a->link)->first();
      if ($article === null)
        $a->save();
    });
        $evt = new Event("got news from ria.");
        $evt->save();

    }
}
