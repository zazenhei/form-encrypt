<?php

//秘密鍵
$private_key = '-----BEGIN PRIVATE KEY-----
MIICeQIBADANBgkqhkiG9w0BAQEFAASCAmMwggJfAgEAAoGBAMrGPwp/n616Agkn
Jpeya1TSGgVIFdt2GE2pvvSqI+CuHNrN7Hr91tBoLrCb31b9Av3GMKooWtFGi+m8
LhoH2obQwesKFUem5uBcbbrNdqawET3qMZGc7CPjEb++Xx6w+mDkNbqEQ4N+S0jx
Us50dnE87521YwtePUIGZAhrX5jzAgMBAAECgYEArjNuCSjnFvOQOCjIQN5o0u/E
pvDsxiNIcb/4atyYAffSli7+kBLurxAxvEvMrUCjhzzypdwRWWSP4ndl67r/gfUM
gy6MVzEZe2qDZE8vg7geGdIaZMpZd6b4vmA8J5vb0sZfnce7wDPhrjQzfT7XtNNr
Exh+KhurgtCEHrXewuECQQD7YFMWxWhvCa+qxgaTts+ue0gB7TclenAjClXtGOGm
f+gg93cn/gVZ5IXluN0BUku9iSFI4BCSIlUoWAFNKn47AkEAzoEQ8qsjf0P+UsaQ
jphw+/5wkFHaiAoIW2LKfUgO03tJi/N3Pl0xBz9GsnAYj44XR2astsjA+HBzTRZa
UT6MqQJBAKZd89/IOvvyHy8Y7FVq0jyaHugXhT3qsLigKIpIw18cnBblcRkox4Xc
9rk5BhvPyYzhawP+NzlgO5f91q6phu0CQQCfxobpa3a8mkwlmZLxcYtBvj0zvNFb
nn+WzZokUuN9x49BJHAnpY0wsUmu+EJYmDT0vsF1b2C3GLJte5UH9WB5AkEA1ksi
b98tdupdbWB4X9+khFHQvluC9YYpstNNZpVgpj+mspYQF+oNqxL+K2EGhf7DQGJ9
xlbS1wUZp5Xjq0UADA==
-----END PRIVATE KEY-----';

//テキストヘッダ送信
header('Content-Type: text/plain; charset=utf-8');

//入力値検査
if(!isset($_POST['message']) || !is_string($_POST['message']))
{
	echo 'メッセージが正しく送信されていません。';
	exit(1);
}

echo "送られてきたメッセージは「" . $_POST['message'] . "」です。\n";

$key = openssl_get_privatekey($private_key);
$encrypted_key = base64_decode(explode( ":::", $_POST['message'])[0]);
if(openssl_private_decrypt($encrypted_key, $decrypted, $key))
{
	echo "復号化したメッセージは「" . $decrypted . "」です。\n";
	exit(0);
}

?>