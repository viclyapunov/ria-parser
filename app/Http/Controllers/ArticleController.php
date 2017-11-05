<?php

namespace App\Http\Controllers;

use Symfony\Component\DomCrawler\Crawler;
use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function indexAction()
    {
    	$articles = Article::orderBy('id', 'desc')->paginate(15);

    	return view('articles.index', array('articles' => $articles));
    }

    public function showAction($id)
    {
    	$article = Article::findOrFail($id);

    	return view('articles.show', array('article' => $article));
    }
}
