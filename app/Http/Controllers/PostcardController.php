<?php

namespace App\Http\Controllers;

use App\Postcard;
use Illuminate\Http\Request;
use Redirect;
use GuzzleHttp\Client;

class PostcardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Counts files in directory
     * 
     * @param path of dir to count files in
     * @return count as int
     */
    public static function filecount($directory){
        $filecount = 0;
        $files = glob($directory . "*");
        if ($files){
            $filecount = count($files);
        }
        return $filecount;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }
    public function store($coordinate)
    {
        if($this->coordinateHasImage($coordinate)) {
            $postcard = New Postcard;
            $postcard->lat = str_before($coordinate, ',');
            $postcard->lng = str_after($coordinate, ',');
            $postcard->img = rand ( 1 , PostcardController::filecount("img/") );
            $postcard->heading = rand ( 0 , 360 );
            $postcard->save();
            return "Postcard saved";
        }

        return "Could not find image at that location";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Postcard  $postcard
     * @return \Illuminate\Http\Response
     */
    public function show(Postcard $postcard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Postcard  $postcard
     * @return \Illuminate\Http\Response
     */
    public function edit(Postcard $postcard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Postcard  $postcard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postcard $postcard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Postcard  $postcard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postcard $postcard)
    {
        //
    }

    private function coordinateHasImage($coordinate)
    {
        $client = new Client();
        $res = $client->get(  'https://maps.googleapis.com/maps/api/streetview/metadata?size=600x300&location=' . $coordinate . '&fov=90&heading=235&pitch=10&key=AIzaSyBfxkwsWMYydfa2FBkVO1i-Knux6e6HMLo');
        return json_decode($res->getBody()->getContents())->status == "OK";
    }
}
