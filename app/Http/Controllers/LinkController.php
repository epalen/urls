<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Link;
use Redirect;
use URL;

class LinkController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function make() {

        $validator = Validator::make(Input::all(), array(
            'url' => 'required|url|max:255'
        ));

        if($validator->fails()) {

            return redirect()->route('home.index')->withInput()->withErrors($validator);

        } else {

            $url = Input::get('url');
            $code = null;

            $exist = Link::where('url', '=', $url);

            if($exist->count() === 1) {

                $code = $exist->first()->code;

                return redirect()->route('home.index')->with('global', 'This url ' . url($url) . ' is already taken, try again.');

            } else {

                $created = Link::create([
                    'url'   => $url
                ]);

                if($created) {
                    $code = base_convert($created->id, 10, 36);

                    Link::where('id', '=', $created->id)->update([
                        'code'  => $code
                    ]);
                }
            }

            if($code) {

                return redirect()->route('home.index')->with('global', 'All done! Here is your short URL: ' . url($code) . '')->with('success',''  . url($code) . '');
                
            }

        }

        return redirect()->route('home.index')->with('global', 'Something went wrong, try again');

    }

    public function get($code) {
        $link = Link::where('code', '=', $code);

        if($link->count() === 1) {

            return Redirect::to($link->first()->url);
            
        }

        return redirect()->route('home.index');
    }
}
