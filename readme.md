#laravel-niconico

yarn config set registry https://registry.npm.taobao.org
yarn install
npm run watch-poll


composer require "mews/captcha:~2.0"
php artisan vendor:publish --provider="Mews\Captcha\CaptchaServiceProvider"


composer requrie "overtrue/laravel-lang:~3.0"
\Carbon\Carbon::setLocale('zh');


composer require intervention/image
php artisan vendor:publish --provider="Intervention\Image\ImageServiceProviderLaravel5"


composer requrie "summerblue/generator:~0.5"