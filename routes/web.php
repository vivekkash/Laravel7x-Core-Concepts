<?php


//use Illuminate\Support\Facades;
/* working of facade */

// class Car { // concrete class



// 	public function start(){

// 		return 'Car is started';
// 	}

// 	public function move(){

// 		return 'Car is moving';
// 	}

// 	public function break(){

// 		return 'Car is stopped';
// 	}


// }

/* Clear code no dependencies, so simple to manage */ 

//$car = new Car; 

//echo $car->start();

/* what if has lots of dependencies */

 #$car = new Car(new Fuel(new Price)) // this becomes difficult to handle everything calling and to remember, 
									  //so handle this register to service container and call same using facade

/* bind the Car to service container / registering the service in the container */

// app()->bind('car', function($app){

//  		return new Car;
// });

/* Creating a Facade for class Car */

// class CarFacade {


// 	public static function __callStatic($name, $args){

// 		//return 'Function : '.$name.' withs Args : ' .json_encode($args); /* interface class methods to statid methods */

// 		return app()->make('car')->$name(); /* resolving object car using make, way to call or retrieve the service fro the container */

// 	}


// }


// echo CarFacade::move('tst');



/* Similary Facade implementation like laravel */

// class Bill{


// 	public function getBill(){

// 		return 'Gives total Bill Amount';
// 	}

// 	public function setBill(){

// 		return 'Calculate the Total Bill Amount';
// 	}

// }


/* bind the Car to service container / registering the service in the container */

// app()->bind('bill', function($app){

//  		return new Bill;
// });



// class BillFacade {


// 	public static function __callStatic($name, $args){

// 		//return 'Function : '.$name.' withs Args : ' .json_encode($args); /* interface class methods to statid methods */

// 		return app()->make('bill')->$name(); /* resolving object car using make, way to call or retrieve the service fro the container */

// 	}


// }

// echo BillFacade::getBill();



/* So above we need to write again the same facade Bill this not good practice, now to make it generalise like laravel */


// class Facade {

// 	public static function __callStatic($name, $key){

// 		return app()->make(static::getFacadeAccessor())->$name();
// 	}

// 	protected static function getFacadeAccessor(){

// 	}
// }


// class CarFacade1 extends Facade{


// 	protected static function getFacadeAccessor(){

// 		return 'car';

// 	}

// }

// class BillFacade1 extends Facade{


// 	protected static function getFacadeAccessor(){

// 		return 'bill';
// 	}
// }

//echo BillFacade1::getBill();


/* Sample Container implementation to understand laravel container */

// class Container {


// 		protected $bindings = []; // list or array to store or register objects

// 		public function bind($name , callable $action){

// 			 $this->bindings[$name] = $action; 
// 		}


// 		public function make($name){

// 			return $this->bindings[$name](); // resolve or calls that service
// 		}

// }


// $container = new Container();

// $container->bind('book', function(){

// 	return new Book;
// });

//dump($container->make('book')); // return the object of class books



/* Complex dependencies and resolver */

// class Book{



// }


// class Author{

// 	protected $book;

// 	public function __construct(Book $book){

//          $this->book = $book;
// 	}

// }


// class price{

// 	protected $author;

// 	public function __construct(Author $author){

//          $this->author = $author;
// 	}

// }



//dump(resolve('Price')); // Its will resolves all the dependent class of price using PHP reflection, 
						// which gives details of the class
###### OR ######

//dump(app()->make('Price'));


/* Register a Service Name ASP in the AppServiceProvider */

//dump(resolve('ASP'));


/* Register a Service Name ASP in the SampleServiceProvider */

//dump(resolve('SampleSP'));

//die;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;





/*
|--------------------------------------------------------------------------
| Life cycle / Boot strapping of the laravel application wrt request
|--------------------------------------------------------------------------
|
| ENTRY POINT => public/index.php 
| 1. Entry point for all the request / Each Requeest Lands here
| 2. All the request are redirected to this file by the web server configuration	
| 3. Acts as a starting point for loading rest of the framework.
| 4. Loads the composer generated autoloader definition and then retreives
|    the intance of the laravel application from bootstrap/app.php script.
|  
| THE ACTION TAKEN BY LARAVEL ITSELF IS TO CREATE INSTANCE OF THE APPLICATION
|
|  NEXT => KERNEL,
| HTTP/ Console Kernel (app/Http/Kernel.php) Focus on HTTP Kernel 
|  1. Incoming request is sent to Kernel 
|  2. Central Location through which all the requests flows
|  3. Defines Array of bootstrappers that will be run before the request is executed
|	  such as configure handling error, configure logging, detect the application ENV.
|  4. Perform other task that need to be done before request is actually handled
|  5. Also defines list of HTTP middleware that all request must pass thru before
|     being handled by the application such as 
|		i. Reading/writing session
|		ii. verify csrf token
|		iii. Checking Application is in maintenance mode
|		iv. Other users defined custom Ops.
|  
|  Service Provider 
|  1. Most crucial kernel bootstrapping is loading the service providers of the Application.
|  2. All the service provider are configured in the config/app.php configuration file's providers Array
|  3. First the register method will be called on all providers, once the providers are registered
|     then boot method is called.
|  4. Responsible for bootstrapping all the framework components such as database, queue, validation and routing.
|
|  Dispatch Request
|  1. application is bootstrapped  
|  2. service providers have been registered  
|  3. Request is handed over to the router, to dispatch request to route, controller or middleware as defined
|
| APPLICATION INSTANCE IS CREATED => SERVICE PROVIDER ARE REGISTERED => REQUEST IS HANDED TO BOOTSTRAPPED APPLICATION
*/


/*
|--------------------------------------------------------------------------
| Service Container
|--------------------------------------------------------------------------
| In simple its an array or list of service you want to register or store and 
| call whenever required, this creates a loosely coupled implementation, if there 
| are lots of dependencies, you just need to register once and resolve or make or 
| call using make method. 
*/

/*
|--------------------------------------------------------------------------
| Service Provider
|--------------------------------------------------------------------------
| Service providers are the central place of all Laravel application bootstrapping. Your own application, as well as all of Laravel's core | services are bootstrapped via service providers.
|
*/


/*
|--------------------------------------------------------------------------
| Dependency Injection benefits
|--------------------------------------------------------------------------
| One of the primary benefits of dependency injection is the ability to swap implementations 
| of the injected class. This is useful during testing since you can inject a mock or stub 
| and assert that various methods were called on the stub.
| 
|
*/

/*
|--------------------------------------------------------------------------
| Helpers
|--------------------------------------------------------------------------
| In addition to facades, Laravel includes a variety of "helper" functions which can 
| perform common tasks like generating views, firing events, dispatching jobs, or sending 
| HTTP responses. Many of these helper functions perform the same function as a corresponding facade
| 
|
*/

/*
|--------------------------------------------------------------------------
| Contracts
|--------------------------------------------------------------------------
| Laravel's Contracts are a set of interfaces that define the core services provided by the framework. 
| For example, a Illuminate\Contracts\Queue\Queue contract defines the methods needed for queueing jobs, 
| while the Illuminate\Contracts\Mail\Mailer contract defines the methods needed for sending e-mail.
| Contracts are used to create a loosely coupled class.
| 
|
*/





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

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Maintenance Mode, taking site up and down with exception routes
|--------------------------------------------------------------------------
| Here the Middleware CheckForMaintenanceMode except is used to put routes in 
| exception while in maintenace mode. 
| Use Artisan command 'down' to take down the application in maintenance mode
| Similary command 'up' to take back up live and running
|
*/


Route::get('down/exception', function()
{
	return 'This is a page will be available even if the application is taken down for maintenance';
});

/*
|--------------------------------------------------------------------------
| Facade in laravel
|--------------------------------------------------------------------------
| Facade provide static interfaces to the closses available in an application's service container. 
| of the laravel application. 
| Laravel facades serve as "static proxies" to underlying classes in the service container.
| In Simple its a static representation or static wrapper of 
| all the non-static methods of each service provide classes.
|
| Why Facade ? 
| * Easy to remember and use over the conventional way of creating object and calling methods
| * Clean way to maintain a code
| * Easy to test
| 
| To create a facade, just need to extends Facade of core laravel application 
| Override the protected static method getFacadeAccessor() and return name of class;
|
| The Facade base class makes use of the __callStatic() magic-method to defer calls from your 
| facade to an object resolved from the container
|
*/


/* Conventional way of setting and getting cache using its concrete class */

Route::get('cache/set/{key}/{value}', function($key,$value){

	cache()->set($key,$value);

	return "Set $key => $value";

});

Route::get('cache/get/{key}', function($key){

	$value = cache()->get($key);

	return "Get $key => $value";

});


/* Facade way of calling using static method of cache */


Route::get('facade/cache/set/{key}/{value}', function($key,$value){

	Cache::set($key,$value);

	return "Facade Set $key => $value";

});

Route::get('facade/cache/get/{key}', function($key){

	$value = Cache::get($key);

	return "Facade Get $key => $value";

});


/* Regular Expression  */

Route::get('user/{name}', function ($name) {

   return 'Match the name parameter for only alphabet or throws 404';

})->where('name', '[A-Za-z]+');



/* Migration  : add this to appservice provider boot() Schema::defaultStringLength(191)*/

/* SCOUT - A driver based full text fast search provided using Algolia, as per doc you can write your own 
| custom driver for the search
|
 */ 

Route::post('search', 'PostController@search');


Route::get('search', function(){

	return view('search');
});


Route::post('post', 'PostController@storePost');

Route::get('post', function(){

  return view('post');

});

		#OR

#Route::view('post','post');

/*
|--------------------------------------------------------------------------
| COMMANDS : Create your own command
|--------------------------------------------------------------------------
| There are 2 ways to create a command
| 1. Direct - Go to routes/console.php and add/register your custom command using Artisan::command method.
| 2. Using Artisan Make - creates your custom command into namespace in App\Command and register it into App\Console\kernel.php command 
|    bucket or it will automatically load in version 7x
| 	 add the command name and parameter into signature property and handle method to write the business logic
|    paramter - $signature = 'custom:name {arg1: desc} {arg2:desc} {--O|option:optional flag}'
|    business logic - handle()
|      $this->arguments() - returns array of arguments
|	   $this->argument(arg_name) - returns the argument value
|      $this->ask() - ask question in console
|.     $this->error - throws error on the console 
|	   $this->confirm() - ask yes or no and return true or false on selection
|.     $this->comment() - show comment in the console
|.     $this->info() - show information	in the console
|	   $this->secret() - Invisible input from console,  like password
|      $this->table([colname],[data]) - Return data in table format	

*/


/*
|--------------------------------------------------------------------------
| Event and Event Listner
|--------------------------------------------------------------------------
| 
|
|	
*/


/*
|--------------------------------------------------------------------------
| Default Login and Register 
|--------------------------------------------------------------------------
| Laravel 7x npm run dev failed/error for auth package
|  - Please update the node js, it will work
| Run below commands
|  - composer require laravel/ui
|  - php artisan ui vue --auth
|  - npm install && npm run dev
|	
| Auth::user() -> return the current authenticated User
| Auth::id() -> return the current authenticated user ID
| Auth::gaurd() -> return whether the current user is logged in or not (true/false)
| 
| Middleware auth : middleware('auth') or middleware('auth:api|web')(gaurd): can be used in either route or construct method of controller 
| to restrict only authenticated user access to the  
| Auth::attempt(['email'=>'',password=>'']) : check the user table to fetch the email and then match the password
| Auth::login($user) -> login the user
| Auth::loginUsingId(1) -> login user by its ID
| Auth::logout() -> logout the current user
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); // can change the path in the RouteServiceProvide CONST Home

/* if you wanna disable register feature use below routes */

//Auth::routes(['register' => false]);.




/*
|--------------------------------------------------------------------------
| Routes collections
|--------------------------------------------------------------------------
|	
*/

## Naming the routes, helpful in accessing it by name

Route::get('blog/author', ["as"=>"author", function(){

	$url = route('author');
	return 'You are accessing URL : '.$url;

}]);

Route::get('blog/category', function(){

	$url = route('category');
	return 'You are accessing URL : '.$url;

})->name('category');

## Resourceful controller, a controller created using --resource with built in CRUD,
## Below will automatically create a CRUD routes to fetch, store, edit, delete data.
## Check using Artisan Route list

Route::resource('report','ReportController');


## Working on views - Main layouts, Pages - Home, services, contact

Route::get('view/home',function(){

	return view('pages.home');
});


Route::get('view/services',function(){

	return view('pages.services');
});


Route::get('view/contact',function(){

	return view('pages.contact');
});


/*
|--------------------------------------------------------------------------
| DB RAW QUERIES CRUD
|--------------------------------------------------------------------------
|	
*/


Route::get('raw/insert',function(){

	DB::insert('insert into posts (title, post) values (? , ?)', ['Raw Post','This post is created from Raw Post']);

});

Route::get('raw/select',function(){

	return DB::select('select * from posts where is_active=?',[1]);

});


Route::get('raw/update',function(){

	DB::update('update posts set post="This is update from the raw query" where id=?',[9]);

});

Route::get('raw/delete', function(){

	DB::delete('delete from posts where id=?',[9]);

});


/*
|--------------------------------------------------------------------------
| ELEQUENT ORM QUERIES
|--------------------------------------------------------------------------
|	
*/

### READ OPS

Route::get('orm/all',function(){

	$posts = App\Post::all();

	foreach ($posts as $post){

		echo $post.'<br>';
	}

});

Route::get('orm/find',function(){

	return  App\Post::find(1);

});


Route::get('orm/findorfail',function(){

	return  App\Post::findOrFail(10); //throws 404 if not found

});


Route::get('orm/findmany',function(){

	$posts = App\Post::findMany([1,2,3]);

	foreach ($posts as $post){

		echo $post.'<br>';
	}
});


/* chaining for multiple constraints */


Route::get('orm/chain',function(){

	$posts = App\Post::where('is_active',1)->orderBy('id','desc')->get();

	foreach ($posts as $post){

		echo $post.'<br>';
	}
});


## INSERT OPS

Route::get('orm/insert',function(){

	$post = new App\Post;

	$post->title = 'New Post';
	$post->post = 'This is new post created using ORM @'.date('d-m-Y');

	$post->save();
	
});


Route::get('orm/insertalt',function(){

	App\Post::create([

		'title' => 'New Alt Post',
		'post' => 'This is new alt post created using ORM @'.date('d-m-Y')

	]);

	 ## OR ##

	App\Post::fill([

		'title' => 'New Alt Post',
		'post' => 'This is new alt post created using ORM @'.date('d-m-Y')

	]);

});


// Multiple insert


Route::get('orm/insert/many',function(){


	$records = [[

		'title' => 'Post 12',
		'post' => 'This is post number 12'
	],[

		'title' => 'Post 13',
		'post' => 'This is post number 13'

	]];

	App\Post::insert($records);

});



## UPDATE OPS

Route::get('orm/update1',function(){

	$post =  App\Post::find(11);

	$post->title = 'New Post is updated';
	$post->post = 'This is new post updated using ORM @'.date('d-m-Y');

	$post->save();

});

Route::get('orm/update2',function(){

	 App\Post::where('id',10)->update(['title'=>'New Alt post updated','post'=>'This is new post updated using ORM @'.date('d-m-Y')]);	
	
});


## SPECIAL QUERIES

#firstOrCreate
#firstOrNew
#updateOrCreate


## DELETE


Route::get('orm/delete1',function(){

	$post = App\Post::find(13);

	$post->delete();

});


Route::get('orm/delete2',function(){

	App\Post::destroy([12,13]);

});


Route::get('orm/delete3',function(){

	$post = App\Post::where('id',10)->delete();

});


## SOFT DELETE

# use softdeletes

# withTrashed()->get() // get the deleted record as well in the result

# onlyTrashed()->get() //get only deleted record

# onlyTrashed()->find()->restore() // restore the deleted record means it make the deleted at column as null

# onlyTrashed()->find()->forceDelete() // permanent delete the record from the database can't be restored



/*
|--------------------------------------------------------------------------
| TINKER : CLI playground to play around with your application
|--------------------------------------------------------------------------
| if tinker is not working and exiting follow below steps - 
|	- sudo vim ~/.config/psysh/config.php
|   - Paste 
|        <?php
|          return [
|		            'usePcntl' => false,
|				]; 
|
*/


/*
|--------------------------------------------------------------------------
| Relationships
|--------------------------------------------------------------------------
| 
|
|

*/

## One to One relationship , one user to Many post

Route::get('user/oo/post', function(){

	$user = App\User::find(1);

	return $user->postOne;

});

## One to Many relationship , one user to Many post 

Route::get('user/oo/post', function(){

	$user = App\User::find(1);

	return $user->postOne;

});



## One to One Reverse relationship , one post belongs to one user

Route::get('post/oo/user', function(){

	$post = App\Post::find(1);

	dd($post->user->name);

});


## Many to Many relationship, users has many to many relation to roles vice versa.

## Users with multiple roles
  
Route::get('user/mm/roles', function(){

	$user = App\User::find(1);

	foreach($user->roles as $role){

		echo $role.'<br>';
	}

});



## Role assigned to multiple users
  
Route::get('role/mm/users', function(){

	$role = App\Role::find(1);

	foreach($role->users as $user){

		echo $user.'<br>';
	}

});


## hasManyThrough relation, post->user->country

## here post dont have any relation with country but have common relation users through which a connection 
## can be eastablish between post and country using hasManyThrough as one country has Many posts via user.
## Note no need to create a country_id as foreign key in users table

Route::get('country/om/posts', function(){

	$country = App\Country::find(1);

	foreach($country->posts as $post){

		echo $post.'<br>';
	}

});


## hasOneThrough relation, post->user->country

## here post dont have any relation with country but have common relation users through which a connection 
## can be eastablish between post and country using hasOneThrough as assuming one country has one post via user.
## Note no need to create a country_id as foreign key in users table

Route::get('country/om/post', function(){

	$country = App\Country::find(1);

	return $country->post;

});


## Polymorphic one to one

## Polymorphic is used to create a relation with more than one table.
## Example table images can have relation with both users and posts.


Route::get('post/oo/image', function(){

	$post = App\Post::find(1);

	return $post->image;

});


Route::get('image/oo/post', function(){

	$image = App\Image::find(1);

	return $image->imageable;

});

## Similary you can do with users and its image.


## Polymorphic one to Many

## Similar to the one to one just use morphMany() method in the model



/*
|--------------------------------------------------------------------------
| Middleware
|--------------------------------------------------------------------------
|	
*/


Route::get('admin',function(){


	return 'welcome to Admin page';

})->middleware('role');


/*
|--------------------------------------------------------------------------
| Artisan calls via Route
|--------------------------------------------------------------------------
|	
*/



Route ::get('cache/clear', function(){

	Artisan::call('cache:clear');

	return 'Application Cache is Cleared !!! ';
});



/*
|--------------------------------------------------------------------------
| Cache : File/ DB/ Redis
|--------------------------------------------------------------------------
|	use Illuminate\Support\Facades\Cache;
|   
|   Using DB need to run to create a cache schema: php artisan cache:table
|	
|	Runtime select to driver to store data   
|	
|	Cache::store('file')->get('foo');
|	Cache::store('redis')->put('bar', 'baz', 600); // 10 Minutes
|
|
|	FETCHING KEYS
|	Cache::get('key');
|   Cache::get('key', 'default');
|	Cache::get('key', function () {
|    	return $defaultValue
|	});
|
|   EXISTING KEY
|.  Cache::has('key')
|
|.  INCREMENT/DECREMENT 
|   Cache::increment('key');
|.  Cache::increment('key', $amount);
|.  Cache::decrement('key');
|.  Cache::decrement('key', $amount);
|
|
|   you may wish to retrieve all users from the cache or, if they don't exist, 
|.  retrieve them from the database and add them to the cache
|
|	Cache::remember('users', $seconds, function () {
|    	return DB::table('users')->get();
|	});
|
|.  Similarly, rememberforever to store permanently
|.  
|.  Cache::rememberForever('users', function () {
|    	return DB::table('users')->get();
|	});
|	
|	RETRIEVE & DELETE
|.  Cache::pull('key');  -> Retreive and delete the key
|
|.   STORE
|    put('key', 'value', $seconds); or Cache::put('key', 'value', now()->addMinutes(10));
|.   Cache::put('key', 'value');
|	 add('key', 'value', $seconds); -> will add only if the key doesnt exist & return true else false
|.   Cache::forever('key', 'value'); -> The forever method may be used to store an item in the cache permanently
|.  
|    DELETE/REMOVE
|.   Cache::forget('key');
|.   Cache::put('key', 'value', 0); or Cache::put('key', 'value', -5);
|
|.   CLEAR ENTIRE CACHE
|.   Cache::flush();
|
*/


/*
|--------------------------------------------------------------------------
| Collection
|--------------------------------------------------------------------------
|	Laravel provides a fluent, convienent wrapper for working with arrays of 
|   data.
|
|
*/


/*
|--------------------------------------------------------------------------
| Storage
|--------------------------------------------------------------------------
|	
| Explicitly specifying storage driver local/s3
|   Storage::disk('local')->put('file.txt', 'Contents'); or Storage::disk('s3')->put('avatars/1', $fileContents);
|
| RETRIEVING FILE
| Storage::get('file.jpg');
|
| CHECK IF EXIST   
| Storage::disk('s3')->exists('file.jpg'); 
|
| DOWNLOAD FILE
| Storage::download('file.jpg');
| Storage::download('file.jpg', $name, $headers);
|
| UTILITY
| Storage::url('file.jpg'); -> Gives the complete url for the storage
| Storage::size('file.jpg'); -> size of the file
| Storage::prepend('file.log', 'Prepended Text');
| Storage::append('file.log', 'Appended Text');
| Storage::copy('old/file.jpg', 'new/file.jpg');
| Storage::move('old/file.jpg', 'new/file.jpg');
|
| FILE UPLOAD
| Storage::putFile('avatars', $request->file('avatar'));
|
| DELETE FILE
| Storage::disk('s3')->delete('folder_path/file_name.jpg');
| Storage::delete(['file.jpg', 'file2.jpg']);
| Storage::delete('file.jpg');
|
*/


/*
|--------------------------------------------------------------------------
| Notification
|--------------------------------------------------------------------------
| Notifications should be short, informational messages that notify users of something that occurred in your application.
|
| Creating Notification - 
|	php artisan make:notification nameofjob
| 
| Notification can be sent using various delivery channel like
| - mail	
| - SMS via Vonage
| - Slack
| - Also, can be stored in DB, if you want to display on the website.	
|		For DB : 1. Run the migration : php artisan notification:table && php artisan migrate
|				 2.if only db required for notification change via() array to ['database'] else if 
|				    mail and db both required put ['database','mail']
|				 3. Pass the data required in toArray() ['key'=>'value'] or constructor injected class object	
|
| Pushing Notification By
| - notify() of Notifiable trait
|	Ex. $user->notify(new yourNotJobclass($x)); $user -> App\User Model Object ; $x -> injected class (if any)
|
| - Or Notification Facade
| 	Ex. Notification::send($users, new yourNotJobclass($x)); $user -> App\User Model Object ; $x -> injected class (if any)
|
*/

Route::get('notify/message',function(){

	return 'You are here as you received the New Letter Update, wait for the Magic !!!, Thank you';

});


Route::get('notify/users',function(){

	##Instead of using Carbon, you can use helper now(), ex now()->addMinutes(10);

	#$user->notify((new App\Notifications\NewsLetterNotification())->delay(Carbon\Carbon::now()->addSeconds(10)));

										#OR

	Notification::send(App\User::all(), (new App\Notifications\NewsLetterNotification())->delay(Carbon\Carbon::now()->addSeconds(10)));

});

## On demand notification : If you want to send notification to non system user

Notification::route('mail', 'vivekkashyap97@home23.com')
           // ->route('nexmo', '5555555555') // for SMS
           // ->route('slack', 'https://hooks.slack.com/services/...') // for slack
            ->notify(new App\Notifications\NewsLetterNotification());







/*
|--------------------------------------------------------------------------
| Task Scheduling 
|--------------------------------------------------------------------------
| Add below Cron on the server, only one is required
| * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
|	
| Add the Job in the schedule method of App\Console\Kernel.php
| 
| Scheduling Task:
|
|  call method -> 
|	
|		$schedule->call(function () {
|           DB::table('recent_users')->delete();
|        })->daily() or ->everyMinute() or ->everyTwoMinutes() or -> weekly() or ->monthly() ...
|
|
|	// Run once per week on Monday at 1 PM...
|		$schedule->call(function () {
|   //
|		})->weekly()->mondays()->at('13:00');
|
|	// Run hourly from 8 AM to 5 PM on weekdays...
|		$schedule->command('foo')
|          ->weekdays()
|          ->hourly()
|          ->timezone('America/Chicago')
|          ->between('8:00', '17:00'); or ->days([0, 3]); //sunday and wednesday only
|		   ->environments(['staging', 'production']);  // env 
|		   ->at('02:00') // at specific time
|		  ->runInBackground(); // allows to run in background simultaneously as in foreground it run sequentially
|		  ->appendOutputTo($filePath); or ->sendOutputTo($filePath) // log the output to a file
|		  ->emailOutputTo('foo@example.com'); // email the output 
|
|
*/



/*
|--------------------------------------------------------------------------
| Laravel Mix (compiling assets)
|--------------------------------------------------------------------------
|	Basically, it compiles the all the js and css into app.js and app.css (using sass)
|   Development : npm run dev - its will just compile your js and css
|   Production : npm run production - its will compile as well as minify js and css.
|   
|   watcher : npm run watch - run behind the scene to detect any changes if so it will auto recomile the files
|
|   BrowserSycn : if you add browser sych to webpack.js it will automically refresh the browse if it detects a change in the files.
|
*/


/*
|--------------------------------------------------------------------------
| Laravel Localization
|--------------------------------------------------------------------------
|	Localization is useful when you want to implements a multi lingual website.
|
|	App::setLocale($lang) to change the default locale to required one, to check {{ config('app.locale') }}
|
|   create a lang folder in resource/lang ex. fr for france
|	create a .php file ex. nav.php for navigation set of keywords return array of key to lang specific value for each lang folder 
|	Replace the target word with the variable {{ __(nav.home) }}  or @lang('nav.home')
|.  If you want pass variable use :x (x is variable) in the nav.php value against required variable key => value
|
|	If you want to change the default locale go to config/app.php change fallback_locale parameter
| 
*/


Route::get('locale/{lang?}', function($lang=null){

	App::setLocale($lang);

	return view('pages.home');

});


/*
|--------------------------------------------------------------------------
| Laravel Mail
|--------------------------------------------------------------------------
| Generating Mailable 
|  
| 1. Creating EmailJob
|	 make:mail emailJobName
| 2. Using build() method to write the content logic to send email	
|	 $this->from(senderEmail)->view('emailtemplate')->with([data]);
| 3. sending Email
|    Mail::to($recipient)->send(new emailJobName(data class, if any))
|
*/


/*
|--------------------------------------------------------------------------
| Laravel Queue
|--------------------------------------------------------------------------
| Setting Configuration of Queue as per the requirement in env and config/queue.php
|	
| Creating Job // php artisan make:job JobName
| Dispatching Job  // Job::dispatch();
| Running the Queue worker //php artisan queue:work
| Supervisor configuration // need to install supervisor its a linux based service
| Handling the failed Jobs
|	- Register below is boot method of Appserviceprovider
|	Queue::failing(function (JobFailed $event) {
|           // $event->connectionName
|            // $event->job
|            // $event->exception
|       });
|
| Job events //
|	- Register below is boot method of Appserviceprovider to perform before and after queue is processed
|Queue::before(function (JobProcessing $event) {
|            // $event->connectionName
|            // $event->job
|            // $event->job->payload()
|        });
|
|        Queue::after(function (JobProcessed $event) {
|            // $event->connectionName
|            // $event->job
|            // $event->job->payload()
|        });
|
| ###############################
| Moving specific queue to high priority
|php artisan queue:work --queue=high,default
|
*/


/*
|--------------------------------------------------------------------------
| Events & Listener
|--------------------------------------------------------------------------
| 1. Generating the events & listener
|    php artisan event:generate
| 
|
*/

Route::get('event/{name}',function($name){

	return event(new App\Events\NewUser("New User $name is created"));

});

/*
|--------------------------------------------------------------------------
| Gates and Policy
|--------------------------------------------------------------------------
| 
| 
|
*/



/*
|--------------------------------------------------------------------------
| Laravel 7x new features
|--------------------------------------------------------------------------
|	
*/


## Component

Route::get('post/list',function(){

	return view('pages.post-list',['data'=>'Listing']);
});


## Guzzle / CURL

/*

$response->body() : string;
$response->json() : array|mixed;
$response->status() : int;
$response->ok() : bool;
$response->successful() : bool;
$response->failed() : bool;
$response->serverError() : bool;
$response->clientError() : bool;
$response->header($header) : string;
$response->headers() : array;


$response = Http::post(url, [parameters]); // default as application/json
$response = Http::get(url, [parameters]);
$response = Http::asForm()->post(url, [parameters]); // x-www-form-urlencoded headers
$response = Http::withBody(base64_encode($photo), 'image/jpeg')->post('http://test.com/photo'); //raw body

$photo = fopen('photo.jpg', 'r');
$response = Http::attach('attachment', $photo, 'photo.jpg')->post('http://test.com/attachments'); //multi-part attachment

$response = Http::withHeaders(['X-First' => 'foo','X-Second' => 'bar'])->post('http://test.com/users', [
    'name' => 'Taylor',
]); // with custom headers

$response = Http::withBasicAuth('taylor@laravel.com', 'secret')->post(...) //// Basic authentication...
$response = Http::withToken('token')->post(...); // bearer token

$response = Http::timeout(3)->get(...); //set timeout for the request
$response = Http::retry(3, 100)->post(...); // set the number of retries of request with intervals



*/

Route::get('guzzle', function(){

	$response = Http::get('https://jsonplaceholder.typicode.com/todos/1');

	echo '<pre>';

	echo 'status : '.$response->status().'</br>';

	echo 'cookies Data :</br>';

	print_r($response->cookies());

	echo 'Headers Data :</br>';

	print_r($response->headers());

	echo 'Json Data : </br>';

	print_r($response->json()).'</br>';

	//$response->json());

});

## Fluent string

Route::get('fluent',function(){

	$text = '    This is a tutorial about laravel 7x along with its new features';

	return Str::of($text)
				->trim()
				->ucfirst()
				->upper()
				->replace(' ','-');
});

## Stubs

## Run artisan command stub:publish




 
 
