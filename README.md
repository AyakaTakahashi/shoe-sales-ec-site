# Shoe Sales EC Site
架空のECサイトを構築しました。
以下の機能を実装しています。

- 商品  
　- 商品一覧  
　- 商品詳細(カートイン、お気に入り登録、レビュー投稿)  
- チェックアウト  
　- カート画面  
　- 配送先入力画面  
　- 注文確認モーダル  
　- 注文確定画面  
- 会員情報  
　- 会員情報編集画面  
　- パスワード変更  
　- 注文履歴  
　- ログアウト  
- お気に入り画面  

https://github.com/AyakaTakahashi/shoe-sales-ec-site/assets/122336381/f44c3812-c25f-4453-8154-78d9ea8ec42c

https://github.com/AyakaTakahashi/shoe-sales-ec-site/assets/122336381/f821b211-5ed0-4062-bb2a-f8c30a2927c2

## DB diagram
![database-layout](https://github.com/AyakaTakahashi/shoe-sales-ec-site/assets/122336381/6da458d6-bdee-427f-8a14-a67e56102084)

## Technology
- PHP laravel
- MySQL
- Docker

## Directory
shoe-sales-ec-site
- docker-compose.yml
- docker
  - php
    - Dockerfile
    - php.ini
  - nginx
    - default.conf
- src
  - shoe-sales-ec-site project file(PHP laravel)

## Getting Started
To get started with our project, follow these steps:

- Clone the repository to your local machine.
- Ensure you have Docker installed on your system.
- Navigate to the project directory.
- Run docker-compose up --build to build and start the Docker containers.
- Run php artisan migrate:fresh --seed to setup the database
- Access the frontend at http://localhost
