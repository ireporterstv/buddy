
<div>

<!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->

<!-- flicity -->
<!-- <link rel="stylesheet" href="https://npmcdn.com/flickity@2/dist/flickity.css"> -->

<!-- <link rel="stylesheet" href="myflickity.css"> -->
<!-- <style>
    #toolbox-tools {
        width: 233px;
        height: 330px;
        overflow: hidden;
        display: inline-block;
        background: #00a698;
        border-radius: 3px;
        border : none;
        padding: 5px;
        padding-top: 0;
    }

    .group-handle {
        height: 34px;
        width: 10px;
        cursor: move;
    }

    .panel-heading {
        height : 30px;
        cursor: move;
        background : #00a698 !important;
        border:none !important;
    }

    .main-panel {
        width : 100%;
        border-radius:4px;
        max-height : 200px;
    }

    .draggable-group {
        float: left;
    }

    #sortable {
        padding: 0px;
    }

    #sort-holder {
        display: none;
    }

    #toggle-toolbox-tools {
        cursor: pointer;
    }

    #close-toolbox-tools {
        cursor: pointer;
        display:none;
    }

    .toggle-button-group {
        cursor: pointer;
    }

    .draggable-group {
        overflow: hidden;
    }

    .minimized {
        width: 12px;
        height: 36px;
    }

    .itemSlider {
    background: #FAFAFA;
    }

    .itemSlider-cell {
        width: 70%;
        height: 250px;
        margin-right: 10px;
        border-radius: 5px;
        padding:4px;
        padding-top:10px;
        display:flex;
        flex-direction:column;
    }

    /* cell number */
    .itemSlider-cell:before {
        display: block;
        text-align: center;
        line-height: 250px;
        font-size: 80px;
        color: white;
    }

    .item-slider-title {
        font-size : 14px;
    }

    .item-slider-title strong {
        color : #0066c0;
    }

    .item-slider-title img {
        width : 70px;
        height : 70px;
    }
    .item-slider .item-a-tag{
        font-size : 13px;
        font-size: 13px;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        line-height: 20px;
        max-height: 40px;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }
</style> -->

<div class="panel panel-primary draggable-panel toolbar-panel ui-draggable" id="toolbox-tools" style="box-shadow: rgba(0, 0, 0, 0.5) 0px 3px 10px;">
    <div class="panel-heading lang-panel-header-tools" style="font-weight : bold">
        <i class="fa fa-times pull-right close-panel" id="close-toolbox-tools"></i>
        BEST OFFERS
        <i class="fa fa-times pull-right close-panel" id="close-toolbox-tools"></i>
        <i class="fa pull-right fa-chevron-down" id="toggle-toolbox-tools"></i>
    </div>
	
    <?php if (!empty($t['scrapeResult'])) : ?>

        <div class="card infobox-card" id="infobox-list">
            <div class="itemSlider" data-flickity='{ "pageDots": false }'>
                <?php foreach ($t['scrapeResult'] as $k => $item) :?>
                    <div class="itemSlider-cell">
                        <div class = "item-slider-title">
                            <div class = "item-slider-title-img">
                                <a class="web-result-title" href="<?= e_attr($item['url']); ?>" target="_blank" rel="nofollow nopener noreferer">
                                    <img src="https://www.google.com/s2/favicons?domain=money.usnews.com" class="web-result-favicon" onclick="wathLogs('https://money.usnews.com/careers/best-jobs/accountant')"/>
                                </a>
                            </div>
                            <div class = "item-slider-title-text">
                                <strong><?= e_attr($item['productionName']); ?></strong>
                                <a href="<?= e_attr($item['url']); ?>" style="font-size : 13px; color : green"><?= e_attr($item['siteName']); ?></a>
                            </div>
                        </div>
                        <div class = "item-slider-title-number"><?= $k+1 ?> of <?= e_attr(count($t['scrapeResult']))?> Results</div>
                        <div>
                            <img class = "product-image" src = "<?= e_attr($item['imageSrc']); ?>"/>
                        </div>
                        <a href="<?= e_attr($item['url']); ?>" class = "item-a-tag" class="a-link-normal" target="_blank" rel="noopener">
                            <?= e_attr($item['description']) ?>
                        </a>
                        <div class="product-price-prime">
                            <span>
                                <?= e_attr($item['simbol']); ?> <?= e_attr($item['price']); ?>
                            </span>
                        </div>
                        <div class = "item-slider-rate">
                            <a href="<?= e_attr($item['url']); ?>" data-toggle="tooltip" data-placement="top" title="<?= e_attr($item['rate']); ?> of <?= e_attr($item['reviews']); ?>">
                                <ul class="rating">
                                    <li>
                                        <? if ($item['rate'] >= 1) { ?>
                                            <i class="fas fa-star fa-sm text-warning"></i>
                                        <? } else if($item['rate'] >= 0.5) { ?>
                                            <i class="fas fa-star-half-alt fa-sm text-warning"></i>
                                        <? } else { ?>
                                            <i class="far fa-star fa-sm text-warning"></i>
                                        <? } ?>
                                    </li>
                                    <li>
                                        <? if ($item['rate'] >= 2) { ?>
                                            <i class="fas fa-star fa-sm text-warning"></i>
                                        <? } else if($item['rate'] >= 1.5) { ?>
                                            <i class="fas fa-star-half-alt fa-sm text-warning"></i>
                                        <? } else { ?>
                                            <i class="far fa-star fa-sm text-warning"></i>
                                        <? } ?>
                                    </li>
                                    <li>
                                        <? if ($item['rate'] >= 3) { ?>
                                            <i class="fas fa-star fa-sm text-warning"></i>
                                        <? } else if($item['rate'] >= 2.5) { ?>
                                            <i class="fas fa-star-half-alt fa-sm text-warning"></i>
                                        <? } else { ?>
                                            <i class="far fa-star fa-sm text-warning"></i>
                                        <? } ?>
                                    </li>
                                    <li>
                                        <? if ($item['rate'] >= 4) { ?>
                                            <i class="fas fa-star fa-sm text-warning"></i>
                                        <? } else if($item['rate'] >= 3.5) { ?>
                                            <i class="fas fa-star-half-alt fa-sm text-warning"></i>
                                        <? } else { ?>
                                            <i class="far fa-star fa-sm text-warning"></i>
                                        <? } ?>
                                    </li>
                                    <li>
                                        <? if ($item['rate'] == 5) { ?>
                                            <i class="fas fa-star fa-sm text-warning"></i>
                                        <? } else if($item['rate'] >= 4.5) { ?>
                                            <i class="fas fa-star-half-alt fa-sm text-warning"></i>
                                        <? } else { ?>
                                            <i class="far fa-star fa-sm text-warning"></i>
                                        <? } ?>
                                    </li>
                                    <span style="font-weight :bold ; margin-left:5px; margin-top:3px; font-size : 12px"><?= e_attr($item['reviews']); ?></span>
                                </ul>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    <?php endif; ?>
</div> 

<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
<!-- flickity js -->
<script src="https://npmcdn.com/flickity@2/dist/flickity.pkgd.js"></script>

<script>
$(document).ready(function() {
    
    // Add drag and resize option to panel
    $("#toolbox-tools").draggable({
        handle: ".panel-heading",
        stop: function(evt, el) {
            // Save size and position in cookie
            /*
            $.cookie($(evt.target).attr("id"), JSON.stringify({
                "el": $(evt.target).attr("id"),
                "left": el.position.left,
                "top": el.position.top,
                "width": $(evt.target).width(),
                "height": $(evt.target).height()
            }));
            */
        }
    });
    // .resizable({
    //     handles: "e, w, s, se",
    //     stop: function(evt, el) {
    //         // Save size and position in cookie
    //         /*
    //         $.cookie($(evt.target).attr("id"), JSON.stringify({
    //             "el": $(evt.target).attr("id"),
    //             "left": el.position.left,
    //             "top": el.position.top,
    //             "width": el.size.width,
    //             "height": el.size.height
    //         }));
    //         */
    //     }
    // });	


    // Expand and collaps the toolbar
    $("#toggle-toolbox-tools").on("click", function() {
        var panel = $("#toolbox-tools");
        
        if ($(panel).data("org-height") == undefined) {
            $(panel).data("org-height", $(panel).css("height"));
            $(panel).css("height","41px");
        } else {
            $(panel).css("height", $(panel).data("org-height"));
            $(panel).removeData("org-height");
        }
                
        $(this).toggleClass('fa-chevron-down').toggleClass('fa-chevron-right');
    });

    // Make toolbar groups sortable
    $( "#sortable" ).sortable({
        stop: function (event, ui) {
            var ids = [];
            $.each($(".draggable-group"), function(idx, grp) {
                ids.push($(grp).attr("id"));
            });
            
            // Save order of groups in cookie
            //$.cookie("group_order", ids.join());
        }
    });
    $( "#sortable" ).disableSelection();


    // Make Tools panel group minimizable
    $.each($(".draggable-group"), function(idx, grp) {
        var tb = $(grp).find(".toggle-button-group");

        $(tb).on("click", function() {
            $(grp).toggleClass("minimized");
            $(this).toggleClass("fa-caret-down").toggleClass("fa-caret-up");

            // Save draggable groups to cookie (true = Minimized, false = Not Minimized)
            var ids = [];
            $.each($(".draggable-group"), function(iidx, igrp) {
                var itb = $(igrp).find(".toggle-button-group");
                var min = $(igrp).hasClass("minimized");

                ids.push($(igrp).attr("id") + "=" + min);
            });

            $.cookie("group_order", ids.join());
        });
    });


    // // Close thr panel
    $(".close-panel").on("click", function() {
        $(this).parent().parent().hide();
    });

    // Add Tooltips
    $('button').tooltip();
    $('.toggle-button-group').tooltip();
});
</script>

</div>
