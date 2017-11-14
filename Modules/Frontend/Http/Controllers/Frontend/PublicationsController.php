<?php
/**
 * Created by PhpStorm.
 * User: AntoanPopoff
 * Date: 16.10.2017 г.
 * Time: 12:30
 */
namespace Modules\Frontend\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Modules\Frontend\Entities\Category;
use Modules\Frontend\Entities\Post;
use Spatie\Tags\Tag;

class PublicationsController extends Controller
{

    public function index(Request $request)
    {
        $publications = Post::published()
            ->with('tags')
            ->with('categories')
            ->translatedIn(App::getLocale())
            ->searchByKeyword($request->search)
            ->searchByCategory($request->category)
            ->searchByTag($request->tag)
            ->paginate();

        return view('frontend::pages.publications.index',['publications'=> $publications]);
    }

    public function detail($slug){

        $post = Post::whereTranslation('slug', $slug)->first();

        if(!$post){
            abort(404);
        }

        \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::register('frontend.publications.detail', function ($breadcrumbs) use ($post) {
            $breadcrumbs->parent('frontend.publications.index');
            $breadcrumbs->push($post->title, route('frontend.publications.detail',['slug'=> $post->slug]),[]);
        });

        return view('frontend::pages.publications.detail',['post' => $post]);
    }
}
