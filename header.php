
<!DOCTYPE html>
<html lang="ja">
<head>

<!-- adsense -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9103834502093898"
     crossorigin="anonymous"></script>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>デモサイト</title>
  <meta name="description" content="メタディスクリプション">
  <meta name="author" content="牛乳">
  <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="format-detection" content="telephone=no">
  <meta name="og:url" content="https://サイト名">  <meta name="og:type" content="website">
  <meta name="og:title" content="デモサイト">
  <meta name="og:description" content="メタディスクリプション">
  <meta name="og:site_name" content="デモサイト">
  <meta name="og:image" content="/assets/common/ogp.jpg">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  <link rel="shortcut icon" href="/assets/img/logo.svg">

<!-- GoogleFont -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Kaisei+HarunoUmi:wght@400;500;700&family=Passion+One:wght@400;700;900&family=Shadows+Into+Light&display=swap" rel="stylesheet">

  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" rel="stylesheet">
  <title>JOURNEY TO AIM HIGH</title>
</head>
<body>
<div class="c-wrapper">


  <header class="p-header">
    <h1 class="p-header__title">
      <!-- <img src="" alt="ヘッダータイトル"> -->
      <a href="/kato/">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_demo.svg" alt="title">
        
      </a>
    </h1>
  </header>
  <ul class="p-header__list">
    <?php wp_list_categories('title_li='); ?>
    <li class="cat-item"><a href="/about/">ABOUT</a></li>
    <li class="cat-item"><a href="/contact/">CONTACT</a></li>
  </ul>
  <div class="is-hamburger">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <div class="p-header__menu__sp">
    <h1 class="p-header__menu__heading__sp">JOURNEY TO AIM HIGH</h1>
    <ul class="p-header__list__sp">
      <?php wp_list_categories('title_li='); ?>
      <li class="cat-item"><a href="/about/">ABOUT</a></li>
      <li class="cat-item"><a href="/contact/">CONTACT</a></li>
    </ul>
  </div>

  