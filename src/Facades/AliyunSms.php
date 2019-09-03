<?php
namespace Walthere\Aliyun\Sms\Facades;
use Illuminate\Support\Facades\Facade;
class AliyunSms extends  Facade{
    protected static function getFacadeAccessor()
    {
        return 'AliyunSms';
    }
}
