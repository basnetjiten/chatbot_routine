<html>
<head>
    <title>reCAPTCHA</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body style='background-color: aqua;'>
<div style='height: 60px;'></div>
<form action="?" method="POST">
    <div class="g-recaptcha"
         data-sitekey="6LdRC6QZAAAAALUZZuK8ul4FWL1V3y6JQ57akA3s"
         data-callback="captchaCallback"></div>

</form>
<script>
    function captchaCallback(response) {
        //console.log(response);
        if (typeof Captcha !== "undefined") {
            Captcha.postMessage(response);
        }
    }
</script>
</body>
</html>