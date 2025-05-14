# お問い合わせフォーム

## 環境構築
Dockerビルド
  1. git clone git@github.com:sano-san-dayo/assignment.git
  2. cd assignment
  3. docker-compose up -d  
  ※MySQL はOSによって起動しない場合あるのでぞれぞれのPCに合わせて  
  　docker-compose.ymlファイルを編集してください。   
  
Laravel環境構築  
　1. docker-compose exec php bash  
　2. composer install  
　3. cp .env.example .env  
　4. .envの下記変更  
　　 (変更前)  
　　　　DB_HOST=127.0.0.1  
　　　　B_DATABASE=laravel  
　　　　DB_USERNAME=root  
　　　　DB_PASSWORD=  
　　 (変更後)  
　　　　DB_HOST=mysql  
　　　　B_DATABASE=laravel_db  
　　　　DB_USERNAME=laravel_user  
　　　　DB_PASSWORD=laravel_pass  
　5. php artisan key:generate  
　6. php artisan db:seed  

## 使用技術
　PHP 7.4.9  
　Lravel 8.83.29  
　MySQL 8.0.26  
　nginx 1.21.1  

## ER図
　![](./ER図.png)

## URL
　開発環境: http://localhost/  
　phpMyAdmin: http://localhost:8080/  
