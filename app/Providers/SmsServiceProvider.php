<?php

namespace App\Providers;

use App\Services\Sms\ArraySender;
use App\Services\Sms\SmsRu;
use App\Services\Sms\SmsSender;
use App\Services\Sms\SmsUz;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(SmsSender::class, function (Application $app) {
            $config = $app->make('config')->get('sms');

            switch ($config['driver']) {
                case 'sms.ru':
                    $params = $config['drivers']['sms.ru'];
                    if (!empty($params['url'])) {
                        return new SmsRu($params['app_id'], $params['url']);
                    }
                    return new SmsRu($params['app_id']);
                case 'sms.uz':
                    $params = $config['drivers']['sms.uz'];
                    return new SmsUz($params['url'], $params['username'], $params['password'], $params['smsc'],
                        $params['from'], $params['charset'], $params['coding']);
                case 'array':
                    return new ArraySender();
                default:
                    throw new \InvalidArgumentException('Undefined SMS driver ' . $config['driver']);
            }
        });
    }
}
