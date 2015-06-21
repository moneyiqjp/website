SET NAMES utf8;

SET FOREIGN_KEY_CHECKS = 0;

delete from reward where reward_id>0;
ALTER TABLE reward AUTO_INCREMENT = 1;

insert into reward (point_system_id, type, category, title, description, icon, yen_per_point, price_per_unit, min_points, max_points, required_points, max_period, update_time, update_user) values
(2, 'discount', 'Beauty', '3,000円ホットペッパービューティーサロン割引','1回あたり100ポイントから3,000ポイントまで100ポイント単位でご利用可能です。※事前申請必要。ご利用店によって最大ポイント利用制限あり', NULL, 1.0, 100, 100, 3000, 3000, '回', NOW(), 'Ben'),
(2, 'discount', 'Restaurants', '10,000円ホットペッパー食事券','お店で使えるお食事券をポイントで購入できたり、割引価格で購入することができます※事前申請必要。ご利用店によって最大ポイント利用制限あり', NULL, 1, 100, 100, NULL, 25000, '', NOW(), 'Ben'), 
(2, 'discount', 'Travel', 'じゃらん宿泊割引','お好きなホテルをポイントで利用できる。', NULL, 1, 100, 100, NULL, 50000, '', NOW(), 'Ben'), 
(2, 'discount', 'Travel', '25,000円じゃらん宿泊割引','お好きなホテルをポイントで利用できる。', NULL, 1, 100, 100, NULL,  50000, '', NOW(), 'Ben'), 
(3, 'discount', 'Supermarkets/Combini', 'ファミリーマートでのお買い物に使う','お会計時に「Ｔポイント利用で」と伝えるだけ。', NULL, 1, 1, 1, NULL,  1000, '', NOW(), 'Ben'),
(3, 'discount', 'Auto', 'ENEOSでガソリンを','※一部のガソリンスタンドはご利用できない場合が有ります。事前にご確認ください。', NULL, 1, 1, 1, NULL,  3000, '', NOW(), 'Ben'), 
(3, 'exchange', 'Mileage', 'ANA マイルレージに交換','500ポイント→ANA250マイル', NULL, 0.5, 500, 500, NULL,  25000, '', NOW(), 'Ben'), 
(4, 'discount', 'Supermarkets/Combini', 'イトーヨーカドーでの買い物に使う','お会計時に「セブンポイント利用で」と伝えるだけ。', NULL, 1, 1, 1, NULL,  1000, '', NOW(), 'Ben'),
(4, 'exchange', 'E-Money', 'nanaco電子マネーに交換','500セブン＆アイポイント->500 nanaco ポイント', NULL, 1, 100, 500, NULL,  500, '', NOW(), 'Ben'),
(4, 'exchange', 'Mileage', 'ANA マイルレージに交換','※10口まで', NULL, 0.5, 1500, 3000, NULL,  25000, '', NOW(), 'Ben'), 
(5, 'exchange', 'E-Money', 'Edy 電子マネーに交換','1楽天スーパーポイント→Edy で１円分', NULL, 1, 1, 10, NULL,  1000, '', NOW(), 'Ben'),
(5, 'discount', 'Net shopping', '楽天市場での買い物に使う','1楽天スーパーポイント→１円分', NULL, 1, 1, 50, NULL,  10000, '', NOW(), 'Ben'),
(5, 'discount', 'Travel', '楽天トラベルでの旅を予約','国内宿泊予約、高速バス予約、国内レンタカー予約、ANA楽パック、JAL楽パック、国内日帰り・デイユース予約、そして海外航空券予約で、1ポイント⇒1円として使うことができます。', NULL, 1, 1, 50, NULL,  25000, '', NOW(), 'Ben'), 
(6, 'free product', 'Limited Ed. Goods', 'ワンピース限定グッズ','ワンピースVISAカードの場合、ここでしか手に入らないフロストアートボード（アルティメットフレーム付）と交換することができます。', NULL, 1, NULL, 3000, NULL,  3000, '', NOW(), 'Ben'), 
(6, 'exchange', 'Net shopping', '楽天スーパーポイント交換','1ポイント→５楽天スーパーポイント', NULL, 5, 200, 200, NULL,  10000, '', NOW(), 'Ben'), 
(6, 'exchange', 'Shopping', 'Tポイントへの交換','1ポイント→５Tポイント', NULL, 5, 200, 200, NULL,  25000, '', NOW(), 'Ben'), 
(7, 'discount', 'Auto', 'ENEOSでガソリンを','１ポイント→１円割引', NULL, 1, 1000, 1000, NULL, 1000, '', NOW(), 'Ben'), 
(7, 'exchange', 'Shopping', 'Tポイントへの交換','1ポイント→0.7 Tポイント', NULL, 0.7, 1000, 1000, NULL, 10000, '', NOW(), 'Ben'), 
(7, 'free product', 'Electronics', 'Dyson ハンディークリーナー','ポイントでDysonハンディークリーナーもらえる！', NULL, 1.0, NULL, 50000, NULL,  50000, '', NOW(), 'Ben'),
(7, 'discount', 'Auto', 'ENEOSでガソリンを','月1万円利用で２円/ℓ割引', NULL, 1.0, NULL, NULL, NULL,  100000, '', NOW(), 'Ben'), 
(7, 'discount', 'Auto', 'ENEOSでガソリンを','月2万円利用で4円/ℓ割引', NULL, 1.0, NULL, NULL, NULL,  20000, '', NOW(), 'Ben'), 
(7, 'discount', 'Auto', 'ENEOSでガソリンを','月5万円利用で5円/ℓ割引', NULL, 1.0, NULL, NULL, NULL,  50000, '', NOW(), 'Ben'), 
(7, 'free product', 'Electronics', 'スチームクリーナー','ポイントでスチームクリーナーがもらえる！', NULL, 1.0, NULL, 10000, NULL,  10000, '', NOW(), 'Ben'), 
(8, 'exchange', 'Mileage', 'ANA マイルレージに交換','1ポイント→3 ANA マイル', NULL, 0.3333, 300, 300, NULL,  10000, '', NOW(), 'Ben'), 
(8, 'discount', 'Health & Beauty', '漢方日本堂商品割引券','300ポイント＝３０００円分', NULL, 10, 300, 300, NULL,  300, '', NOW(), 'Ben'), 
(8, 'charity', 'Charity', '日本ユニセフへの寄付金','1ポイント＝５円分', NULL, 5, 300, 300, NULL,  300, '', NOW(), 'Ben'), 
(9, 'exchange', 'Net shopping', '楽天スーパーポイント交換','1ポイント→５楽天スーパーポイント', NULL, 5, 100, 200, NULL, NULL,  '', NOW(), 'Ben'), 
(9, 'exchange', 'Mileage', 'ANA マイルレージに交換','1ポイント→3 ANA マイル', NULL, 3, 100, 100, NULL, NULL,  '', NOW(), 'Ben'), 
(9, 'free product', 'Electronics', 'BOSE サウンドドックシリーズIII','ミュージックサウンドシステムをポイントでもらえる', NULL, 1.0, NULL, 5000, NULL, NULL,  '', NOW(), 'Ben'), 
(10, 'discount', 'Electronics', 'YAMADA 電気','YAMADA電気でポイントを現金と同様に使う', NULL, 1, 1, 1, NULL, NULL,  '', NOW(), 'Ben'), 
(11, 'exchange', 'Mileage', 'ANA マイルレージに交換','200永久不減ポイント→625 ANAマイル', NULL, 3.125, 200, 200, NULL, NULL,  '', NOW(), 'Ben'), 
(11, 'exchange', 'Net shopping', 'Amazon ギフト券','200永久不減ポイント→1000円分 Amazon ギフト券', NULL, 5, 200, 200, NULL, NULL,  '', NOW(), 'Ben'), 
(12, 'free product', 'Restaurants', '品川プリンスホテルディナー券','品川プリンスホテル　リュクス ダイニング ハプナ ディナー券(2時間飲み放題付き)　1名様', NULL, 1.0, NULL, 5000, NULL, NULL,  '', NOW(), 'Ben'), 
(11, 'exchange', 'Mileage', 'ANA マイルレージに交換','200永久不減ポイント→600 ANAマイル', NULL, 3, 200, 200, NULL, NULL,  '', NOW(), 'Ben'), 
(11, 'exchange', 'Mileage', 'JAL マイルレージに交換','200永久不減ポイント→500 JALマイル', NULL, 2.5, 200, 200, NULL, NULL,  '', NOW(), 'Ben'), 
(13, 'discount', 'Auto', 'マツダ店でのお支払い時','1マツダm\'zポイント→1円', NULL, 1, 1, 1, 300000, NULL,  '回', NOW(), 'Ben'), 
(13, 'exchange', 'Mileage', 'JAL マイルレージに交換','4マツダm\'zポイント→1 JALマイル', NULL, 0.25, NULL,  4000, 60000, NULL,  '年', NOW(), 'Ben'), 
(14, 'exchange', 'E-Money', 'JR 九州SUGOCA電子マネーに交換','1ポイント→1円分', NULL, 1, 1, 100, NULL, NULL,  '', NOW(), 'Ben'),
(14, 'exchange', 'Travel', 'JR 九州旅行券に交換','1ポイント→1円分', NULL, 1, NULL,  3000, NULL, NULL,  '', NOW(), 'Ben'), 
(14, 'exchange', '', 'セゾン永久不減ポイントに交換','4JQポイント→1永久不減ポイント', NULL, 0.25, NULL,  2000, NULL, NULL,  '', NOW(), 'Ben'), 
(9, 'exchange', 'E-Money', 'iD 電子マネーに交換','1ポイント→5円分', NULL, 5, 100, 200, NULL, NULL,  '', NOW(), 'Ben'), 
(9, 'exchange', 'Supermarkets/Combini', 'Ponta ポイントに交換','1ポイント→4.5Ponta ポイント', NULL, 4.5, 100, 200, NULL, NULL,  '', NOW(), 'Ben'), 
(15, 'exchange', 'Shopping', 'カラマツトレインギフト券に交換','1ポイント→1円分', NULL, 1, 500, 500, NULL, NULL,  '', NOW(), 'Ben'), 
(16, 'free product', 'Mileage', '東京→大阪片道飛行機チケット','ローシーズン限定', NULL, 1.0, NULL, 7000, NULL, NULL,  '', NOW(), 'Ben'), 
(16, 'free product', 'Mileage', '東京→福岡片道飛行機チケット','ローシーズン限定', NULL, 1.0, NULL, 8500, NULL, NULL,  '', NOW(), 'Ben'), 
(16, 'free product', 'Mileage', '東京→ハワイ片道飛行機チケット','ローシーズン限定', NULL, 1.0, NULL, 17500, NULL, NULL,  '', NOW(), 'Ben');

  

SET FOREIGN_KEY_CHECKS = 1;

show warnings;

select * from reward;