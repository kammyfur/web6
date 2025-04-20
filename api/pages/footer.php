<footer class="p-footer p-strip u-clearfix">
    <div class="u-fixed-width p-footer__container">
        <p class="u-hide--medium u-hide--large link-to-top"><a href="#"><small><?= $lang->footer->topalt ?></small></a></p>
        <nav id="main-navigation" class="p-footer__nav u-clearfix row u-no-padding--left u-no-padding--right">
            <?php $i=2;foreach ($config->footer->columns as $column): ?>
            <div class="p-footer__nav-col col-2 u-no-margin--bottom<?php if ($i == (count($config->footer->columns) + 1)) { echo(" last-col"); } ?>">
                <ul class="p-footer__links">
                    <?php foreach ($column->categories as $category): ?>
                    <li class="p-footer__item<?php if ($i == (count($config->footer->columns) + 1)) { echo(" p-footer__item--spaced"); } ?>">
                        <?php if (isset($category->url) && $category->url != null): ?>
                        <h2 class="p-footer__title"><a class="p-link--soft" href="<?= $category->url ?>"><?= $category->name->$_LANGUAGE ?></a></h2>
                        <?php else: ?>
                        <h2 class="p-footer__title p-footer__title-text"><span><?= $category->name->$_LANGUAGE ?></span></h2>
                        <?php endif; ?>
                        <ul class="second-level-nav">
                            <?php foreach ($category->items as $item): ?>
                            <li class="p-footer-list--margin"><a href="<?= $item->url ?>"><?= $item->name->$_LANGUAGE ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <?php if ($i == (count($config->footer->columns) + 1)): ?>
                    <li>
                        <ul class="second-level-nav second-level-nav-small">
                            <?php foreach ($config->footer->global as $item): ?>
                            <li class="p-footer-list--margin p-footer-list-single-child">
                                <a class="p-link--soft" href="<?= $item->url ?>"><small><?= $item->name->$_LANGUAGE ?></small></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php $i++;endforeach; ?>
        </nav>
        <hr class="p-footer__divider" />
        <div class="p-footer--secondary row">
            <div class="col-7">
                <nav>
                    <ul class="p-inline-list">
                        <li class="u-hide--small p-inline-list__item">
                            <a class="p-button--neutral" href="<?= $config->footer->post[0]->url ?>"><small class="u-no-padding--top"><?= $config->footer->post[0]->name->$_LANGUAGE ?></small></a>
                        </li>
                        <?php
                        array_shift($config->footer->post);
                        foreach ($config->footer->post as $item): ?>
                        <li class="p-inline-list__item">
                            <a class="p-link--soft" href="<?= $item->url ?>"><small><?= $item->name->$_LANGUAGE ?></small></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
                <p class="p-footer--secondary__content"><small><?= str_replace("%year%", date('Y'), implode("<br>", $config->copyright->$_LANGUAGE)) ?></small></p>
                <nav class="p-footer--secondary__nav">
                    <ul class="p-inline-list--middot u-no-margin--bottom">
                        <?php foreach ($config->links as $link): ?>
                        <li class="p-inline-list__item">
                            <a class="p-link--soft" href="<?= $link->url ?>"<?php if ($link->newtab): ?> target="_blank"<?php endif ?>><small><?= $link->name->$_LANGUAGE ?></small></a>
                        </li>
                        <?php endforeach ?>
                    </ul>
                </nav>
                <?php
                
                $_RENDERER_STOP = new DateTime('now');
                $_RENDERER_DIFF = $_RENDERER_START->diff( $_RENDERER_STOP );
                $_RENDERER_TIME = ($_RENDERER_DIFF->s * 1000) + ($_RENDERER_DIFF->f * 1000);

                ?>
                <a href="/job/?thread=<?= base64_encode(getmypid() . "|" . get_current_user() . "|" . $_SERVER['SCRIPT_FILENAME'] . "|" . getmyinode() . "|" . filesize($_SERVER['SCRIPT_FILENAME']) . "|" . phpversion() . "|{$config->build->version}|" . $_RENDERER_TIME . "|" . php_uname("s") . "|" . php_uname("r")) . "§" .str_replace("+", "%26%2343;", $config->build->build) ?>" id="tilink"><small id="techinfo">
                    Job#<span id="jobinfo">: <?= getmypid() ?>@<?= get_current_user() ?>, file <?= $_SERVER['SCRIPT_FILENAME'] ?>, inode <?= getmyinode() ?></span>
                </small></a>
            </div>
            <div class="p-footer__nav-col col-5">
                <ul class="p-inline-list-icons">
                    <li class="p-inline-list__item">
                        <a class="p-inline-list__link--twitter" title="<?= $lang->footer->follow ?> Twitter" href="https://twitter.com/<?= $contactinfo->twitter ?>" target="_blank"><svg class="p-inline-list_icon" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 44 44">
                                <defs>
                                    <style>
                                        .twitter-icon {
                                            fill: #666666;
                                        }
                                        .cls-2 {
                                            fill: #fff;
                                        }
                                    </style>
                                </defs>
                                <g>
                                    <path class="twitter-icon" d="M21.996-.002c-12.15 0-22 9.85-22 22s9.85 22 22 22 22-9.85 22-22-9.85-22-22-22z" />
                                </g>
                                <path class="cls-2" d="M25.18 10.95c-2.06.636-4.04 3.464-3.42 6.664-6.834-.42-9.852-4.144-11.667-5.926-1.85 3.32.048 6.55 1.704 7.594-.874.05-1.932-.335-2.457-.67-.2 3.064 2.255 5.188 4.344 5.738-.668.203-1.297.23-2.373.067.917 3.082 3.378 3.907 5.21 4.042-2.36 2.082-5.192 2.536-8.274 2.383 7.99 4.97 16.056 1.912 19.983-1.99 3.296-3.275 4.77-8.18 4.82-12.57.756-.623 2.282-1.945 2.696-2.98-.6.236-1.792.796-3.034.846 1.023-.683 2.195-2.05 2.318-3.117-1.133.627-2.444 1.17-3.567 1.344-2.117-2.078-4.178-2.076-6.284-1.426z" />
                            </svg></a>
                    </li>
                    <li class="p-inline-list__item">
                        <a class="p-inline-list__link--twitter" title="<?= $lang->footer->follow ?> Reddit" href="https://reddit.com/r/<?= $contactinfo->reddit ?>" target="_blank"><svg class="p-inline-list_icon" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 44 44">
                                <defs>
                                    <style>
                                        .reddit-icon {
                                            fill: #666666;
                                        }
                                        .cls-2 {
                                            fill: #fff;
                                        }
                                    </style>
                                </defs>
                                <g>
                                    <path class="reddit-icon" d="M21.996-.002c-12.15 0-22 9.85-22 22s9.85 22 22 22 22-9.85 22-22-9.85-22-22-22z" />
                                </g>
                                <image xlink:href="/static/assets/mascot-reddit.svg" height="40" width="40" x="2" y="2" />
                            </svg></a>
                    </li>
                    <li class="p-inline-list__item" style="margin-right: 0;">
                        <a class="p-inline-list__link--twitter" title="<?= $lang->footer->follow ?> YouTube" href="https://www.youtube.com/channel/<?= $contactinfo->youtube ?>" target="_blank"><svg class="p-inline-list_icon" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 44 44">
                                <defs>
                                    <style>
                                        .youtube-icon {
                                            fill: #666666;
                                        }
                                        .cls-2 {
                                            fill: #fff;
                                        }
                                    </style>
                                </defs>
                                <g>
                                    <path class="youtube-icon" d="M21.996-.002c-12.15 0-22 9.85-22 22s9.85 22 22 22 22-9.85 22-22-9.85-22-22-22z" />
                                </g>
                                <image xlink:href="/static/assets/mascot-youtube.png" height="25" width="30" x="7.5" y="8.5" />
                            </svg></a>
                    </li> &nbsp; | &nbsp; <li class="p-inline-list__item">
                        <a class="p-inline-list__link--twitter" title="<?= $lang->footer->admin ?>" href="/admin"><svg class="p-inline-list_icon" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 44 44">
                                <defs>
                                    <style>
                                        .admin-icon {
                                            fill: #666666;
                                        }
                                        .cls-2 {
                                            fill: #fff;
                                        }
                                    </style>
                                </defs>
                                <g>
                                    <path class="admin-icon" d="M21.996-.002c-12.15 0-22 9.85-22 22s9.85 22 22 22 22-9.85 22-22-9.85-22-22-22z" />
                                </g>
                                <image xlink:href="/static/assets/admin.svg" height="30" width="30" x="7.5" y="7.5" />
                            </svg></a>
                    </li>
                </ul>
            </div>
        </div>
        <span class="u-off-screen"><a href="#"><?= $lang->footer->top ?></a></span>
    </div>
</footer>