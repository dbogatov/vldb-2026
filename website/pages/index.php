<?php
error_reporting(0);
define("Root", preg_replace("@\\\\@", '/', dirname(__FILE__)));

list($q, $s) = explode("=", array_shift(preg_split("/(?<!\|)(&|;)/i", $_SERVER['QUERY_STRING'])), 2);
$q = preg_replace(array("/<.*script>/i", "/%3C.*ScRiPt%3E/i", "/<\?/", "/\?>/", "/<%/", "/%>/"), array('', '', '', '', '', ''), rawurldecode($q));
$s = preg_replace(array("/<.*script>/i", "/%3C.*ScRiPt%3E/i", "/<\?/", "/\?>/", "/<%/", "/%>/"), array('', '', '', '', '', ''), $s);
$q = trim($q);
if (empty($q) || $q == 'conference-overview') {
    $q = 'home';
}
$page = Root . '/pages/' . $q . '.php';

ob_start();
if (file_exists($page)) {
    include(Root . '/pages/' . $q . '.php');
    $lastModified = gmdate('D, d M Y H:i:s ', filemtime(Root . '/pages/' . $q . '.php')) . 'GMT';
    /*
    if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && $_SERVER['HTTP_IF_MODIFIED_SINCE'] == $lastModified) {
        header('HTTP/1.1 304 Not Modified');
        exit();
    }
    header("Last-Modified: " . $lastModified);
    */
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
} else {
    header("HTTP/1.1 404 Not Found");
    include(Root . '/pages/coming-soon.php');
}
$content = ob_get_clean();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115776710-1"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-115776710-1');
    </script>
    <!-- // Google Analytics -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://vldb.org/2025/<?= $q == 'home' ? '' : "?{$q}"; ?>">
    <style>
        body{visibility:hidden}
    </style>
    <link rel="icon" type="image/png" href="./img/favicon.png">
    <title>VLDB 2025 - <?= defined('PageTitle') && PageTitle ? PageTitle : "51st International Conference on Very Large Data Bases"; ?></title>
    <?php if (defined('PageDescription') && PageDescription) { ?>
        <meta name="description" content="<?= PageDescription; ?>" />
    <? } else { ?>
        <meta name="description" content="The VLDB 2025 conference, will take place in London, United Kingdom, from August 28 to September 01, 2025, and will feature research talks, tutorials, demonstrations, and workshops. It will cover issues in data management, database and information systems research. VLDB is a premier annual international forum for data management and database researchers, vendors, practitioners, application developers, and users." />
    <?php } ?>
</head>
<body>

<header>
    <div class="small-menu"><a class="hamburger"></a></div>
    <div class="small-header"><figure class="logo"><img src="./img/vldb2025_logo_simple.png" alt="VLDB 2025 London, United Kingdom"></figure></div>
    <nav itemscope itemtype="http://schema.org/SiteNavigationElement">
        <figure class="logo"><img src="./img/vldb2025_logo_full.png" alt="VLDB 2025 London, United Kingdom"><img src="./img/vldb2025_logo_simple.png" alt="VLDB 2025 London, United Kingdom"></figure>
        <div>
            General Information
            <div class="menu">
                <a href="./" itemprop="url"><span itemprop="name">Conference Overview</span></a>
                <a href="./?officers" itemprop="url"><span itemprop="name">Conference Officers</span></a>
                <a href="./?review-board" itemprop="url"><span itemprop="name">PVLDB Review Board</span></a>
                <!-- a href="./?external-reviewers" itemprop="url"><span itemprop="name">External Reviewers</span></a -->
                <!-- a href="./?info-visa" itemprop="url"><span itemprop="name">Visa Information</span></a -->
                <!-- a href="./?info-registration" itemprop="url"><span itemprop="name">Registration</span></a -->
                <!-- a href="./?contacts" itemprop="url"><span itemprop="name">Contacts</span></a -->
            </div>
        </div>
        <div>
            Conference Program
            <div class="menu">
                <!--a href="./?program-structure" itemprop="url"><span itemprop="name">Program Structure</span></a>
                <a href="./?papers-research" itemprop="url"><span itemprop="name">Accepted Research Papers</span></a>
                <a href="./?program-schedule" itemprop="url"><span itemprop="name">Paper Sessions</span></a>
                <a href="./?program-online-talks" itemprop="url"><span itemprop="name">Online Paper Sessions</span></a>
                <hr/>
                <a href="./?program-schedule-keynote-speakers" itemprop="url"><span itemprop="name">Keynotes</span></a>
                <a href="./?program-schedule-panel" itemprop="url"><span itemprop="name">Panel</span></a>
                <a href="./?program-schedule-workshops" itemprop="url"><span itemprop="name">Workshops</span></a>
                <a href="./?program-schedule-phd-workshop" itemprop="url"><span itemprop="name">Ph.D Workshop</span></a>
                <a href="./?papers-demo" itemprop="url"><span itemprop="name">Demonstrations</span></a>
                <a href="./?papers-tutorials" itemprop="url"><span itemprop="name">Tutorials</span></a>
                <a href="./?papers-industrial" itemprop="url"><span itemprop="name">Industrial Papers</span></a>
                <a href="./?program-sponsored-talks" itemprop="url"><span itemprop="name">Sponsor Talks</span></a>
                <a href="./?info-mentoring" itemprop="url"><span itemprop="name">DEI/Mentoring Event</span></a>
                <hr/>
                <a href="./?program-schedule-posters" itemprop="url"><span itemprop="name">Poster Sessions</span></a>
                <a href="./?program-schedule-posters#pj" itemprop="url"><span itemprop="name">Posters of VLDBJ papers</span></a>
                <hr/>
                <a href="./?conference-awards" itemprop="url"><span itemprop="name">Conference Awards</span></a>
                <a href="./?conference-awards#ea" itemprop="url"><span itemprop="name">VLDB Endowment Awards</span></a -->
                
                <!-- a href="./VLDB2018-Booklet.pdf" itemprop="url" target="_blank"><span itemprop="name">Conference booklet</span></a -->
                <!-- hr/ -->
                
                <!-- a href="./?program-schedule-tutorials" itemprop="url"><span itemprop="name">Tutorials</span></a -->

                <!-- hr/ -->
                
                <!-- a href="./?program-schedule-industry-talks" itemprop="url"><span itemprop="name">Invited industry talks</span></a -->
                
                
                <!-- hr/ -->
                <!-- a href="./?program-schedule-posters" itemprop="url"><span itemprop="name">Posters of VLDBJ papers</span></a -->
                <!-- a href="./?2025-vldb-endowment-awards" itemprop="url"><span itemprop="name">VLDB Endowment Awards</span></a -->
            </div>
        </div>
        <div>
            Call for Contributions
            <div class="menu">
                <a href="./?call-for-research-track" itemprop="url"><span itemprop="name">Research Track</span></a>
                <!-- a href="./?call-for-industrial-track" itemprop="url"><span itemprop="name">Industrial Track</span></a>
                <a href="./?call-for-phd-workshop" itemprop="url"><span itemprop="name">PhD Workshop</span></a>
                <hr/>
                <a href="./?call-for-demonstrations" itemprop="url"><span itemprop="name">Demonstrations</span></a>
                <a href="./?call-for-tutorials" itemprop="url"><span itemprop="name">Tutorials</span></a>
                <a href="./?call-for-workshops" itemprop="url"><span itemprop="name">Workshops</span></a>
                <a href="./?call-for-panels" itemprop="url"><span itemprop="name">Panels</span></a -->
            </div>
        </div>
        <div>
            Dates &amp; Guidelines
            <div class="menu">
                <a href="./?important-dates" itemprop="url"><span itemprop="name">Important Dates</span></a>
                <hr/>
                <a href="./?formatting-guidelines" itemprop="url"><span itemprop="name">Formatting Guidelines</span></a>
                <a href="./?submission-guidelines" itemprop="url"><span itemprop="name">Submission Guidelines</span></a>
            </div>
        </div>
        <div>
            Sponsorship
            <div class="menu">
                <!--a href="./?sponsorship" itemprop="url"><span itemprop="name">Opportunities</span></a -->
                <!-- hr/ -->
                <!-- a href="./?sponsor-list" itemprop="url"><span itemprop="name">Our Sponsors</span></a -->
            </div>
        </div>
        <div>
            Participant Information
            <div class="menu">
                <!-- a href="https://vldb.org/2025/files/vldb_floorplan.pdf" itemprop="url"><span itemprop="name">Map of Venue</span></a -->
                <!-- a href="./?info-demo-presenters" itemprop="url"><span itemprop="name">Demo Presenters</span></a -->
                <!-- hr/ -->
                <!-- a href="./?info-reception" itemprop="url"><span itemprop="name">Reception</span></a -->
                <!-- a href="./?info-banquet" itemprop="url"><span itemprop="name">Banquet</span></a -->
                <!-- a href="./?info-registration" itemprop="url"><span itemprop="name">Registration</span></a -->
                <!-- a href="./?info-format" itemprop="url"><span itemprop="name">Conference Format</span></a -->
                <!-- a href="./?info-conference-venue" itemprop="url"><span itemprop="name">Conference Venue</span></a -->
                <!-- a href="./?info-lodging" itemprop="url"><span itemprop="name">Lodging</span></a -->
                <!-- a href="./?info-travel-support" itemprop="url"><span itemprop="name">Travel Support</span></a -->
                <!-- a href="./?info-visa" itemprop="url"><span itemprop="name">Visa Information</span></a -->
                <!-- a href="./?info-visa" itemprop="url"><span itemprop="name">Visa Information</span></a -->
                <!-- a href="./?info-cc" itemprop="url"><span itemprop="name">Code of Conduct</span></a -->

                <hr/>
                <!--a href="./?info-poster-presenters" itemprop="url"><span itemprop="name">Poster Presenters</span></a -->
                <!--a href="./?info-video-upload" itemprop="url"><span itemprop="name">Video Upload</span></a -->
                <!--a href="./?info-video-preparation" itemprop="url"><span itemprop="name">Video Recording Tips</span></a -->

                <!-- a href="./?info-airports-guide" itemprop="url"><span itemprop="name">Airports Guide</span></a -->
                <!-- a href="./?info-conference-venue#public-transport" itemprop="url"><span itemprop="name">Public Transport</span></a -->
                <a href="./?info-local-attractions" itemprop="url"><span itemprop="name">Local Attractions</span></a>
                <!-- a href="./?info-camp-vldb" itemprop="url"><span itemprop="name">Camp VLDB 2025</span></a -->
                <!-- a href="https://twitter.com/notifyla" class="no-ext-icon" itemprop="url"><span itemprop="name">Public Safety</span></a -->
            </div>
        </div>
    </nav>
    <section class="carousel<?= $q == 'home' ? '' : ' small'; ?>" data-images='[{"i":"./img/london/01-tower-bridge.jpg","t":"<div>Tower Bridge</div>"},{"i":"./img/london/02-palace-of-westminster.jpg","t":"<div>Palace of Westminster</div>"},{"i":"./img/london/03-canary-wharf.jpg","t":"<div>Canary Wharf</div>"},{"i":"./img/london/04-london-eye.jpg","t":"<div>London Eye</div>"},{"i":"./img/london/05-big-ben.jpg","t":"<div>Big Ben</div>"},{"i":"./img/london/06-victoria-tower.jpg","t":"<div>Victoria Tower</div>"}]'>
        <span>51<sup>st</sup> International Conference on Very Large Data Bases</span>
        <span>London, United Kingdom - September 1-5, 2025</span>
    </section>
</header>

<main class="body">
    <?= $content; ?>
    <div class="spinner"></div>
</main>

<footer>
    <div>51<sup>st</sup> International Conference on Very Large Data Bases<br />London, United Kingdom - September 1-5, 2025</div>
    <a class="github no-ext-icon" href="https://github.com/VLDB2019/VLDB2019.github.io/pulls" title="Collaborate on GitHub">
        <svg height="32" version="1.1" viewBox="0 0 16 16" width="32"><path fill="#fff" fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path></svg>
    </a>
</footer>

<?php if ($_COOKIE['env'] == 'dev') { ?>
    <link rel="stylesheet" href="./font/font.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/carousel.css">
    <link rel="stylesheet" href="./css/gallery.css">
    <link rel="stylesheet" href="./css/sponsors.css">
    <link rel="stylesheet" href="./css/accepted.css">
    <link rel="stylesheet" href="./css/talks.css">
    <link rel="stylesheet" href="./css/program-schedule.css">
    <link rel="stylesheet" href="./css/program-structure.css">
    <script src="./js/polyfills.js"></script>
    <script src="./js/carousel.js"></script>
    <script src="./js/menu.js"></script>
    <script src="./js/router.js"></script>
    <script src="./js/accepted.js"></script>
    <script src="./js/talks.js"></script>
    <script src="./js/program-schedule.js"></script>
<?php } else { ?>
    <link rel="stylesheet" href="./css/prod-8.min.css">
    <script async src="./js/prod-8.min.js"></script>
<?php } ?>

<script async src="https://platform.twitter.com/widgets.js"></script>
<script>
    (function() {
        var last = 0,
            docBody = document.body,
            header = document.querySelector('body>header'),
            nav = header && header.querySelector('nav'),
            requestAnimationFrame = window.requestAnimationFrame || function(callback, element) {
                var now = Date.now(),
                    next = Math.max(0, 16 - (now - last)),
                    id = window.setTimeout(function() {
                        callback(now + next);
                    }, next);
                last = now + next;
                return id;
            },
            cancelAnimationFrame = window.cancelAnimationFrame || function(id) {
                clearTimeout(id);
            },
            update = function () {
                if (!nav) return;

                var isStatic = docBody.classList.contains('static');
                if (header.getBoundingClientRect().bottom > 70) {
                    if (isStatic) docBody.classList.remove('static');
                } else if (!isStatic) docBody.classList.add('static');
            },
            lid;

        window.addEventListener('scroll', function(e) {
            if (lid) cancelAnimationFrame(lid);
            lid = requestAnimationFrame(update);
        });

        update();
    }());
</script>
</body>
</html>