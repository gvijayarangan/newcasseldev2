<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Validator;
use App\SkeletalElement;
use App\SkeletalBone;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Relation::morphMap([
//            //
//        ]);
//
//        Validator::extend('phone', function($attribute, $value, $parameters, $validator) {
//            return preg_match('%^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$%i', $value) && strlen($value) >= 10;
//        });
//        Validator::replacer('phone', function($message, $attribute, $rule, $parameters) {
//            return str_replace(':attribute',$attribute, ':attribute is invalid phone number. Enter without + symbol. Just the 11 digits');
//        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
