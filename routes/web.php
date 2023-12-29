<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;
use App\Models\Tag;
use App\Models\Taggable;
use Illuminate\Support\Facades\Route;
use App\Models\Controllers\PostController;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');


// });
//Route::get('/about', function () {
//    return "hii about";
//});
//Route::get('/contact', function () {
  //  return "hii contact";
//});
//Route::get('/post/{id}/{name}',function($id,$name){
  //  return "This is post name and number". $id ."". $name;


//});

//Route::get('admin/post/example',array('as'=>'admin.home',function(){
  //  $url=route('admin.home');
    //return "this url is" . $url;

//}));



// //Route::get('/post/{id}','Postcontroller@index');
// Route::resource('post','PostController');

// Route::get('/contact','PostController@contact');

// Route::get('posts/{id}/{name}/{pass}','PostController@show_post');

/*
|-----------------------------------------------
DATABSE RAW QUIERIES
|-----------------------------------------------
*/
// Route::get('/insert',function(){
  
//   DB::insert('insert into posts(title,content) values(?,?)',['php with sql','larawel with mysql']);
// });


// Route::get('/read',function(){

//   $results=DB::select('select * from posts where id=?',[1]);

// return var_dump($results);

  // foreach($results as $post){

  //   return $post->title;

  // }
// });

// Route::get('/update',function(){

//   $update=DB::update('update posts set title="update title" where id=?',[1]);

//   return $update;

// });


// Route ::get('/delete',function(){

//   $delete=DB::delete('delete from posts where id=?',[1]);

//   return $delete;


// });



/*
|-----------------------------------------------
ELOQUENT
|-----------------------------------------------
*/

// Route::get('/read',function(){

//   $posts=Post::all();

//   foreach($posts as $post){

//     return $post->title;



//   }

// });

// Route::get('/find',function(){

//   $posts=Post::find(2);

//   return $posts->title;

  // foreach($posts as $post){

  //   return $post->title;



  // }

// });


// Route::get('/findwhere', function(){
//   $posts=Post::where('id',3)->orderBy('id', 'desc')->get();

//   return $posts;

// });


// Route::get('/findmore',function(){

//   // $posts=Post::findOrFail(2);

//   // return $posts;

//   $posts =Post::where('users_count','<','50')->firstOrFail();

// });


// Route::get('/basicinsert2',function(){

//   $post=Post::find(2);

//   $post->title='New Eloquent insert2';
//   $post->content='this is owsome';

//   $post->save();


// });

// Route::get('/create',function(){

//   Post::create(['title'=>'the create method','content'=>'I\' m learning a lot with php']);

// });

// Route::get('/update',function(){

//   Post::where('id',2)->where('is_admin',0)->update(['title'=>'new php title','content'=>'I love Ishan Gogappa']);

// });

// Route::get('/delete',function(){

//   $post=Post::find(7);
//   $post->delete();

// });


// Route::get('/delete2',function(){

//   Post::destroy([4,5]);

//   // Post::where('is_admin',0)->delete();

// });

// Route::get('/softdelete',function(){

//   Post::find(7)->delete();

// });
// Route::get('/readsoftdelete',function(){

//   // $posts=Post::find(6);
//   // return $posts;
//     // $posts=Post::withTrashed()->where('is_admin',0)->get();
//     // return $posts;
//     $posts=Post::onlyTrashed()->where('is_admin',0)->get();
//     return $posts;

// });

// Route::get('/restore',function(){

//   Post::withTrashed()->where('is_admin',0)->restore();

// });
// Route::get('/forcedelete',function(){

//   Post::withTrashed()->where('id',6)->forceDelete();
//    Post::onlyTrashed()->where('id',6)->forceDelete();
// });

/*
|-----------------------------------------------
ELOQUENT Relatioship
|-----------------------------------------------
*/

//one to one relationship
// Route::get('/user/{id}/post',function($id){

//   return User::find($id)->post->content;

// });

// //inverse relationship

// Route::get('post/{id}/user',function($id){

//   return Post::find($id)->user->name;

// });

//one to many relationship

// Route::get('/posts',function(){

//   $user=User::find(1);

//   foreach($user ->posts as $post){

//    echo $post->title."<br>";


//   }

// });

//many to many relatioship

  // Route::get('/user/{id}/role',function ($id){

  //   $user=User::find($id)->roles()->orderBy('id','desc')->get();

  //   return $user;

  //   // foreach($user->roles as $role ){

  //   //   return $role->name;
  //   // }

  // });


// //accessing the intermediate table/pivot

//     Route::get('/user/pivot',function(){

//       $user=User::find(1);

//       foreach($user->roles as $role){

//         return $role->pivot->created_at;
//       }

//     });


//     Route::get('/user/country',function(){

//       $country=Country::find(4);

//       foreach($country->posts as $post){

//         return $post->title;

//       }
//     });

//Polymorfic relationship


// Route::get('user/photos',function(){

//   $user=User::find(1);

//     foreach($user->photos as $photo){

//       return $photo->path;

//     }

// });
// Route::get('post/{id}/photos',function($id){

//   $post=Post::find($id);

//     foreach($post->photos as $photo){

//       echo $photo->path."<br>";

//     }

// });

Route::get('photo/{id}/post',function($id){

 $photo= Photo::findOrFail($id);

 return $photo->imageable;

});

//many to many polymorphic

Route::get('post/tag',function(){
  
  $post=Post::find(2);

  echo $post;

  // foreach($post->tags as $tag){

  //   echo $tag;

  // }
});



// Route::get('tag/post',function(){

//   $tag=Tag::find(2);

   
//   foreach($tag->posts as $post){

//     return $post->title;
//       }

// });



/*
|-----------------------------------------------
CRUD APPLICATION
|-----------------------------------------------
*/


Route::group(['middleware'=>'web'],function(){
  
Route::resource('/posts','PostController');

Route::get('/dates',function(){

  $date=new DateTime('+1 week');

  echo $date->format('m-d-y');

  echo '<br>';

  echo Carbon::now()->addDays(10)->diffForHumans();

  echo '<br>';

  echo Carbon::now()->subMonths(5)->diffForHumans();

  echo '<br>';

  echo Carbon::now()->yesterday();

  echo '<br>';

});

Route::get('/getname',function(){

  $user = User::find(3);

  echo $user->name;

});

Route::get('/setname',function(){

  $user = User::find(3);

  $user->name="prem" ;

  $user->save();


});

Route::get('/setname',function(){

  $user = User::find(3);

  $user->name="prem" ;

  $user->save();


});

});