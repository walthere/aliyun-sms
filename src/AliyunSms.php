<?php


namespace Walthere\Aliyun\Sms;


use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;

class AliyunSms
{

    protected $config;


    public function __construct()
    {
        $this->config = config('AliyunSms');
        AlibabaCloud::accessKeyClient($this->config['accessKeyId'],
            $this->config['accessKeySecret'])
            ->regionId($this->config['regionId']) // replace regionId as you need
            ->asDefaultClient();
    }


    /**
     * @param $data
     * @return array
     */
    public function send($data)
    {
        try {
            $result = AlibabaCloud::rpc()
                ->product('Dysmsapi')
                // ->scheme('https') // https | http
                ->version('2017-05-25')
                ->action('SendSms')
                ->method('POST')
                ->host('dysmsapi.aliyuncs.com')
                ->options([
                    'query' => [
                        'RegionId' => "default",
                        'PhoneNumbers' => $data['PhoneNumbers'],
                        'SignName' => $data['SignName'],
                        'TemplateCode' => $data['TemplateCode'],
                        'TemplateParam' => $data['TemplateParam'],
                    ],
                ])
                ->request();
            $data =  $result->toArray();
        } catch (ClientException $e) {
            $data['Code'] = 'ERR';
            $data['Message'] = $e->getErrorMessage() . PHP_EOL;
        } catch (ServerException $e) {
            $data['Code'] = 'ERR';
            $data['Message'] = $e->getErrorMessage() . PHP_EOL;
        }

        return $data;
    }


}