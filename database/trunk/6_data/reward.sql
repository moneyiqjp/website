SET NAMES utf8;

SET FOREIGN_KEY_CHECKS = 0;

DELETE FROM reward where reward_id>0;
ALTER TABLE reward AUTO_INCREMENT = 1;

INSERT IGNORE INTO `reward` (`reward_id`, `point_system_id`, `reward_category_id`, `reward_type_id`, `title`, `description`, `icon`, `yen_per_point`, `price_per_unit`, `min_points`, `max_points`, `required_points`, `max_period`, `update_time`, `update_user`) VALUES
	(1, 2, 1, 1, '3,000円ホットペッパービューティーサロン割引', '1回あたり100ポイントから3,000ポイントまで100ポイント単位でご利用可能です。※事前申請必要。ご利用店によって最大ポイント利用制限あり', NULL, 1.000000, 100, 100, 3000, 3000, '回', '2015-06-05 23:17:26', 'Ben'),
	(2, 2, 2, 1, '10,000円ホットペッパー食事券', 'お店で使えるお食事券をポイントで購入できたり、割引価格で購入することができます※事前申請必要。ご利用店によって最大ポイント利用制限あり', NULL, 1.000000, 100, 100, NULL, 25000, '', '2015-06-05 23:17:26', 'Ben'),
	(3, 2, 3, 1, 'じゃらん宿泊割引', 'お好きなホテルをポイントで利用できる。', NULL, 1.000000, 100, 100, NULL, 50000, '', '2015-06-05 23:17:26', 'Ben'),
	(4, 2, 3, 1, '25,000円じゃらん宿泊割引', 'お好きなホテルをポイントで利用できる。', NULL, 1.000000, 100, 100, NULL, 50000, '', '2015-06-05 23:17:26', 'Ben'),
	(5, 3, 4, 1, 'ファミリーマートでのお買い物に使う', 'お会計時に「Ｔポイント利用で」と伝えるだけ。', NULL, 1.000000, 1, 1, NULL, 1000, '', '2015-06-05 23:17:26', 'Ben'),
	(6, 3, 5, 1, 'ENEOSでガソリンを', '※一部のガソリンスタンドはご利用できない場合が有ります。事前にご確認ください。', NULL, 1.000000, 1, 1, NULL, 3000, '', '2015-06-05 23:17:26', 'Ben'),
	(7, 3, 6, 2, 'ANA マイルレージに交換', '500ポイント→ANA250マイル', NULL, 0.500000, 500, 500, NULL, 25000, '', '2015-06-05 23:17:26', 'Ben'),
	(8, 4, 4, 1, 'イトーヨーカドーでの買い物に使う', 'お会計時に「セブンポイント利用で」と伝えるだけ。', NULL, 1.000000, 1, 1, NULL, 1000, '', '2015-06-05 23:17:26', 'Ben'),
	(9, 4, 7, 2, 'nanaco電子マネーに交換', '500セブン＆アイポイント->500 nanaco ポイント', NULL, 1.000000, 100, 500, NULL, 500, '', '2015-06-05 23:17:26', 'Ben'),
	(10, 4, 6, 2, 'ANA マイルレージに交換', '※10口まで', NULL, 0.500000, 1500, 3000, NULL, 25000, '', '2015-06-05 23:17:26', 'Ben'),
	(11, 5, 7, 2, 'Edy 電子マネーに交換', '1楽天スーパーポイント→Edy で１円分', NULL, 1.000000, 1, 10, NULL, 1000, '', '2015-06-05 23:17:26', 'Ben'),
	(12, 5, 8, 1, '楽天市場での買い物に使う', '1楽天スーパーポイント→１円分', NULL, 1.000000, 1, 50, NULL, 10000, '', '2015-06-05 23:17:26', 'Ben'),
	(13, 5, 3, 1, '楽天トラベルでの旅を予約', '国内宿泊予約、高速バス予約、国内レンタカー予約、ANA楽パック、JAL楽パック、国内日帰り・デイユース予約、そして海外航空券予約で、1ポイント⇒1円として使うことができます。', NULL, 1.000000, 1, 50, NULL, 25000, '', '2015-06-05 23:17:26', 'Ben'),
	(14, 6, 9, 3, 'ワンピース限定グッズ', 'ワンピースVISAカードの場合、ここでしか手に入らないフロストアートボード（アルティメットフレーム付）と交換することができます。', NULL, 1.000000, NULL, 3000, NULL, 3000, '', '2015-06-05 23:17:26', 'Ben'),
	(15, 6, 8, 2, '楽天スーパーポイント交換', '1ポイント→５楽天スーパーポイント', NULL, 5.000000, 200, 200, NULL, 10000, '', '2015-06-05 23:17:26', 'Ben'),
	(16, 6, 10, 2, 'Tポイントへの交換', '1ポイント→５Tポイント', NULL, 5.000000, 200, 200, NULL, 25000, '', '2015-06-05 23:17:26', 'Ben'),
	(17, 7, 5, 1, 'ENEOSでガソリンを', '１ポイント→１円割引', NULL, 1.000000, 1000, 1000, NULL, 1000, '', '2015-06-05 23:17:26', 'Ben'),
	(18, 7, 10, 2, 'Tポイントへの交換', '1ポイント→0.7 Tポイント', NULL, 0.700000, 1000, 1000, NULL, 10000, '', '2015-06-05 23:17:26', 'Ben'),
	(19, 7, 11, 3, 'Dyson ハンディークリーナー', 'ポイントでDysonハンディークリーナーもらえる！', NULL, 1.000000, NULL, 50000, NULL, 50000, '', '2015-06-05 23:17:26', 'Ben'),
	(20, 7, 5, 1, 'ENEOSでガソリンを', '月1万円利用で２円/ℓ割引', NULL, 1.000000, NULL, NULL, NULL, 100000, '', '2015-06-05 23:17:26', 'Ben'),
	(21, 7, 5, 1, 'ENEOSでガソリンを', '月2万円利用で4円/ℓ割引', NULL, 1.000000, NULL, NULL, NULL, 20000, '', '2015-06-05 23:17:26', 'Ben'),
	(22, 7, 5, 1, 'ENEOSでガソリンを', '月5万円利用で5円/ℓ割引', NULL, 1.000000, NULL, NULL, NULL, 50000, '', '2015-06-05 23:17:26', 'Ben'),
	(23, 7, 11, 3, 'スチームクリーナー', 'ポイントでスチームクリーナーがもらえる！', NULL, 1.000000, NULL, 10000, NULL, 10000, '', '2015-06-05 23:17:26', 'Ben'),
	(24, 8, 6, 2, 'ANA マイルレージに交換', '1ポイント→3 ANA マイル', NULL, 0.333300, 300, 300, NULL, 10000, '', '2015-06-05 23:17:26', 'Ben'),
	(25, 8, 12, 1, '漢方日本堂商品割引券', '300ポイント＝３０００円分', NULL, 10.000000, 300, 300, NULL, 300, '', '2015-06-05 23:17:26', 'Ben'),
	(26, 8, 13, 4, '日本ユニセフへの寄付金', '1ポイント＝５円分', NULL, 5.000000, 300, 300, NULL, 300, '', '2015-06-05 23:17:26', 'Ben'),
	(27, 9, 8, 2, '楽天スーパーポイント交換', '1ポイント→５楽天スーパーポイント', NULL, 5.000000, 100, 200, NULL, NULL, '', '2015-06-05 23:17:26', 'Ben'),
	(28, 9, 6, 2, 'ANA マイルレージに交換', '1ポイント→3 ANA マイル', NULL, 3.000000, 100, 100, NULL, NULL, '', '2015-06-05 23:17:26', 'Ben'),
	(29, 9, 11, 3, 'BOSE サウンドドックシリーズIII', 'ミュージックサウンドシステムをポイントでもらえる', NULL, 1.000000, NULL, 5000, NULL, NULL, '', '2015-06-05 23:17:26', 'Ben'),
	(30, 10, 11, 1, 'YAMADA 電気', 'YAMADA電気でポイントを現金と同様に使う', NULL, 1.000000, 1, 1, NULL, NULL, '', '2015-06-05 23:17:26', 'Ben'),
	(31, 11, 6, 2, 'ANA マイルレージに交換', '200永久不減ポイント→625 ANAマイル', NULL, 3.125000, 200, 200, NULL, NULL, '', '2015-06-05 23:17:26', 'Ben'),
	(32, 11, 8, 2, 'Amazon ギフト券', '200永久不減ポイント→1000円分 Amazon ギフト券', NULL, 5.000000, 200, 200, NULL, NULL, '', '2015-06-05 23:17:26', 'Ben'),
	(33, 12, 2, 3, '品川プリンスホテルディナー券', '品川プリンスホテル　リュクス ダイニング ハプナ ディナー券(2時間飲み放題付き)　1名様', NULL, 1.000000, NULL, 5000, NULL, NULL, '', '2015-06-05 23:17:26', 'Ben'),
	(34, 11, 6, 2, 'ANA マイルレージに交換', '200永久不減ポイント→600 ANAマイル', NULL, 3.000000, 200, 200, NULL, NULL, '', '2015-06-05 23:17:26', 'Ben'),
	(35, 11, 6, 2, 'JAL マイルレージに交換', '200永久不減ポイント→500 JALマイル', NULL, 2.500000, 200, 200, NULL, NULL, '', '2015-06-05 23:17:26', 'Ben'),
	(36, 13, 5, 1, 'マツダ店でのお支払い時', '1マツダm\'zポイント→1円', NULL, 1.000000, 1, 1, 300000, NULL, '回', '2015-06-05 23:17:26', 'Ben'),
	(37, 13, 6, 2, 'JAL マイルレージに交換', '4マツダm\'zポイント→1 JALマイル', NULL, 0.250000, NULL, 4000, 60000, NULL, '年', '2015-06-05 23:17:26', 'Ben'),
	(38, 14, 7, 2, 'JR 九州SUGOCA電子マネーに交換', '1ポイント→1円分', NULL, 1.000000, 1, 100, NULL, NULL, '', '2015-06-05 23:17:26', 'Ben'),
	(39, 14, 3, 2, 'JR 九州旅行券に交換', '1ポイント→1円分', NULL, 1.000000, NULL, 3000, NULL, NULL, '', '2015-06-05 23:17:26', 'Ben'),
	(40, 14, 14, 2, 'セゾン永久不減ポイントに交換', '4JQポイント→1永久不減ポイント', NULL, 0.250000, NULL, 2000, NULL, NULL, '', '2015-06-05 23:17:26', 'Ben'),
	(41, 9, 7, 2, 'iD 電子マネーに交換', '1ポイント→5円分', NULL, 5.000000, 100, 200, NULL, NULL, '', '2015-06-05 23:17:26', 'Ben'),
	(42, 9, 4, 2, 'Ponta ポイントに交換', '1ポイント→4.5Ponta ポイント', NULL, 4.500000, 100, 200, NULL, NULL, '', '2015-06-05 23:17:26', 'Ben'),
	(43, 15, 10, 2, 'カラマツトレインギフト券に交換', '1ポイント→1円分', NULL, 1.000000, 500, 500, NULL, NULL, '', '2015-06-05 23:17:26', 'Ben'),
	(44, 16, 6, 3, '東京→大阪片道飛行機チケット', 'ローシーズン限定', NULL, 1.000000, NULL, 7000, NULL, NULL, '', '2015-06-05 23:17:26', 'Ben'),
	(45, 16, 6, 3, '東京→福岡片道飛行機チケット', 'ローシーズン限定', NULL, 1.000000, NULL, 8500, NULL, NULL, '', '2015-06-05 23:17:26', 'Ben'),
	(46, 16, 6, 3, '東京→ハワイ片道飛行機チケット', 'ローシーズン限定', NULL, 1.000000, NULL, 17500, NULL, NULL, '', '2015-06-05 23:17:26', 'Ben');


SET FOREIGN_KEY_CHECKS = 1;