<!doctype html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 - صفحه یافت نشد</title>
    
    <link rel="stylesheet" href="<?php echo  Assets::css('bootstrap.min.5.3.3.css'); ?>">
    <link rel="stylesheet" href="<?php echo Assets::css('404.css') ?>">
   
</head>

<body>

    <div class="container d-flex flex-column justify-content-center align-items-center text-center error-container">
        <div class="error-code text-primary">404</div>
        <div class="error-text text-muted mb-3">متأسفیم، صفحه‌ای که دنبالش بودید پیدا نشد.</div>
        <a href="<?php echo site_url(); ?>" class="btn btn-primary btn-back">بازگشت به صفحه اصلی</a>
    </div>

</body>

</html>