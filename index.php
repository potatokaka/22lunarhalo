<?php

header('Cache-control: private');
header('content-type: text/html; charset=utf-8');
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');
header('X-Content-Type-Options: nosniff');
header('X-UA-Compatible: IE=edge');

function getUrl()
{
    /* 協議 */
    $protocol = (isset($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) != 'off')) ? 'https://' : 'http://';

    $host = '';

    /* 域名或IP地址 */
    if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {

        $host = $_SERVER['HTTP_X_FORWARDED_HOST'];

    } elseif (isset($_SERVER['HTTP_HOST'])) {

        $host = $_SERVER['HTTP_HOST'];

    } else {

        /* 端口 */
        if (isset($_SERVER['SERVER_PORT'])) {

            $port = ':' . $_SERVER['SERVER_PORT'];

            if ((':80' == $port && 'http://' == $protocol) || (':443' == $port && 'https://' == $protocol)) {

                $port = '';
            }

        } else {

            $port = '';
        }

        if (isset($_SERVER['SERVER_NAME'])) {

            $host = $_SERVER['SERVER_NAME'] . $port;

        } elseif (isset($_SERVER['SERVER_ADDR'])) {

            $host = $_SERVER['SERVER_ADDR'] . $port;
        }
    }

    $curr = dirname($_SERVER['SCRIPT_NAME']);
    $root = str_replace('\\', '/', $curr);

    if (substr($root, -1) != '/') {

        $root .= '/';
    }

    return $protocol . $host . $root;
}

$websiteUrl = urlencode(getUrl());  //上線後網址
$shareUrl['facebook'] = 'http://www.facebook.com/share.php?u=' . $websiteUrl;
$js = 'var windowWidth = 420;'
    . 'var windowHeight = 450;'
    . 'var windowLeft = 0;'
    . 'var windowTop = 0;'
    . 'if (typeof window.screenX != \'undefined\' && (window.screenX >= 0 && window.screenY >= 0)) {'
    . 'windowLeft = (window.screen.availWidth - windowWidth) / 2;'
    . 'windowTop = (window.screen.availHeight - windowHeight) / 2;'
    . '} else if (typeof window.screenLeft != \'undefined\' && (window.screenLeft >= 0 && window.screenTop >= 0)) {'
    . 'windowLeft = (window.screen.availWidth - windowWidth) / 2;'
    . 'windowTop = (window.screen.availHeight - windowHeight) / 2;'
    . '}'
    . 'window.open(\'' . urlencode($shareUrl['facebook']) . '\', null, \'width=\' + windowWidth + \',height=\' + windowHeight + \',left=\' + windowLeft + \',top=\' + windowTop + \',resizable=yes,scrollbars=no,chrome=yes,centerscreen=yes\');';

$shareUrl['facebook'] = 'javascript:void((function()%7B' . $js . '%7D)());';
$shareUrl['youtube'] = 'https://www.youtube.com/user/cloudgatedance';

$section['bulletin'] = false; // true
$popup['bulletin'] = false; // true

?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="雲門２, 鄭宗龍, Sigur Rós, 雲門舞集, 國家兩廳院, 高雄衛武營國家藝術文化中心, 臺中國家歌劇院, 22° Lunar Halo, Kjartan Hólm, 吳耿禎, 陳劭彥, 王奕盛, 沈柏宏, 冰島, 後搖滾">
<meta name="description" content="鄭宗龍攪動雲門新風暴，冰島後搖滾天團Sigur Rós極地空靈的音樂，挑戰22°的美麗與不安">
<meta property="og:title" content="雲門２毛月亮 鄭宗龍攪動雲門新風暴">
<meta property="og:image" content="<?php echo getUrl(); ?>assets/images/facebook-img.jpg">
<meta property="og:site_name" content="雲門２毛月亮 鄭宗龍攪動雲門新風暴">
<meta property="og:description" content="鄭宗龍攪動雲門新風暴，冰島後搖滾天團Sigur Rós極地空靈的音樂，挑戰22°的美麗與不安">
<meta property="og:url" content="<?php echo getUrl(); ?>">
<title>雲門２毛月亮 鄭宗龍攪動雲門新風暴</title>
<!-- Favicon -->
<link href="favicon.ico" rel="icon">
<link href="favicon.ico" rel="shortcut icon">
<link href="apple-touch-icon.png" rel="apple-touch-icon">
<!-- Web Fonts -->
<link href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700|EB+Garamond" rel="stylesheet">
<!-- CSS RWD Core -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<!-- CSS Customization -->
<link href="assets/css/custom.css?t=<?php echo time(); ?>" rel="stylesheet">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-71097218-4"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-71097218-4');
</script>
</head>
<body data-spy="scroll" data-offset="0" data-target="#nav-icon-moon">
<div id="page-navbar-button">
  <button>
    <span></span>
  </button>
</div>
<div id="page-navbar-wrapper">
  <div class="bg-video"></div>
  <a href="#" data-ui-sref="welcome" ui-sref-opts="{location: false, reload: true}" class="nav-logo"></a>
  <div class="nav-frame">
    <div class="scroll-frame">
      <ul>
        <li><a href="#" data-ui-sref="about-me" ui-sref-opts="{location: false, reload: true}"><span>ABOUT</span><span>舞作介紹</span></a></li>
        <li><a href="#" data-ui-sref="trailer" ui-sref-opts="{location: false, reload: true}"><span>TRAILER</span><span>影片搶先看</span></a></li>
        <li><a href="#" data-ui-sref="teams" ui-sref-opts="{location: false, reload: true}"><span>ARTISTIC TEAM</span><span>製作團隊</span></a></li>
        <li><a href="#" data-ui-sref="bulletin" ui-sref-opts="{location: false, reload: true}"><span>NEWS</span><span>最新消息</span></a></li>
        <li><a href="#" data-ui-sref="journal" ui-sref-opts="{location: false, reload: true}"><span>JOURNAL</span><span>月亮筆記</span></a></li>
        <li><a href="#" data-ui-sref="tickets" ui-sref-opts="{location: false, reload: true}"><span>TICKETS</span><span>我要訂票</span></a></li>
      </ul>
    </div>
  </div>
  <div class="share-frame">
    <ul>
      <li><a href="<?php echo $shareUrl['facebook']; ?>" class="fb">FB</a></li>
      <li><a href="<?php echo $shareUrl['youtube']; ?>" target="_blank" class="youtube">YouTube</a></li>
    </ul>
  </div>
</div>

<ul id="nav-share-wrapper">
  <li><a href="<?php echo $shareUrl['facebook']; ?>" class="fb">FB</a></li>
  <li><a href="<?php echo $shareUrl['youtube']; ?>" target="_blank" class="youtube">YouTube</a></li>
</ul>

<ul id="nav-icon-moon">
  <li><a class="nav-link i01" href="#" data-ui-sref="welcome" ui-sref-opts="{location: false, reload: true}" data-target="#welcome-body"></a></li>
  <li><a class="nav-link i02" href="#" data-ui-sref="about-me" ui-sref-opts="{location: false, reload: true}" data-target="#about-me-body"></a></li>
  <li><a class="nav-link i03" href="#" data-ui-sref="trailer" ui-sref-opts="{location: false, reload: true}" data-target="#trailer-body"></a></li>
  <li><a class="nav-link i04" href="#" data-ui-sref="teams" ui-sref-opts="{location: false, reload: true}" data-target="#teams-body"></a></li>
  <li><a class="nav-link i05" href="#" data-ui-sref="bulletin" ui-sref-opts="{location: false, reload: true}" data-target="#bulletin-body"></a></li>
  <li><a class="nav-link i06" href="#" data-ui-sref="journal" ui-sref-opts="{location: false, reload: true}" data-target="#journal-body"></a></li>
  <li><a class="nav-link i07" href="#" data-ui-sref="tickets" ui-sref-opts="{location: false, reload: true}" data-target="#tickets-body"></a></li>
</ul>

<a href="https://www.cloudgate.org.tw/" target="_blank" class="head-logo"></a>
<a href="#" data-ui-sref="welcome" ui-sref-opts="{location: false, reload: true}" class="head-caption"></a>
<button type="button" class="btn-sound"></button>
<a href="#" data-ui-sref="tickets" ui-sref-opts="{location: false, reload: true}" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="Early_PR" data-track-label="index" class="btn-tickets"></a>

<?php if ($popup['bulletin']) { ?>
<div id="popup-bulletin-wrapper">
  <button class="button-close" title="close">CLOSE</button>
  <div class="headline">NEWS</div>
  <div class="list-frame">
    <div class="time">2018.12.08</div>
    <div class="title"><a href="#" data-track="gtag" data-track-category="news" data-track-label="index">月亮筆記：編舞家的天文學課</a></div>
  </div>
</div>
<?php } ?>

<div class="bg-welcome-video"></div>
<div class="bg-welcome-pupil"></div>
<div class="bg-about-me"></div>
<div class="bg-team-video"></div>
<div class="bg-journal-video"></div>
<div class="bg-ticket-video"></div>

<div class="welcome-logo events-none"><a href="#" data-ui-sref="welcome" ui-sref-opts="{location: false, reload: true}"><img src="assets/images/caption-white.png" alt="毛月亮"></a></div>
<div class="welcome-choreographer"><img src="assets/images/choreographer.png" alt="*"></div>

<div id="scroll-magic-body" class="invisible">
  <div class="scrollContent">
    <section id="welcome-body"></section>
    <section id="about-me-body">
      <div class="container-headline">ABOUT</div>
      <div class="container-fluid">
        <div class="about-me-frame">
          <div class="left-frame">
            <img src="assets/images/Intro@2x.png" width="443">
          </div>
          <div class="right-frame">
            <div class="chinese">
              當月光穿透雲層冰晶，折射22度角的剎那<br>
              月亮築起的銀白美麗光暈，俗稱「毛月亮」<br>
              這種飄忽、朦朧又高冷的氣息，令鄭宗龍深深著迷<br>
              以此打造全新作品，舞者肉體顫動、姿態蟄伏如幻獸<br>
              在 Sigur Rós 空靈音樂中，演繹人性的欲望與爭奪，<span class="nowrap">愛戀與孤寂</span><span class="nowrap">攪動《毛月亮》的現代傳說</span>
            </div>
            <div class="english">
              <p>In ancient folklore, a lunar halo is a sign foreboding changes, while scientifically it appears when the moonlight is refracted by 22 degrees through millions of ice crystals suspended in the atmosphere.<span class="d-none"> In his new dance piece <em>22° Lunar Halo</em>, CHENG Tsung-lung draws on this natural phenomenon to explore the themes of human anxieties, struggles, desires, love and loneliness in the lunatic, ever-changing world. Set to the music by the internationally renowned Icelandic band Sigur Rós, CHENG unfolds an exotic modern fable, as 14 dancers, like mystic animals, squeeze one another, creep, mate, fight, and kill on the deep-black mirror floor.</span><a href="#" class="read-more">Read more</a></p>
              <p class="d-none">Commissioned by National Performing Arts Center—National Theater & National Concert Hall, National Taichung Theater, National Kaohsiung Center for the Arts (Weiwuying), <em>22° Lunar Halo</em> will be world premiered at 2019 Taiwan International Festival of Arts (TIFA).</p>

            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="trailer-body">
      <div class="container-headline">TRAILER</div>
      <div class="container-fluid">
        <div class="trailer"><a href="https://www.youtube.com/watch?v=1dZe3S5s9Jc&feature=youtu.be" class="icon-play" data-lity><img src="assets/images/TrailerPic.jpg"></a></div>
      </div>
    </section>

    <section id="teams-body">
      <div class="container-headline">ARTISTIC TEAM</div>
      <div class="team-list-frame">
        <div class="item-frame">
          <div class="role">編舞 <span>Choreography</span></div>
          <div class="name">鄭宗龍 <span>CHENG Tsung-lung</span></div>
          <div class="avatar">
            <p><a href="#" data-ui-sref="team({href:'CHENG_Tsung-lung'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="artist" data-track-label="CHENG Tsung-lung"><img src="assets/images/avatar-01.png" alt="鄭宗龍"></a></p>
            <a href="#" data-ui-sref="team({href:'CHENG_Tsung-lung'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="artist" data-track-label="CHENG Tsung-lung" class="more">Read more</a>
          </div>
        </div>

        <a href="#" data-ui-sref="team({href:'Sigur_Rós'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="artist" data-track-label="Sigur Rós" class="item-frame">
          <div class="role">音樂 <span>Music</span></div>
          <div class="name">席格若斯 <span>Sigur Rós</span></div>
        </a>

        <div class="item-frame">
          <div class="role">音樂統籌 <span>Music Direction</span></div>
          <div class="name">查丹・霍姆 <span>Kjartan Hólm</span></div>
          <div class="avatar">
            <p><a href="#" data-ui-sref="team({href:'Kjartan_Hólm'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="artist" data-track-label="Kjartan Hólm"><img src="assets/images/avatar-03.png" alt="查丹・霍姆"></a></p>
            <a href="#" data-ui-sref="team({href:'Kjartan_Hólm'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="artist" data-track-label="Kjartan Hólm" class="more">Read more</a>
          </div>
        </div>

        <div class="item-frame">
          <div class="role">視覺設計暨統籌 <span>Visual Design and Direction</span></div>
          <div class="name">吳耿禎 <span>Jam WU</span></div>
          <div class="avatar">
            <p><a href="#" data-ui-sref="team({href:'Jam_WU'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="artist" data-track-label="Jam WU"><img src="assets/images/avatar-04.png" alt="吳耿禎"></a></p>
            <a href="#" data-ui-sref="team({href:'Jam_WU'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="artist" data-track-label="Jam WU" class="more">Read more</a>
          </div>
        </div>

        <div class="item-frame">
          <div class="role">燈光設計 <span>Lighting Design</span></div>
          <div class="name">沈柏宏 <span>SHEN Po-hung</span></div>
          <div class="avatar">
            <p><a href="#" data-ui-sref="team({href:'SHEN_Po-hung'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="artist" data-track-label="SHEN Po-hung"><img src="assets/images/avatar-05.png" alt="沈柏宏"></a></p>
            <a href="#" data-ui-sref="team({href:'SHEN_Po-hung'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="artist" data-track-label="SHEN Po-hung" class="more">Read more</a>
          </div>
        </div>

        <div class="item-frame">
          <div class="role">影像設計 <span>Video Design</span></div>
          <div class="name">王奕盛 <span>Ethan WANG</span></div>
          <div class="avatar">
            <p><a href="#" data-ui-sref="team({href:'Ethan_WANG'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="artist" data-track-label="Ethan WANG"><img src="assets/images/avatar-06.png" alt="王奕盛"></a></p>
            <a href="#" data-ui-sref="team({href:'Ethan_WANG'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="artist" data-track-label="Ethan WANG" class="more">Read more</a>
          </div>
        </div>

        <div class="item-frame">
          <div class="role">服裝設計 <span>Costume Design</span></div>
          <div class="name">陳劭彥 <span>CHEN Shao-yen</span></div>
          <div class="avatar">
            <p><a href="#" data-ui-sref="team({href:'CHEN_Shao-yen'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="artist" data-track-label="CHEN Shao-yen"><img src="assets/images/avatar-07.png" alt="陳劭彥"></a></p>
            <a href="#" data-ui-sref="team({href:'CHEN_Shao-yen'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="artist" data-track-label="CHEN Shao-yen" class="more">Read more</a>
          </div>
        </div>
      </div>
    </section>


    <?php if ($section['bulletin']) { ?>
    <section id="bulletin-body">
      <div class="container-headline">NEWS</div>
      <div class="container-fluid">
        <div class="bulletin-list-frame">
          <div class="item-frame">
            <div class="col-date">
              <div><span>2008</span>12.08</div>
            </div>
            <div class="col-category"><span>最新消息</span></div>
            <div class="col-title"><a href="#" data-ui-sref="view({href:'journal-example'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="news" data-track-label="1124-1">月亮筆記 TO BE CONTINUED</a></div>
          </div>
          <div class="item-frame">
            <div class="col-date">
              <div><span>2008</span>11.12</div>
            </div>
            <div class="col-category"><span>媒體報導</span></div>
            <div class="col-title"><a href="#" data-ui-sref="view({href:'journal-example'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="news" data-track-label="1124-2">雲門 2 藝術總監 鄭宗龍：春鬥2018正式開鬥！</a></div>
          </div>
          <div class="item-frame">
            <div class="col-date">
              <div><span>2008</span>10.23</div>
            </div>
            <div class="col-category"><span>媒體報導</span></div>
            <div class="col-title"><a href="#" data-ui-sref="view({href:'journal-example'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="news" data-track-label="1124-3">雲門 2 藝術總監 鄭宗龍：春鬥2018正式開鬥！</a></div>
          </div>

          <div class="item-frame d-none">
            <div class="col-date">
              <div><span>2008</span>10.23</div>
            </div>
            <div class="col-category"><span>媒體報導</span></div>
            <div class="col-title"><a href="#" data-ui-sref="view({href:'journal-example'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="news" data-track-label="1124-4">第 1 筆</a></div>
          </div>
          <div class="item-frame d-none">
            <div class="col-date">
              <div><span>2008</span>10.23</div>
            </div>
            <div class="col-category"><span>媒體報導</span></div>
            <div class="col-title"><a href="#" data-ui-sref="view({href:'journal-example'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="news" data-track-label="1124-5">第 2 筆</a></div>
          </div>
          <div class="item-frame d-none">
            <div class="col-date">
              <div><span>2008</span>10.23</div>
            </div>
            <div class="col-category"><span>媒體報導</span></div>
            <div class="col-title"><a href="#" data-ui-sref="view({href:'journal-example'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="news" data-track-label="1124-6">第 3 筆</a></div>
          </div>
          <div class="item-frame d-none">
            <div class="col-date">
              <div><span>2008</span>10.23</div>
            </div>
            <div class="col-category"><span>媒體報導</span></div>
            <div class="col-title"><a href="#" data-ui-sref="view({href:'journal-example'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="news" data-track-label="1124-7">第 4 筆</a></div>
          </div>
          <div class="item-frame d-none">
            <div class="col-date">
              <div><span>2008</span>10.23</div>
            </div>
            <div class="col-category"><span>媒體報導</span></div>
            <div class="col-title"><a href="#" data-ui-sref="view({href:'journal-example'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="news" data-track-label="1124-8">第 5 筆</a></div>
          </div>
          <div class="item-frame d-none">
            <div class="col-date">
              <div><span>2008</span>10.23</div>
            </div>
            <div class="col-category"><span>媒體報導</span></div>
            <div class="col-title"><a href="#" data-ui-sref="view({href:'journal-example'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="news" data-track-label="1124-9">第 6 筆</a></div>
          </div>
          <div class="item-frame d-none">
            <div class="col-date">
              <div><span>2008</span>10.23</div>
            </div>
            <div class="col-category"><span>媒體報導</span></div>
            <div class="col-title"><a href="#" data-ui-sref="view({href:'journal-example'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="news" data-track-label="1124-10">第 7 筆</a></div>
          </div>
          <div class="item-frame d-none">
            <div class="col-date">
              <div><span>2008</span>10.23</div>
            </div>
            <div class="col-category"><span>媒體報導</span></div>
            <div class="col-title"><a href="#" data-ui-sref="view({href:'journal-example'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="news" data-track-label="1124-11">第 8 筆</a></div>
          </div>
        </div>
        <a href="#" class="more">Read more</a>
      </div>
    </section>
    <?php } ?>

    <section id="journal-body">
      <div class="container-headline">JOURNAL</div>
      <div class="container-fluid">
        <div class="headline">月亮筆記</div>
        <p class="journal-desc-frame">
          月暈，俗稱「毛月亮」。古語「月暈而風」，暗喻風起，有事情要發生了。<br><br>
          一支舞作的創作過程，宛如一場無法預期的實驗，在理性與感性交錯的每一日常，化學變化時而無聲發酵、時而爆炸駭人，且讓「月亮筆記」紀錄月亮美麗而無常的陰晴圓缺。
        </p>
      </div>

      <div class="list-outer-fluid container-fluid">
        <div class="list-inner-fluid">
          <div class="journal-first-frame">
            <div class="item-frame">
              <a href="#" data-ui-sref="view({href:'journal-example-01'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="note" data-track-label="NT1" class="picture"><img src="assets/images/journal-picture-01.png" alt="編舞家的天文學課"></a>
              <a href="#" data-ui-sref="view({href:'journal-example-01'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="note" data-track-label="NT1" class="title">編舞家的天文學課</a>
              <div class="brief">「這22度暈指的到底是什麼，有誰可以解釋清楚嗎？」<br>此話一出，會議室中的所有人無不拾起手機，低頭搜尋…</div>
            </div>
          </div>
          <div class="journal-list-frame">
            <div class="list-item">
              <div class="item-frame">
                <a href="#" data-ui-sref="view({href:'journal-example-02'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="note" data-track-label="NT2" class="picture"><img src="assets/images/journal-picture-02.jpg" alt="舞者的練習題：選擇 = 自由？"></a>
                <a href="#" data-ui-sref="view({href:'journal-example-02'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="note" data-track-label="NT2" class="title">舞者的練習題：選擇 = 自由？</a>
                <div class="brief">
                  「你覺得你是自由的嗎？」<br>
                  舞者們總是在舞台上盡情地伸展肢體，好似擁有絕對的自由。但當龔卓軍老師此話一落，眾人卻陷入沉思…
                </div>
              </div>
            </div>
            <div class="list-item">
              <div class="item-frame">
                <a href="#" data-ui-sref="view({href:'journal-example-03'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="note" data-track-label="NT3" class="picture"><img src="assets/images/journal-picture-03.jpg" alt="月亮的陰暗面"></a>
                <a href="#" data-ui-sref="view({href:'journal-example-03'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="note" data-track-label="NT3" class="title">月亮的陰暗面</a>
                <div class="brief">「酒吧的熱度沸騰到了極點，然而夜已深，老闆關店喊停之際，一位「詩人」出現在這群醉醺醺的大漢之間，抓了幾個醉漢模擬日、月與地球運行的關係，在這間破舊的小酒吧裡，呈現了宇宙…</div>
              </div>
            </div>
          </div>
        </div>
        <div class="list-inner-fluid d-none">
          <div class="journal-first-frame">
            <div class="item-frame">
              <a href="#" data-ui-sref="view({href:'journal-example'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="note" data-track-label="NT4" class="picture"><img src="assets/images/journal-picture-01.png" alt="編舞家的天文學課"></a>
              <a href="#" data-ui-sref="view({href:'journal-example'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="note" data-track-label="NT4" class="title">編舞家的天文學課</a>
              <div class="brief">「這22度暈指的到底是什麼，有誰可以解釋清楚嗎？」<br>此話一出，會議室中的所有人無不拾起手機，低頭搜尋…</div>
            </div>
          </div>
          <div class="journal-list-frame">
            <div class="list-item">
              <div class="item-frame">
                <a href="#" data-ui-sref="view({href:'journal-example'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="note" data-track-label="NT5" class="picture"><img src="assets/images/journal-picture-02.png" alt="舞者的練習題：選擇 = 自由？"></a>
                <a href="#" data-ui-sref="view({href:'journal-example'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="note" data-track-label="NT4" class="title">舞者的練習題：選擇 = 自由？</a>
                <div class="brief">「你覺得你是自由的嗎？」<br>舞者們總是在舞台上</div>
              </div>
            </div>
            <div class="list-item">
              <div class="item-frame">
                <a href="#" data-ui-sref="view({href:'journal-example'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="note" data-track-label="NT6" class="picture"><img src="assets/images/journal-picture-03.png" alt="毛月亮舞台設計發想"></a>
                <a href="#" data-ui-sref="view({href:'journal-example'})" ui-sref-opts="{reload: true}" data-track="gtag" data-track-category="note" data-track-label="NT6" class="title">毛月亮舞台設計發想</a>
                <div class="brief">「這22度暈指的到底是什麼，有誰可以解釋清楚嗎？」<br>此話一出，會議室中的所有人無不拾起手機，低頭搜尋…</div>
              </div>
            </div>
          </div>
        </div>

        <a href="#" class="more">Read more</a>
        <div class="stay-tuned">STAY TUNED...</div>
      </div>
    </section>

    <section id="tickets-body">
      <div class="container-headline">TICKETS</div>
      <div class="container-fluid">
        <div class="ticket-list-frame">
          <div class="list-item">
            <div class="row location-frame justify-content-md-start justify-content-center">
              <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="theater-info">
                  <div class="city">高雄</div>
                  <div class="chinese">衛武營國家藝術文化中心歌劇院</div>
                  <div class="english">
                    National Kaohsiung Center<br>
                    for the Arts (Weiwuying), Kaohsiung
                  </div>
                </div>
                <div class="session-date">
                  4<span class="slash"></span>13<span class="ps-time">(Sat.) 19:30</span><br>
                  4<span class="slash"></span>14<span class="ps-time">(Sun.) 14:30</span>
                </div>
                <!-- data-track="gtag" data-track-category="Early_PR" data-track-label="WWY" -->
                <div class="btn-buy disabled"></div>
                <div class="theater-note">
                  12/24 全面啟售<br>
                  12/24-1/11 早鳥優惠
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="theater-info">
                  <div class="city">臺北</div>
                  <div class="chinese">國家兩廳院國家戲劇院</div>
                  <div class="english">
                    National Theater,<br>
                    Taipei
                  </div>
                </div>
                <div class="session-date">
                  4<span class="slash"></span>19<span class="line"></span>20<span class="ps-time">(Fri.-Sat.) 19:30</span><br>
                  4<span class="slash"></span>21<span class="ps-time">(Sun.) 14:30</span>
                </div>
                <a href="https://www.artsticket.com.tw/CKSCC2005/Product/Product00/ProductsDetailsPage.aspx?ProductID=rotyiUrPteT5tSRUqTaR5g" target="_blank" data-track="gtag" data-track-category="Early_PR" data-track-label="NT" class="btn-buy"></a>
                <div class="theater-note">
                  11/24-30 兩廳院之友預購<br>
                  12/1 全面啟售，<span>11/24-12/20 早鳥優惠</span>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="theater-info">
                  <div class="city">臺中</div>
                  <div class="chinese">國家歌劇院大劇院</div>
                  <div class="english">
                    National Taichung Theater,<br>
                    Taichung
                  </div>
                </div>
                <div class="session-date">
                  4<span class="slash"></span>27<span class="ps-time">(Sat.) 19:30</span><br>
                  4<span class="slash"></span>28<span class="ps-time">(Sun.) 14:30</span>
                  <div class="text">以上場次皆有演前導聆活動</div>
                </div>
                <!-- data-track="gtag" data-track-category="Early_PR" data-track-label="NTT" -->
                <div class="btn-buy disabled"></div>
                <div class="theater-note">
                  12/1-7 歌劇院會員預購<br>
                  12/8 全面啟售
                </div>
              </div>
            </div>
          </div>
          <div class="list-item">
            <div class="row">
              <div class="col-md-6">
                <div class="ticket-label">票價</div>
                <div class="fare-list-frame">
                  <div class="row gutters-5">
                    <div class="col-12 col-sm-auto col-md-12 col-xl-auto">
                      <ul class="list-info">
                        <li>高雄</li>
                        <li>Kaohsiung Ticket Price</li>
                      </ul>
                    </div>
                    <div class="col-12 col-sm-auto col-md-12 col-xl-auto">
                      <ul class="list-info">
                        <li>300</li>
                        <li>600</li>
                        <li>900</li>
                        <li>1200</li>
                        <li>1600</li>
                        <li>2000</li>
                      </ul>
                    </div>
                  </div>
                  <div class="space-10 d-block d-sm-none d-md-block d-xl-none"></div>
                  <div class="row gutters-5">
                    <div class="col-12 col-sm-auto col-md-12 col-xl-auto">
                      <ul class="list-info">
                        <li>臺北</li>
                        <li>Taipei Ticket Price</li>
                      </ul>
                    </div>
                    <div class="col-12 col-sm-auto col-md-12 col-xl-auto">
                      <ul class="list-info">
                        <li>500</li>
                        <li>700</li>
                        <li>900</li>
                        <li>1200</li>
                        <li>1600</li>
                        <li>2000</li>
                      </ul>
                    </div>
                  </div>
                  <div class="space-10 d-block d-sm-none d-md-block d-xl-none"></div>
                  <div class="row gutters-5">
                    <div class="col-12 col-sm-auto col-md-12 col-xl-auto">
                      <ul class="list-info">
                        <li>臺中</li>
                        <li>Taichung Ticket Price</li>
                      </ul>
                    </div>
                    <div class="col-12 col-sm-auto col-md-12 col-xl-auto">
                      <ul class="list-info">
                        <li>500</li>
                        <li>800</li>
                        <li>1200</li>
                        <li>1500</li>
                        <li>1800</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="exchanges-frame">
                  <div class="chinese">購票請洽 <a href="http://www.artsticket.com.tw" target="_blank">兩廳院售票系統</a></div>
                  <div class="english">Tickets, Refunds & Exchanges Enquiries</div>
                  <div class="connect">
                    <div class="row gutters-5">
                      <div class="col-auto">02-3393-9888</div>
                      <div class="col-auto"><span class="underline"><a href="http://www.artsticket.com.tw" target="_blank">www.artsticket.com.tw</a></span></div>
                    </div>
                  </div>
                  <ul class="supermarket">
                    <li><img src="assets/images/logo-ibon@2x.png" width="78"></li>
                    <li><img src="assets/images/logo-Fami@2x.png" width="105"></li>
                    <li><img src="assets/images/logo-HiLife@2x.png" width="106"></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6">
                <div class="grid-line d-block d-md-none"></div>
                <div class="ticket-label">優惠說明</div>
                <div class="explain-frame">
                  <div>優惠及團票訊息請洽各城市主辦單位</div>
                  <div>Discount and Group Tickets Enquiries</div>
                  <div class="row no-gutters">
                    <div class="col-12 col-sm-auto col-md-12 col-lg-auto">高雄 Kaohsiung&nbsp;<span class="line"></span></div>
                    <div class="col-12 col-sm-auto col-md-12 col-lg-auto">衛武營國家藝術文化中心&nbsp;&nbsp;<span>07-262-6666</span></div>
                  </div>
                  <div class="row no-gutters">
                    <div class="col-12 col-sm-auto col-md-12 col-lg-auto">臺北 Taipei&nbsp;<span class="line"></span></div>
                    <div class="col-12 col-sm-auto col-md-12 col-lg-auto">國家兩廳院&nbsp;&nbsp;<span>02-3393-9888</span></div>
                  </div>
                  <div class="row no-gutters">
                    <div class="col-12 col-sm-auto col-md-12 col-lg-auto">臺中 Taichung&nbsp;<span class="line"></span></div>
                    <div class="col-12 col-sm-auto col-md-12 col-lg-auto">臺中國家歌劇院&nbsp;&nbsp;<span>04-2251-1777</span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="list-item">
            <div class="precautions">
              <div class="ticket-label">注意事項</div>
              <ul class="item-list">
                <li>
                  節目全長約70分鐘，無中場休息，遲到觀眾請配合主辦單位安排進出場
                  <p>70 minutes without intermission. Latecomers may not be admitted until a suitable break in the performance. Kindly follow ushers instructions.</p>
                </li>
                <li>
                  演出含裸露與極大音量及閃光等特殊效果，請留意並斟酌入場
                  <p>This program contains nudity, loud sound, and strobe lights. Viewers discretion is advised.</p>
                </li>
                <li>
                  演出進行中演出進行中，請勿錄影、錄音或拍照，並請關閉隨身會發出聲響或光源的電子產品
                  <p>Please be reminded that video recording, sound recording, and photographing are prohibited in the auditorium.</p>
                </li>
                <li>
                  主辦單位保留節目異動權利
                  <p>The company reserves the right to change the program without notice.</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="vendor-body">
      <div class="container-fluid">
        <div class="vendor-list-frame">
          <div class="list-item">
            <div class="helper-label">
              國家表演藝術中心委託創作
              <span>Commissioned by</span>
            </div>
            <ul class="helper-list">
              <li><img src="assets/images/logo-NTCH@2x.png" width="186"></li>
              <li><img src="assets/images/logo-NTT@2x.png" width="174"></li>
              <li><img src="assets/images/logo-WWY@2x.png" width="193"></li>
            </ul>
          </div>
          <?php if (false) { ?>
          <div class="list-item">
            <div class="helper-label">
              贊助
              <span>Sponsored by</span>
            </div>
            <ul class="helper-list">
              <li><img src="assets/images/logo-NuSkin@2x.png" width="120"></li>
              <li><img src="assets/images/logo-USI@2x.png" width="237"></li>
              <li><img src="assets/images/logo-TPI@2x.png" width="239"></li>
              <li><img src="assets/images/logo-Aurora@2x.png" width="233"></li>
            </ul>
          </div>
          <?php } ?>
          <div class="list-item">
            <div class="helper-label">
              指導
              <span>Supported by</span>
            </div>
            <ul class="helper-list">
              <li><img src="assets/images/logo-Cultural@2x.png" width="150"></li>
            </ul>
          </div>
        </div>
        <div class="photographer">攝影&nbsp;&nbsp;李佳曄</div>
        <a href="#" class="back-to-top"></a>
      </div>
    </section>
  </div>
</div>
<div id="page-view-wrapper">
  <div data-ui-view></div>
</div>
<div class="noise"></div>
<script async src="assets/js/vendors/require.min.js" data-main="assets/js/require-config.js"></script>
</body>
</html>