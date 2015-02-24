use moneyiq;
SET NAMES utf8;

SET FOREIGN_KEY_CHECKS = 0;

delete from store where store_id>0;
ALTER TABLE store AUTO_INCREMENT = 1;

insert into store (store_name, category,update_time, update_user) values
	('ファミリーマート', 'スーパー・コンビニ', NOW(), 'ben'),
	('スリーエフ', 'スーパー・コンビニ', NOW(), 'ben'),
	('イトーヨーカドー', 'スーパー・コンビニ', NOW(), 'ben'),
	('7-11', 'スーパー・コンビニ', NOW(), 'ben'),
	('Oisix', 'スーパー・コンビニ', NOW(), 'ben'),
	('Yahoo!ショッピング', 'ショッピング', NOW(), 'ben'),
	('Sogo', 'ショッピング', NOW(), 'ben'),
	('Seibu', 'ショッピング', NOW(), 'ben'),
	('ファミール', 'ショッピング', NOW(), 'ben'),
	('Loft', 'ショッピング', NOW(), 'ben'),
	('東急ホテルズ', 'ショッピング', NOW(), 'ben'),
	('ヤマダモール', 'ショッピング', NOW(), 'ben'),
	('ヤマダ電機', 'ショッピング', NOW(), 'ben'),
	('MUJI', 'ショッピング', NOW(), 'ben'),
	('Uniqlo', 'ショッピング', NOW(), 'ben'),
	('Apple', 'ショッピング', NOW(), 'ben'),
	('Tokyu Hands', 'ショッピング', NOW(), 'ben'),
	('Joshin', 'ショッピング', NOW(), 'ben'),
	('SEIYU', 'ショッピング', NOW(), 'ben'),
	('LIVIN', 'ショッピング', NOW(), 'ben'),
	('じゃらん', 'エンタメ・旅行', NOW(), 'ben'),
	('TSUTAYA', 'エンタメ・旅行', NOW(), 'ben'),
	('阪急第一ホテルグループ', 'エンタメ・旅行', NOW(), 'ben'),
	('ニッポンレンタカー', 'エンタメ・旅行', NOW(), 'ben'),
	('シダックス', 'エンタメ・旅行', NOW(), 'ben'),
	('Knt!', 'エンタメ・旅行', NOW(), 'ben'),
	('東京無線タクシー', 'エンタメ・旅行', NOW(), 'ben'),
	('プリンスホテルズ', 'エンタメ・旅行', NOW(), 'ben'),
	('JR 九州', 'エンタメ・旅行', NOW(), 'ben'),
	('JTB', 'エンタメ・旅行', NOW(), 'ben'),
	('オートバックス', 'カーライフ', NOW(), 'ben'),
	('ETC', 'カーライフ', NOW(), 'ben'),
	('ENEOS/JOMO', 'カーライフ', NOW(), 'ben'),
	('コスモ', 'カーライフ', NOW(), 'ben'),
	('出光', 'カーライフ', NOW(), 'ben'),
	('マツダ', 'カーライフ', NOW(), 'ben'),
	('カーコンビニ倶楽部', 'カーライフ', NOW(), 'ben'),
	('オリックスレンタカー', 'カーライフ', NOW(), 'ben'),
	('ドトール・エクセルシオールカフェ', 'レストラン・カフェ', NOW(), 'ben'),
	('ガスト', 'レストラン・カフェ', NOW(), 'ben'),
	('バーミヤン', 'レストラン・カフェ', NOW(), 'ben'),
	('牛角', 'レストラン・カフェ', NOW(), 'ben'),
	('Denny\'s', 'レストラン・カフェ', NOW(), 'ben'),
	('ロッテリア', 'レストラン・カフェ', NOW(), 'ben'),
	('HOT PEPPER', 'ビューティー・エステ', NOW(), 'ben');

SET FOREIGN_KEY_CHECKS = 1;
