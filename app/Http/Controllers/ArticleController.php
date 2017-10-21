<?php

namespace App\Http\Controllers;

use Symfony\Component\DomCrawler\Crawler;
use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function showAction()
    {
    	$articles = Article::orderBy('id', 'desc')->paginate(15);

    	return view('articles.index', array('articles' => $articles));
    }
}
