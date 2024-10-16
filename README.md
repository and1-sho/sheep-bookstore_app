# sheep-bookstore-app
※このWebアプリケーションは練習用です  
"SHeeP"（シープ）という本屋さんが本をネットで販売する為のECサイトです。  


## ファイル構成
app：アプリケーションファイル（cloneしてください）  
docker：dockerの設定ファイル  
docs：設計書などをまとめたファイル  
docker-compose.yml：dockerの設定ファイル  
※vscode上でpdfを見る場合は"vscode-pdf"というプラグインをインストールしてください。  





## マイグレーションの実行  
1. appコンテナのNAMEを確認する  
% docker compose ps  


2.appコンテナの中に入る  
% docker exec -it <コンテナNAME> bash  


3.アプリフォルダに移動  
% cd app  


4.マイグレーションの実行  
% php artisan migrate  
※2回目以降は % php artisan migrate:fresh  






## ブランチ規則 ##
### メインブランチ
直接このブランチにコミットする事は避け、プルリクエストをしてマージするようにしてください  

### ブランチ
フロントエンド担当：front  
バックエンド担当：back  

### ブランチ名の書き方
担当部署-番号  
例） 
front-01  
コミットする度にナンバーを増やしていき、ナンバーが被らないようにする。  




## プレフィックス一覧  
※今回は使用しません  




## コミットする際のメッセージ規則
例）  
git commit -m "[User] ログイン画面のフォームのレイアウト調整"  
git commit -m "[Admin] ヘッダーのレスポンシブ調整"  
ポイント：ここでは日本語でいいので例にあるようにシンプルに内容をしっかり書くようにする  






## Docker使用コマンド一覧
コンテナを作成：% docker compose up -d  

設定ファイルなどを変更した時：% docker compose up -d --build  
※キャッシュを無視してコンテナを作成する  

コンテナを削除：% docker compose down  

作成されているコンテナを確認する：% docker compose ps  

コンテナの中に入る：% docker exec -it コンテナ名 bash  
※コンテナ名は docker compose ps で出てきたNAMEを記載する  

コンテナ中から出る：% exit  


