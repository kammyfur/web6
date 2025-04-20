<div class="global-nav__dropdown-content u-hide" id="mprj-products" style="max-width:68rem">
    <div class="global-nav__mobile-strip">

        <!-- Navigation for mobile -->
        <div class="global-nav__row">
            <h5 class="global-nav__muted-heading global-nav__expanding-row"><?= $lang->products ?></h5>
            <ul class="global-nav__split-list">
                <?php foreach ($config->products->main as $product): ?>
                <li class="global-nav__list-item">
                    <a class="global-nav__link" href="<?= $product->link ?>" target="_blank"><?= $product->name ?></a>
                </li>
                <?php endforeach ?>
            </ul>
        </div>
        <div class="global-nav__row">

            <!-- Navigation for mobile -->
            <h5 class="global-nav__muted-heading global-nav__expanding-row"><?= $lang->productsnav->also ?></h5>
            <ul class="global-nav__split-list">
                <?php foreach ($config->products->also as $product): ?>
                <li class="global-nav__list-item">
                    <a class="global-nav__link" href="<?= $product->link ?>" target="_blank"><?= $product->name ?></a>
                </li>
                <?php endforeach ?>
            </ul>
        </div>
        <div class="global-nav__row">

            <!-- Navigation for mobile -->
            <h5 class="global-nav__muted-heading global-nav__expanding-row"><?= $lang->productsnav->resources ?></h5>
            <ul class="global-nav__split-list">
                <?php foreach ($config->products->resources as $resource): ?>
                <li class="global-nav__list-item">
                    <a class="global-nav__link" href="<?= $resource->link ?>" target="_blank"><?= $resource->name->$_LANGUAGE ?></a>
                </li>
                <?php endforeach ?>
            </ul>
        </div>
        <div class="global-nav__row">

            <!-- Navigation for mobile -->
            <h5 class="global-nav__muted-heading global-nav__expanding-row"><?= $lang->productsnav->about ?></h5>
            <ul class="global-nav__split-list u-no-margin--bottom">
                <?php foreach ($config->products->about as $resource): ?>
                <li class="global-nav__list-item">
                    <a class="global-nav__link" href="<?= $resource->link ?>" target="_blank"><?= $resource->name->$_LANGUAGE ?></a>
                </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <div class="global-nav__strip u-hide--mobile">

        <!-- Navigation for desktop -->
        <div class="global-nav__row is-bordered">
            <ul class="global-nav__matrix">
                <?php foreach ($config->products->main as $product): ?>
                <li class="global-nav__matrix-item">
                    <a class="global-nav__link" href="<?= $product->link ?>" target="_blank">
                        <img class="global-nav__matrix-image" src="<?= $product->logo ?>" width="32" height="32" alt="icon">
                        <h4 class="global-nav__matrix-title"><?= $product->name ?>&nbsp;&rsaquo;</h4>
                    </a>
                    <div class="global-nav__matrix-content">
                        <p class="global-nav__matrix-desc"><?= $product->description->$_LANGUAGE ?></p>
                        <ul class="global-nav__inline-list">
                            <?php foreach ($product->links as $link): ?>
                            <li class="global-nav__list-item">
                                <a class="global-nav__link" href="<?= $link->link ?>" target="_blank">
                                    <?= $link->name->$_LANGUAGE ?>&nbsp;&rsaquo;
                                </a>
                            </li>
                            <?php endforeach; ?>
                        <ul>
                    </div>
                </li>
                <?php endforeach; ?>
            <ul>
        </div>
    </div>
    <div class="global-nav__strip u-hide--mobile">
        <div class="global-nav__row">
            <div class="global-nav__flex-container">
                <div class="global-nav__others-col">
                    <h5 class="global-nav__muted-heading"><?= $lang->productsnav->also ?></h5>
                    <div class="global-nav__matrix">
                        <?php foreach ($config->products->also as $product): ?>
                        <li class="global-nav__matrix-item">
                            <div class="global-nav__matrix-content">
                                <h4 class="global-nav__matrix-title"><a class="global-nav__link" href="<?= $product->link ?>"><?= $product->name ?>&nbsp;›</a></h4>
                                <p class="global-nav__matrix-desc u-no-margin--left"><?= $product->description->$_LANGUAGE ?></p>
                            </div>
                        </li>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="global-nav__resources-col">
                    <h5 class="global-nav__muted-heading"><?= $lang->productsnav->resources ?></h5>
                    <ul class="global-nav__split-list">
                        <?php foreach ($config->products->resources as $resource): ?>
                        <li class="global-nav__list-item">
                            <a class="global-nav__link" href="<?= $resource->link ?>"><?= $resource->name->$_LANGUAGE ?></a>
                        </li>
                        <?php endforeach ?>
                    </ul>
                    <h5 class="global-nav__muted-heading"><?= $lang->productsnav->about ?></h5>
                    <ul class="global-nav__split-list">
                        <?php foreach ($config->products->about as $resource): ?>
                        <li class="global-nav__list-item">
                            <a class="global-nav__link" href="<?= $resource->link ?>"><?= $resource->name->$_LANGUAGE ?></a>
                        </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
