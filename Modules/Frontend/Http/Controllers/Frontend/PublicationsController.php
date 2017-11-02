<?php
/**
 * Created by PhpStorm.
 * User: AntoanPopoff
 * Date: 16.10.2017 г.
 * Time: 12:30
 */
namespace Modules\Frontend\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Modules\Frontend\Entities\Post;

class PublicationsController extends Controller
{

    public function index()
    {
        $publications = Post::published()->translatedIn(App::getLocale())->get();
        $post = factory(Post::class)->create();

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
