# php-book-app 

## 開発を始めるとき

`docker-compose up -d`

ウェブサーバーのコンテナと、DBサーバーのコンテナが起動する。

ポートフォワーディングで5000番をコンテナ側の80番で待ち受けているので

http://localhost:5000

にアクセスするとCakePHPのウェルカム画面が表示される

## 各画面のURL

質問一覧

http://localhost:5000/questions


質問投稿画面

http://localhost:5000/questions/add


質問詳細（なんか違う気がする、/questions/1 であってほしいような？）

http://localhost:5000/questions/view/1


質問3には、あらかじめ用意された回答が2件ある


### とめるとき

`docker-compose stop`



## 開発環境だけ作るとき

dockerブランチをpullして、`docker-compose up -d` する