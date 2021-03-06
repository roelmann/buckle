<?php

$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepre = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-pre', $OUTPUT));
$hassidepost = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-post', $OUTPUT));
$haslogininfo = (empty($PAGE->layout_options['nologininfo']));

$showsidepre = ($hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT));
$showsidepost = ($hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT));

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$courseheader = $coursecontentheader = $coursecontentfooter = $coursefooter = '';
if (empty($PAGE->layout_options['nocourseheaderfooter'])) {
    $courseheader = $OUTPUT->course_header();
    $coursecontentheader = $OUTPUT->course_content_header();
    if (empty($PAGE->layout_options['nocoursefooter'])) {
        $coursecontentfooter = $OUTPUT->course_content_footer();
        $coursefooter = $OUTPUT->course_footer();
    }
}

$bodyclasses = array();
if ($showsidepre && !$showsidepost) {
    if (!right_to_left()) {
        $bodyclasses[] = 'side-pre-only';
    }else{
        $bodyclasses[] = 'side-post-only';
    }
} else if ($showsidepost && !$showsidepre) {
    if (!right_to_left()) {
        $bodyclasses[] = 'side-post-only';
    }else{
        $bodyclasses[] = 'side-pre-only';
    }
} else if (!$showsidepost && !$showsidepre) {
    $bodyclasses[] = 'content-only';
}
if ($hascustommenu) {
    $bodyclasses[] = 'has_custom_menu';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
</head>
<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>
<div id="page">
<?php if ($hasheading || $hasnavbar || !empty($courseheader)) { ?>
    <div id="page-header">
    <?php if ($hasheading) { ?>
    <header role="banner">
	    <div class="brand">
	        <h1 class="headermain"><?php echo $PAGE->heading ?></h1>
            <div class="headermenu"><?php
                if ($haslogininfo) {
                   echo $OUTPUT->login_info();
                }
                if (!empty($PAGE->layout_options['langmenu'])) {
                    echo $OUTPUT->lang_menu();
                }
                echo $PAGE->headingmenu
            ?></div>
        </div>
    </header>
    <?php } ?>

        <?php if ($hascustommenu) { ?>
                    <nav role="navigation" class="navbar navbar-inner">
                        <div class="container-fluid">
                            <a class="btn btn-navbar" data-toggle="workaround-collapse" data-target=".nav-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
                            <div class="nav-collapse collapse">
                                <?php if ($hascustommenu) {
                                    echo $custommenu;
                                } ?>
                            </div>
                        </div>
                    </nav>
        <?php } ?>
        <?php if ($hasnavbar) { ?>
            <div class="navbar clearfix">
                    <nav class="breadcrumb-button"><?php echo $PAGE->button; ?></nav>
                    <?php echo $OUTPUT->navbar(); ?>
            </div>
        <?php } ?>
        <?php if (!empty($courseheader)) { ?>
        <header>
            <div id="course-header"><?php echo $courseheader; ?></div>
        </header>
        <?php } ?>
    </div>
<?php } ?>
<!-- END OF HEADER -->
<div id="page-content-wrapper" class="clearfix">
    <div id="page-content">
        <div id="region-main-box">
            <div id="region-post-box">

                <div id="region-main-wrap">
                    <section id="region-main">
                        <div class="region-content">
                            <?php echo $coursecontentheader; ?>
                            <?php echo $OUTPUT->main_content() ?>
                            <?php echo $coursecontentfooter; ?>
                        </div> <!-- close region-content -->
                    </section> <!-- close region-main -->
                </div> <!-- close region-main-wrap -->

                <?php if ($hassidepre OR (right_to_left() AND $hassidepost)) { ?>
                <aside id="region-pre" > <div class="block-region">
                    <div class="region-content">
                            <?php
                        if (!right_to_left()) {
                            echo $OUTPUT->blocks_for_region('side-pre');
                        } elseif ($hassidepost) {
                            echo $OUTPUT->blocks_for_region('side-post');
                    } ?>

                    </div> <!-- close region-content -->
                </div></aside> <!-- close region-pre block-region -->
                <?php } ?>

                <?php if ($hassidepost OR (right_to_left() AND $hassidepre)) { ?>
                <aside id="region-post"> <div class="block-region">
                    <div class="region-content">
                           <?php
                       if (!right_to_left()) {
                           echo $OUTPUT->blocks_for_region('side-post');
                       } elseif ($hassidepre) {
                           echo $OUTPUT->blocks_for_region('side-pre');
                    } ?>
                    </div> <!-- close region-content -->
                </div> </aside> <!-- close region-post block-region -->
                <?php } ?>

            </div> <!-- close region-post-box -->
        </div> <!-- close region-main-box -->
    </div> <!-- close page content -->
</div> <!-- close page-content-wrapper -->

<!-- START OF FOOTER -->
    <?php if (!empty($coursefooter)) { ?>
        <div id="course-footer"><?php echo $coursefooter; ?></div>
    <?php } ?>
    <?php if ($hasfooter) { ?>
    <div id="page-footer" class="clearfix">
        <p class="helplink"><?php echo page_doc_link(get_string('moodledocslink')) ?></p>
        <?php
        echo $OUTPUT->login_info();
        echo $OUTPUT->home_link();
        echo $OUTPUT->standard_footer_html();
        ?>
    </div>
    <?php } ?>
    <div class="clearfix"></div>
</div>
<?php
    $useragent = '';
    if (!empty($_SERVER['HTTP_USER_AGENT'])) {
        $useragent = $_SERVER['HTTP_USER_AGENT'];
    }
    if (strpos($useragent, 'MSIE 8') || strpos($useragent, 'MSIE 7')) {
		$PAGE->requires->js(new moodle_url('https://raw.github.com/scottjehl/Respond/master/respond.min.js'));
    }
?>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>
