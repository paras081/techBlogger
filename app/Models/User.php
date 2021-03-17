<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //accessing pivot table
    public function roles_name(){
        return $this->belongsToMany('App\Models\Role');
        //give me Role_names belongs to  specified user_id and for that query pivot table role_user and fetch all roles(role_id) belongs to mentioned user_id and than find the user_name as per role_id from roles table
    }

    //to create pivot tables
//    1.if we want to create pivot table for table 1)users and               2)posts
//    2.we need to create migration like
//        php artisan make:migration create_users_posts_table             --create=post_user
//    3.in 2nd step we need to give table name in alphabetical order      so laravel automatically treats it as pivot table to users       and post tables.
//    4. run the above all migration
//        php artisan migrate
//    5.go to User model and create a function to fetch the posts
//        public function users_post(){
//            return $this->belongsToMany('App\Models\Post');
//        }
//        6.than go to route to fetch the desired data using step             5's step
//        Route::get('user/{id}/post',function($id){
//            $user = User::find($id);
//            foreach($user->users_post as $post)
//            {
//                echo '$post->title';
//            }
//        }
//        7. complete process

    //accessing pivot table for users and roles
     public function users_post(){
            return $this->hasMany('App\Models\Post');
//            select * from post where user_id = 1;
    }
    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
}
