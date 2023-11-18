<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*Task2
Route::get('about', function () {
  return 'About';
});
Route::get('contact', function () {
  return 'Contact us';
});

Route::prefix('support')->group(function(){

  Route::get('/',function(){
  return 'Support Us';
  });

  Route::get('chat',function(){
    return 'Chat with us';
    });

  Route::get('call',function(){
    return 'Call';
      });

  Route::get('ticket',function(){
    return 'Ticket';
          });    
    });
    Route::prefix('training')->group(function(){

      Route::get('/',function(){
      return 'Training';
      });
    
      Route::get('hr',function(){
        return 'HR';
        });
    
      Route::get('ict',function(){
        return 'ICT';
          });
    
      Route::get('marketing',function(){
        return 'Marketing';
            });
      Route::get('logistics',function(){
                return 'Logistics';
             });    
        });
*/ 
        //** Third lecture **//
      Route::get('/', function () {
          return view('welcome');
        });
        // Route::fallback(function(){
        //   return redirect('/');
        // });

      // Route::get('cv', function(){
      //   return view('cv');
      // });
      Route::get('login', function () {
        return view('login');
      });
      Route::get('task3', function () {
        return view('task3');
      });
      
      Route::post('receive', function(){
          return 'Data received';
        })->name('receive');
        
        //**Task 3**/
      Route::post('submit', function(){
          $arr=array();
          $arr[]="The title of the car is: ". $_POST["title"];
          $arr[]="The price is: ". $_POST["price"];
          $arr[]="The description is: ". $_POST["description"];
          $arr[]="It is: ". $_POST["remember"];
          return $arr;
        })->name('submit');

      Route::get('test1',[ExampleController::class, 'test1']);

//**SECOND LECTURE**//
/*
Route::get('/', function () {
  return view('welcome');
});

Route::get('test', function () {
    return 'welcome ghada';
});
Route::get('user/{name}/{age?}', function ($name, $age=0) {
    $msg= "Name is: ". $name;
   // return 'welcome '. $name. "<br>". ' age is '. $age;
    if ($age>0)
    {
      $msg .= ' and age is: '. $age;
    } 
    return $msg;
})->where(['age' => '[0-9]+', 'name' => '[a-zA-Z0-9]+']);
//->whereAlpha('name');
//->whereNumber('age');
//->where(['age' => '[0-9]+']);

Route::prefix('product')->group(function(){

  Route::get('/',function(){
  return 'products home page';
  });

  Route::get('laptop',function(){
    return 'laptop page';
    });

  Route::get('camera',function(){
    return 'camera page';
      });
    });*/