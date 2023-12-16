$(function() {
	//公開鍵
	const public_key = 
	[
		'-----BEGIN PUBLIC KEY-----',
		'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDKxj8Kf5+tegIJJyaXsmtU0hoF',
		'SBXbdhhNqb70qiPgrhzazex6/dbQaC6wm99W/QL9xjCqKFrRRovpvC4aB9qG0MHr',
		'ChVHpubgXG26zXamsBE96jGRnOwj4xG/vl8esPpg5DW6hEODfktI8VLOdHZxPO+d',
		'tWMLXj1CBmQIa1+Y8wIDAQAB',
		'-----END PUBLIC KEY-----'
	].join('\n');
	
	//フォーム実行時イベント
	$('form').submit(function () {
		//生のメッセージを取得
		const raw_message = $('input[name="message"]').val();
		
		//暗号化クラス初期化
		let encrypt = new JSEncrypt();
		
		//公開鍵を設定
		encrypt.setPublicKey(public_key);
		
		//メッセージを公開鍵で暗号化
		const encrypted_message = encrypt.encrypt(raw_message);
		
		
		//メッセージに暗号化メッセージを設定
		$('input[name="message"]').val(encrypted_message);
		
		//暗号化メッセージ表示
		alert('生のメッセージ「' + raw_message + '」は「' + encrypted_message + '」に暗号化されました。');
	});

});
