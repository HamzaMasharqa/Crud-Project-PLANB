<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\crudpost;

class pagesController extends Controller
{
    public function getPost()
    {
        $posts = \App\Models\crudpost::paginate(7);
        return view('main', compact('posts'));
    }

    public function deletePost($id)
    {
        $postToDelet = crudpost::find($id);
        $postToDelet->delete();

        return redirect('main');
    }
    public function insrtPost(Request $req)
    {
        echo 'im also here';
        // echo $req;

        $name = $req->file('image');
        $image_name = $name->getClientOriginalName();
        $path = 'public/images/';
        echo $path . $image_name;
        $send = $req->file('image')->saveAs($path, $image_name);

        if ($req['check'] == null) {
            $check = 0;
            echo $check;
        } else {
            $check = 1;
            echo $check;
        }

        $post = new crudpost();
        $post->title = $req['title'];
        $post->active = $check;
        $post->blog = $req['blog'];
        $post->image = $image_name;

        $post->save();
        // echo 'im here';
        return redirect('/main');
    }
}
