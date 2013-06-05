<?php 
/**
 * 获取指定长度的随机数
 *
 * @param int $length
 * @return string
 */
function random($length=32) {
	$hash = '';
	$chars='ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjklmnpqrstuvwxyz';
	$max = strlen($chars) - 1;
	PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
	for($i = 0; $i < $length; $i++) {
		$hash .= $chars[mt_rand(0, $max)];
	}
	return $hash;
}
/**
 * 生产验证码，需要放到单独页面中，将地址赋予<img src="server.php">
 *
 * @param string $str 显示的字符串
 * @param int $width 图片宽度
 * @param int $height 图片高度
 */
function getValidateCode($str,$width=100,$height=25){
	header("Content-type: image/png");
	$im = imagecreate($width , $height);
	$background_color = imagecolorallocate($im, rand(1,255), rand(1,255), rand(1,255));
	$text_color = imagecolorallocate($im, rand(1,255), rand(1,255), rand(1,255));
	imagestring($im, 5, 30, 5,  $str, $text_color);
	imagepng($im);
	imagedestroy($im);
}
?>