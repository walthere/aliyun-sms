<?php


namespace Walthere\Aliyun\Sms;


use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AliyunSmsServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $configPath = realpath(__DIR__ . '/config/AliyunSms.php');
        $this->mergeConfigFrom($configPath, 'AliyunSms');
        $this->publishes([$configPath => config_path('AliyunSms.php')], 'config');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $configPath = realpath(__DIR__ . '/../config/AliyunSms.php');
        $loader = AliasLoader::getInstance();
        $loader->alias('AliyunSms', 'Walthere\Aliyun\Sms\Facades\AliyunSms');
        $this->app->singleton('AliyunSms', function(){
            return new AliyunSms();
        });
    }


}