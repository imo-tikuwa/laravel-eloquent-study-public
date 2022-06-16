# laravel-eloquent-study-public

 - LaravelのEloquentの勉強用リポジトリです
 - 勉強用のサンプルデータベースとして[こちらのdvdrentalデータベース](https://www.postgresqltutorial.com/postgresql-getting-started/postgresql-sample-database/)を使用しています
   - LaravelでEloquentで使うために一部書き換えています。詳しくは[データのリストアを行うスクリプト内](https://github.com/imo-tikuwa/laravel-eloquent-study-public/blob/master/docker/postgres/initdb.d/1_create_db_and_insert_dvdrental.sh)を確認ください
 
 - 2022/06/16
   - dvdrentalに7つ存在するビューに近いデータをEloquentを使って取得してみました
   - 現状、GETリクエストで一覧を取得するAPIのみ存在します。。
     - 一部pluckなどで取得したデータを集約してる箇所は後の検索機能を作る際の条件指定に対応できない状態のため修正が必要かも。。
     - 最終的には検索機能付きのSPAにしたい？

## 環境構築
```
git clone https://github.com/imo-tikuwa/laravel-eloquent-study-public.git
cd laravel-eloquent-study-public
cp .env.example .env
make init
```

## 動作確認
 - ページネーションあり
   - https://localhost/api/actor_info
   - https://localhost/api/customer_list
   - https://localhost/api/film_list
   - https://localhost/api/nicer_but_slower_film_list
   - https://localhost/api/staff_list
 - ページネーションなし
   - https://localhost/api/sales_by_film_category
   - https://localhost/api/sales_by_store

## ER図作成
Laravel用のdvdrentalデータベースとオリジナルのdvdrental_orgデータベースについてそれぞれschemaspyを利用したER図を生成します
```
make db-erd-laravel
make db-erd-original
```