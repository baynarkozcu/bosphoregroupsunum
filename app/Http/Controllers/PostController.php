<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
            //BU CONTROLLER İÇERİSİNDEKİ TÜM FONKSİYONLAR KULLANILACAK HER İŞLEMİ BU __construct() İÇERİSİNDE TANIMLAYABİLİRİZ. ÖR. middleware(['auth']) İMİZİ BURADA TANIMLADIK POST İLE ALAKALI HERHANGİ BİR İŞLEMDE BU METHOD ÇALIŞACAKTIR.
    public function __construct()
    {
        $this->middleware(['auth']);
    }


            //İD YE GÖRE TÜM POSTLARI TERSTEN SIRALAYIP GETİRİR..
    public function getposts(){

    $posts = Post::orderBy("id" , 'DESC')->paginate(5);


        return view('app.posts', compact('posts'));
    }



            //YENİ BİR POST EKLER..
            //ÖNCE POST İÇİN GELEN VERİLERİN DOĞRULUGU KARSILASTIRILIR..
            //SONRASINDA KULLANICININ UZERINDEN POST EDİLDİĞİ İÇİN (RELATİONS) POST U KAYDEDERKEN userID EKLEMEMİZE GEREK KALMADI
    public function addpost(Request $r){

        $this->validate($r,[
            "body" => 'required|min:25|max:1000',
            "title" => 'required',

        ]);


        $r->user()->getPost()->create([
            'title'=> $r->title,
            'content'=> $r->body,
        ]);

        return redirect()->route('getposts');
    }



            //GELEN POST ID SI TUM POSTLAR ARASINDA ARATILARAK BULUNAN POSTU SİLME İŞLEMİ YAPILIR...
    public function deletepost($id){

        $post = Post::find($id);

        $this->authorize('delete', $post);

        $post->delete();
        return back();
    }



            //GELEN POST VE ISTEK ICERİSİNDEKİ USER BİLGİSİ İLE HANGİ KULLANICININ HANGİ POSTU BEGENDİGİ KAYDEDİLİR..
    public function likepost(Post $post, Request $r){


        if($post->likedBy($r->user())){
            return response(null, 409);
        }


        if(!$post->getLikes()->onlyTrashed()->where('user_id' , $r->user()->id)->count()){
            $post->getLikes()->create([
                'user_id' =>$r->user()->id
            ]);
        }
        $post->getLikes()->onlyTrashed()->where('user_id' , $r->user()->id)->update([
            'deleted_at' => null,
        ]);
        return back();

    }


            //BEGENILEN POSTUN BEGENISINI GERİ ALMAYA YARAR.
            //ISTEK ICERISINDE Kİ USER VE GELEN POST VERİLERİ İLE KULLANICININ BEGENDIGI POSTLAR ARASINDAN BEGENDİĞİ POSTU BULUP SİLER..
    public function destroy(Post $post , Request $r){

        $r->user()->getLikes()->where('post_id', $post->id)->delete();

        return back();
    }



    public function userposts(User $user){

        $posts = $user->getPost()->orderBy('id', 'DESC')->paginate(5);

        return view('app.userposts' , compact('posts', 'user'));
    }

    public function singlepost($id){
        $post = Post::find($id);

        return view('app.singlepost', compact('post'));
    }
}
