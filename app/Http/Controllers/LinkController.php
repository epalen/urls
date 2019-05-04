<?php

namespace App\Http\Controllers;

use App\Http\Resources\Link as LinkResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Link;
use Redirect;
use URL;

class LinkController extends Controller
{
    public function index(Request $request)
    {
        $data = Link::search($request->get('criteria'))->orderBy('id','asc')->paginate(14);

        return view('home', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 14);
    }

    public function indexApi(Request $request)
    {
        $data = Link::search($request->get('criteria'))->orderBy('id','asc')->paginate(14);

        return LinkResource::collection($data);
    }

    public function showApi($id) 
    {
        $link = Link::findOrFail($id);

        return new LinkResource($link);
    }

    public function storeUrlapi(Request $request) 
    {
        $link = $request->isMethod('put') ? Link::findOrFail($request->link_id) : new Link;

        $link->id       =   $request->input('link_id');
        $link->url      =   $request->input('url');
        $link->code     =   $request->input('code');
        $link->shorten  =   $request->url($link->code);
        $link->hits     =   $request->input('hits', 1);

        if($link->save()){
            return new LinkResource($link);
        }            
    }

    public function makeUrl() 
    {
        $validator = Validator::make(Input::all(), array(
            'url' => 'required|url|max:255'
        ));

        if($validator->fails()) {

            return redirect()->route('home')->withInput()->withErrors($validator);

        } else {

            $url = Input::get('url');
            $code = null;

            $existUrl = Link::where('url', '=', $url);

            if($existUrl->count() === 1) {

                $code = $existUrl->first()->code;

                return redirect()->route('home')->with('global', 'This url ' . url($url) . ' is already taken, try again.');

            } else {

                $created = Link::create([
                    'url'   => $url,
                    'hits'  => 0
                ]);

                if($created) {

                    $code = base_convert($created->id, 10, 36);

                    Link::where('id', '=', $created->id)->update([
                        'code'      => $code,
                        'shorten'   => url($code)
                    ]);

                    Link::find($created->id)->increment('hits');

                }

            }

            if($code) {

                return redirect()->route('home')->with('global', 'All done! Here is your short URL: ' . url($code) . '')->with('success',''  . url($code) . '');
                
            }
        }

        return redirect()->route('home')->with('global', 'Something went wrong, try again');

    } 
    
    public function destroyApi($id) 
    {
        $link = Link::findOrFail($id);

        if($link->delete()){
            return new LinkResource($link);
        }
    }
}
