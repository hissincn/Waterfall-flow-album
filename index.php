<!DOCTYPE html>
<html lang="cn">

<head>
	<meta charset="UTF-8" />
	<title>山一的相册</title>
	<meta name="keywords" content="关键词" />
	<meta name="description" content="描述" />
	<script src="https://v-cn.vaptcha.com/v3.js"></script>
</head>

<script>
	status = sessionStorage.getItem('verify');
	if (status == "ok") {
		window.location.href = "album.php";
	} else {
		document.write('<div id="vaptchaContainer" style="width: 100px;height: 46px;margin:0 auto; padding:20%;"> <div class="vaptcha-init-main">        <div class="vaptcha-init-loading">            <a href="/" target="_blank">             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="48px" height="60px" viewBox="0 0 24 30" style="enable-background: new 0 0 50 50; width: 14px; height: 14px; vertical-align: middle" xml:space="preserve">                    <rect x="0" y="9.22656" width="4" height="12.5469" fill="#CCCCCC">                        <animate attributeName="height" attributeType="XML" values="5;21;5" begin="0s" dur="0.6s" repeatCount="indefinite"></animate>                        <animate attributeName="y" attributeType="XML" values="13; 5; 13" begin="0s" dur="0.6s" repeatCount="indefinite"></animate>                    </rect>                    <rect x="10" y="5.22656" width="4" height="20.5469" fill="#CCCCCC">                        <animate attributeName="height" attributeType="XML" values="5;21;5" begin="0.15s" dur="0.6s" repeatCount="indefinite"></animate>                        <animate attributeName="y" attributeType="XML" values="13; 5; 13" begin="0.15s" dur="0.6s" repeatCount="indefinite"></animate>                    </rect>                    <rect x="20" y="8.77344" width="4" height="13.4531" fill="#CCCCCC">                        <animate attributeName="height" attributeType="XML" values="5;21;5" begin="0.3s" dur="0.6s" repeatCount="indefinite"></animate>                        <animate attributeName="y" attributeType="XML" values="13; 5; 13" begin="0.3s" dur="0.6s" repeatCount="indefinite"></animate>                    </rect>                </svg>            </a>            <span class="vaptcha-text">验证加载中~~~            </span>        </div>    </div></div>')
		vaptcha({
			//配置参数
			vid: '620dae73b5b91cdd5d5aa930', // 验证单元id
			type: 'click', // 展现类型 点击式
			container: '#vaptchaContainer', // 按钮容器，可为Element 或者 selector
		}).then(function(vaptchaObj) {

			vaptchaObj.render() // 调用验证实例 vaptchaObj 的 render 方法加载验证按钮

			vaptchaObj.listen('pass', function() {
				serverToken = vaptchaObj.getServerToken();
				sessionStorage.setItem("verify", "ok");
				window.location.href = "album.php";
			})
		})
	}
</script>


</html>