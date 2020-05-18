## Laravel DingTalk Robot

Laravel DingTalk Robot SDK（Laravel钉钉机器人开发包）

## Install

composer
```php
php composer.phar require aping/laravel-ding-robot
```
或
```php
"require": {
    "aping/laravel-ding-robot": "dev-master"
}
```

## Config

Laravel 5.5+:

Add Service Provider to config/app.php in providers section
```php
Aping\LaravelDingRobot\RobotServiceProvider::class,
```

Add Aliase to config/app.php in aliases section

```php
'Ding' => Aping\LaravelDingRobot\Facades\Ding::class,
```

Publish config

```php
php artisan vendor:publish --provider="Aping\LaravelDingRobot\RobotServiceProvider"
```

## Usage

Use facade or app('ding') :

text类型
```php
$response = Ding::sendText('Hello World');
```
link类型
```php
$response = Ding::sendLink('Hello', '这个即将发布的新版本，创始人xx称它为红树林。而在此之前，每当面临重大升级，产品经理们都会取一个应景的代号，这一次，为什么是红树林', 'http://www.baidu.com', 'https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png');
```

markdown类型
```php
$response = Ding::sendMarkdown('Hello', "#### 杭州天气 \n9度，西北风1级，空气良89，相对温度73%\n> ![screenshot](https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png)\n> ###### 10点20分发布 [天气](https://www.dingalk.com) \n");
```

整体跳转ActionCard类型
```php
$response = Ding::sendSingleActionCard('Hello', '![screenshot](@lADOpwk3K80C0M0FoA) ### 乔布斯 20 年前想打造的苹果咖啡厅 Apple Store 的设计正从原来满满的科技感走向生活化，而其生活化的走向其实可以追溯到 20 年前苹果一个建立咖啡馆的计划', '阅读全文', 'https://www.dingtalk.com/');
```

独立跳转ActionCard类型
```php
$response = Ding::sendMultiActionCard('Hello', '![screenshot](@lADOpwk3K80C0M0FoA) ### 乔布斯 20 年前想打造的苹果咖啡厅 Apple Store 的设计正从原来满满的科技感走向生活化，而其生活化的走向其实可以追溯到 20 年前苹果一个建立咖啡馆的计划', [
    ['title'=>'钉钉','actionURL'=>'https://www.dingtalk.com/']
]);
```

FeedCard类型
```php
$response = Ding::sendFeedCard([['title' => '钉钉', 'messageUrl' => 'https://www.dingtalk.com/', 'picUrl' => 'https://gw.alicdn.com/tfs/TB1ayl9mpYqK1RjSZLeXXbXppXa-170-62.png']]);
```

Response
```php
$response->isOk();//是否成功
$response->getError();//错误信息
$response->getRaw();//响应的原始数据
```

You can send multiple robots like (可以发送多个钉钉机器人):

```php
//默认
app('ding')->sendText('default robot.');
//其它或自定义
app('ding')->robot('other')->sendText('other robot.');
```

## Reference

https://github.com/iaping/pdding-robot
