<?php
/**
 * Template for the homepage
 *
 */
defined('SPARKIN') or die('xD');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

<?php insert('shared/offcanvas_menu.php'); ?>
<!-- Dimmer for dimming the background when searchbox is focused -->
<div id="dimmer" class="dimmer"></div>

<!-- Standalone navbar for the homepage -->
<nav class="navbar <?php echo $t['backgrounds_enabled'] ? 'navbar-dark' : darkmode_value('navbar-light', 'navbar-dark'); ?> navbar-expand-sm home-navbar px-1">
    <ul class="navbar-nav mr-auto flex-row">
        <?php foreach ($t['nav_engines'] as $engine) : ?>
            <li class="nav-item">
                <a
                class="nav-link <?php echo $engine['engine_id'] == $t['default_engine'] ? 'active' : '' ; ?>"
                data-engine-active="<?php echo $engine['engine_id'] == $t['default_engine'] ? 'true' : 'false' ; ?>"
                href="javascript:void();"
                data-target="#engine"
                data-text-target="#engine-name"
                data-engine-id="<?php echo e_attr($engine['engine_id']); ?>">
                <?php echo e(__($engine['engine_name'], _T)); ?>
            </a>
        </li>
        <?php endforeach; ?>

        <?php if (has_items($t['dropdown_engines'])) : ?>
          <li class="nav-item dropdown position-reset-xs">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle hide-caret" data-toggle="dropdown">
                <?php echo svg_icon('more-horizontal', 'svg-md'); ?>
          </a>
          <div class="dropdown-menu dropdown-fullscreen-xs">
              <?php foreach ($t['dropdown_engines'] as $engine) : ?>
                <a
                class="dropdown-item <?php echo $engine['engine_id'] == $t['default_engine'] ? 'active' : '' ; ?>"
                data-engine-active="<?php echo $engine['engine_id'] == $t['default_engine'] ? 'true' : 'false' ; ?>"
                href="javascript:void();"
                data-target="#engine"
                data-text-target="#engine-name"
                data-engine-id="<?php echo e_attr($engine['engine_id']); ?>">
                    <?php echo e(__($engine['engine_name'], _T)); ?>
            </a>
              <?php endforeach; ?>
          </div>
      </li>
        <?php endif; ?>
</ul>

<ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a href="javascript:void(0);" data-target="#offcanvas" data-toggle="navdrawer" class="nav-link" title="tooltip"><?php echo svg_icon('menu', 'svg-md'); ?></a>
    </li>
</ul>
</nav>
<!-- Homepage navbar ends -->


<div class="container home-container">

    <!-- Homepage logo section -->
    
    <form method="GET" action="<?php echo e_attr(url_for('site.search')); ?>" id="searchForm" data-ajax-form="true" data-before-callback="preventEmptySubmit">
    
    <div class="home-logo-wrap py-2 <?php echo e_attr($t['logo_alignment_class']); ?> mb-2 position-relative px-1" style = "display:flex;flex-direction:row; justify-content : space-between">
        <a href="<?php e_attr(url_for('site.home')); ?>" class="sp-link d-inline-flex">
            <img src="<?php echo e_attr($t['logo_url']); ?>" alt="<?php echo e_attr(get_option('site_name')); ?>" class="home-logo">
            <span id="engine-name" class="d-inline-flex position-absolute home-engine-name">
                <?php echo e(__($t['engine.engine_name'], _T)); ?>
            </span>
        </a>
        <input type="checkbox" checked data-toggle="toggle" data-on="<i class='fa fa-search'></i>&nbsp;&nbsp; Production" data-off="<i class='fa fa-info-circle'></i>&nbsp;&nbsp; Information" name = "queryType" value = "1">
    </div>
    <!-- ./home-logo-wrap -->

    <!-- Search form -->

        <input type="hidden" name="engine" value="<?php echo e_attr($t['default_engine']); ?>" id="engine">
        <div class="form-group searchbox-group" id="home-search-group">
            <input type="text" title="" class="form-control search-input" name="q" data-autocomplete="true" autocomplete="off" spellcheck="false" autocorrect="off" id="home-search-input">
            <button type="submit" class="has-spinner search-btn right-0"><span class="btn-text"><?php echo svg_icon('search', 'svg-md'); ?></span>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            </button>
        </div>
    </form>

</div>
<!-- ./container -->

<?php if ($t['background']) : ?>
    <!-- Custom styles for backgrounds -->
    <style type="text/css">
        body {
            background-image: url("<?php echo e_attr($t['background']); ?>");
        }
    </style>
<?php endif; ?>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
$(document).ready(function(){

    const isUrl = function validURL(str) {
        if(str.indexOf('https:') != -1 && str.indexOf('http:'))
            return true;
        var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
            '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
            '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
            '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
            '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
            '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
        return !!pattern.test(str);
    };

    const deterEngine = function(string){
        console.log(string);
        if (isUrl(string))
            return "url"
    };

    $("#home-search-input").on("change paste keyup", function() {
        console.log($(this).val()); 
    });
});
</script>
