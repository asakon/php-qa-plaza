# php-book-app 

## 開発を始めるとき

`docker-compose up -d`

ウェブサーバーのコンテナと、DBサーバーのコンテナが起動する。

ポートフォワーディングで5000番をコンテナ側の80番で待ち受けているので

http://localhost:5000

にアクセスするとCakePHPのウェルカム画面が表示される

### とめるとき

`docker-compose stop`



## 開発環境だけ作るとき

dockerブランチをpullして、`docker-compose up -d` する