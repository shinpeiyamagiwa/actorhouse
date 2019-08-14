<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\FavoriteActor;
use App\FavoriteMovie;
use App\WatchList;
use App\Review;
use App\Post;
use App\Follow;
use App\PostComment;
use App\Evaluate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        // 現在認証されているユーザーのID取得
        $id = Auth::id();
        
        $favorite_actors = FavoriteActor::join('actors', 'favorite_actors.actor_id', '=', 'actors.tmdb_id')
                                        ->where('favorite_actors.user_id', '=', $id)
                                        ->select('tmdb_id', 'actors.name', 'actors.image_path', 'new')
                                        ->get();

        $favorite_movies = FavoriteMovie::join('movies', 'favorite_movies.movie_id', '=', 'movies.tmdb_id')
                                        ->where('favorite_movies.user_id', '=', $id)
                                        ->select('tmdb_id', 'movies.title', 'movies.image_path')
                                        ->get();

        $evaluate_avg = Evaluate::where('user_id', '=', $id)
                        // ->select('evaluate')
                        ->avg('evaluate');
                    
        $evaluates = Evaluate::join('movies', 'evaluates.movie_id', '=', 'movies.tmdb_id')
                        ->where('user_id', '=', $id)
                        ->select('movies.title', 'evaluate', 'evaluates.movie_id', 'evaluates.id as evaluate_id', 'movies.image_path')
                        ->orderBy('evaluates.id', 'desc')
                        ->get();
        $reviews = Review::join('movies', 'reviews.movie_id', '=', 'movies.tmdb_id')
                        ->where('user_id', '=', $id)
                        ->select('movies.title', 'evaluate', 'content', 'tmdb_id', 'reviews.id as review_id', 'movies.image_path', 'genre')
                        ->orderBy('reviews.id', 'desc')
                        ->get();
        
                // $action_movies = [];
                // $suspense_movies = [];
                // $drama_movies = [];
                // $comedy_movies = [];
                // $horror_movies = [];
                // $evaluates = [];

                // foreach ($reviews as $review) {
                //     array_push($evaluates, $review->evaluate);
                // }
        $watch_lists = WatchList::join('movies', 'watch_lists.movie_id', '=', 'movies.tmdb_id')
                                        ->where('watch_lists.user_id', '=', $id)
                                        ->select('tmdb_id', 'movies.title', 'movies.image_path')
                                        ->get();
                                       
        $posts = Post::where('user_id', '=', $id)
                    ->select('content', 'user_id', 'posts.id')
                    ->orderBy('id', 'desc')
                    ->get();
        // $post_comments = PostComment::join('users', 'users.id', '=', 'post_comments.user_id')
        //                             ->join('posts', 'posts.id', '=', 'post_conments.posts_id')
        //                             ->where('post_comments.posts_id', '=', 'posts.id')
        //                             ->orderBy('post_comments.created_at', 'desc')
        //                             ->select('users.name', 'users.id', 'post_comments.content', 'users.image_path')
        //                             ->get();
        
        $follow_reviews = Follow::join('reviews', 'follow_id', '=', 'reviews.user_id')
                                ->join('users', 'follow_id', '=', 'users.id')
                                ->leftjoin('movies', 'reviews.movie_id', '=', 'movies.tmdb_id')
                                ->where('follower_id', '=', $id)
                                ->orderBy('reviews.created_at', 'desc')
                                ->select('tmdb_id','reviews.content', 'reviews.id', 'users.name', 'users.image_path as user_image', 'user_id', 'movies.title', 'evaluate', 'movies.image_path as movie_image')
                                ->get();
        
        $follow_posts = Follow::join('posts', 'follow_id', '=', 'posts.user_id')
                                ->join('users', 'follow_id', '=', 'users.id')
                                ->leftjoin('actors', 'posts.actor_id', '=', 'actors.tmdb_id')
                                ->where('follower_id', '=', $id)
                                ->orderBy('posts.created_at', 'desc')
                                ->select('posts.content', 'users.name as user_name', 'users.image_path', 'user_id', 'actors.name as actor_name', 'actors.tmdb_id', 'actors.image_path as actor_image', 'posts.id')
                                ->get();
        $follow_tweets = Follow::join('tweets', 'follow_id', '=', 'tweets.user_id')
                                ->join('users', 'follow_id', '=', 'users.id')
                                ->orderBy('tweets.created_at', 'desc')
                                ->select('tweets.content', 'users.name as user_name', 'users.image_path', 'user_id')
                                ->get();

        $watch_actors = Evaluate::join('casts', 'evaluates.movie_id', '=', 'casts.movie_id')
                            ->leftJoin('actors', 'casts.actor_id', '=', 'actors.tmdb_id')
                            ->whereNotNull('actors.image_path')
                            ->where('evaluates.user_id', '=', $id)
                            ->select(\DB::raw('count(*) as actor_count, casts.actor_id'),'actors.name','actors.tmdb_id','actors.image_path')
                            ->groupBy('casts.actor_id','actors.name','actors.tmdb_id','actors.image_path')
                            ->orderBy('actor_count', 'desc')
                            ->orderBy('casts.actor_id', 'asc')
                            ->limit(20)
                            ->get();
        

        return view('home', compact('user','favorite_actors','evaluate_avg',
        'watch_lists', 'reviews', 'posts', 'favorite_movies', 
        'follow_reviews', 'follow_posts', 'follow_tweets', 'watch_actors','evaluates'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
