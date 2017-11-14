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
use Modules\Frontend\Entities\Event;

class EventsController extends Controller
{

    public function index(Request $request)
    {
        $events = Event::published()
            ->with('tags')
            ->with('categories')
            ->translatedIn(App::getLocale())
            ->searchByKeyword($request->search)
            ->searchByCategory($request->category)
            ->searchByTag($request->tag)
            ->paginate();

        return view('frontend::pages.events.index',['events'=> $events]);
    }

    public function detail($slug){

        $event = Event::whereTranslation('slug', $slug)->first();

        if(!$event){
            abort(404);
        }

        \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::register('frontend.events.detail', function ($breadcrumbs) use ($event) {
            $breadcrumbs->parent('frontend.events.index');
            $breadcrumbs->push($event->title, route('frontend.events.detail',['slug'=> $event->slug]),[]);
        });

        return view('frontend::pages.events.detail',['event' => $event]);
    }
}
