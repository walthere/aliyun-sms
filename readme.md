Aliyun sms for Laravel 
===============================
专用于Laravel的阿里云短信扩展包

##配置
```php
//config/AliyunSms.php
return [
    "accessKeyId" => "你的accessKeyId",
    "accessKeySecret" => "你的accessKeySecret",
    "regionId"=>"你的regionId",
];
```

##使用
```php
 $data = [
            'PhoneNumbers' => '手机号码',
            'SignName' => "签名名称",
            'TemplateCode' => "模板code",
            'TemplateParam' => '模板参数',      
        ];
 $result = AliyunSms::send($data);
```