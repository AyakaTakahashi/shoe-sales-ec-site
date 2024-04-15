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

