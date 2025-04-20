<template id="takeovers" class="u-hide">
    <?php foreach ($config->takeover->takeover_js as $takeover): ?>
        <section class="p-takeover--<?= $takeover->dark ? "dark" : "grad" ?> js-takeover">
        <div class="row u-equal-height">
            <div class="col-7 u-vertically-center">
                <div>
                    <h1>
                        <?= $takeover->title->$_LANGUAGE ?>
                    </h1>
                    <h4>
                        <?= $takeover->tagline->$_LANGUAGE ?>
                    </h4>
                    <div class="u-hide--small">
                        <p>
                            <a href="<?= $takeover->link ?>" class="p-button--positive u-no-margin--bottom"><?= $takeover->button->$_LANGUAGE ?>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-5 u-vertically-center u-align--center u-align--left-medium">
                <img src="<?= $takeover->image ?>" alt="" style="width: 250px;">
            </div>
            <div class="u-hide--medium u-hide--large">
                <p>
                    <a href="<?= $takeover->link ?>" class="p-button--positive"><?= $takeover->button->$_LANGUAGE ?></a>
                </p>
            </div>
        </div>
    </section>
    <?php endforeach ?>
    <!--<section class="p-takeover--dark js-takeover">
        <div class="row u-equal-height">
            <div class="col-7 u-vertically-center">
                <div>
                    <h1>
                        Hosted private cloud infrastructure: a cost analysis
                    </h1>
                    <h4>
                        Accelerate initial deployment and reduce operational costs by outsourcing private cloud infrastructure management
                    </h4>
                    <div class="u-hide--small">
                        <p>
                            <a href="/engage/private-cloud-cost-analysis-webinar?utm_source=Takeover&amp;utm_medium=Takeover&amp;utm_campaign=CY20_DC_OpenStack_WBN_CloudCostAnalysis" class="p-button--positive u-no-margin--bottom">Watch the webinar
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-5  u-vertically-center u-align--center u-align--left-medium">
                <img src="https://assets.ubuntu.com/v1/a1fce041-Private+Cloud+-+white.svg" alt="" style="width: 250px;">
            </div>
            <div class="u-hide--medium u-hide--large">
                <p>
                    <a href="/engage/private-cloud-cost-analysis-webinar?utm_source=Takeover&amp;utm_medium=Takeover&amp;utm_campaign=CY20_DC_OpenStack_WBN_CloudCostAnalysis" class="p-button--positive">Watch the webinar
                    </a>
                </p>
            </div>
        </div>
    </section>
    <section class="p-takeover--grad js-takeover">
        <div class="row u-equal-height">
            <div class="col-6 u-vertically-center">
                <div>
                    <h1>
                        Kubernetes for IoT developers
                    </h1>
                    <h4>
                        Security, flexibility and automation - implementing Kubernetes at the edge.
                    </h4>
                    <div class="u-hide--small">
                        <p>
                            <a href="/engage/microk8s-451research?utm_source=Takeover&amp;utm_medium=Takeover&amp;utm_campaign=3)CY20_DC_Kubernetes_Whitepaper_MicroK8s_451Research" class="p-button--positive u-no-margin--bottom">Download the report by 451 Research
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6 u-hide--small u-vertically-center u-align--center u-align--left-medium">
                <img src="https://res.cloudinary.com/canonical/image/fetch/f_auto,q_auto,fl_sanitize,w_311,h_116/https://assets.ubuntu.com/v1/5096c143-451-research-vector-white-logo.svg" srcset="https://res.cloudinary.com/canonical/image/fetch/f_auto,q_auto,fl_sanitize,w_622,h_232/https://assets.ubuntu.com/v1/5096c143-451-research-vector-white-logo.svg 2x" alt="" width="311" height="116" loading="auto" style="" />
            </div>
            <div class="u-hide--medium u-hide--large">
                <p>
                    <a href="/engage/microk8s-451research?utm_source=Takeover&amp;utm_medium=Takeover&amp;utm_campaign=3)CY20_DC_Kubernetes_Whitepaper_MicroK8s_451Research" class="p-button--positive">Download the report by 451 Research
                    </a>
                </p>
            </div>
        </div>
    </section>
    <section class="p-takeover--grad js-takeover">
        <div class="row u-equal-height">
            <div class="col-6 u-vertically-center">
                <div>
                    <h1>
                        Accelerating IoT device time to market
                    </h1>
                    <h4>
                        Challenges and solutions for IoT execution
                    </h4>
                    <div class="u-hide--small">
                        <p>
                            <a href="/engage/smart-start-webinar?utm_source=Takeover&amp;utm_medium=Takeover&amp;utm_campaign=CY20_IOT_SmartStart_WBN_Timetomarket" class="p-button--positive u-no-margin--bottom">Watch the webinar
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6 u-hide--small u-vertically-center u-align--center u-align--left-medium">
                <img src="https://res.cloudinary.com/canonical/image/fetch/f_auto,q_auto,fl_sanitize,w_350,h_350/https://assets.ubuntu.com/v1/049b4cc6-ubuntu+core+18+circular+white.svg" srcset="https://res.cloudinary.com/canonical/image/fetch/f_auto,q_auto,fl_sanitize,w_700,h_700/https://assets.ubuntu.com/v1/049b4cc6-ubuntu+core+18+circular+white.svg 2x" alt="" width="350" height="350" loading="auto" style="" />
            </div>
            <div class="u-hide--medium u-hide--large">
                <p>
                    <a href="/engage/smart-start-webinar?utm_source=Takeover&amp;utm_medium=Takeover&amp;utm_campaign=CY20_IOT_SmartStart_WBN_Timetomarket" class="p-button--positive">Watch the webinar
                    </a>
                </p>
            </div>
        </div>
    </section>
    <section class="p-takeover--grad js-takeover">
        <div class="row u-equal-height">
            <div class="col-7 u-vertically-center">
                <div>
                    <h1>
                        An introduction to<br class='u-hide--small' /> Anbox Cloud
                    </h1>
                    <h4>
                        Scalable Android&trade; in the cloud
                    </h4>
                    <div class="u-hide--small">
                        <p>
                            <a href="/engage/anbox-cloud-webinar?utm_source=Takeover&amp;utm_medium=Takeover&amp;utm_campaign=CY20_DC_AnboxCloud_WBN_IntrotoAnboxCloud" class="p-button--positive u-no-margin--bottom">Watch the webinar
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-5 u-hide--small u-vertically-center u-align--center u-align--left-medium">
                <img src="https://res.cloudinary.com/canonical/image/fetch/f_auto,q_auto,fl_sanitize,w_338,h_246/https://assets.ubuntu.com/v1/7e3bd1ed-Anbox-Cloud+computing_outline.svg" srcset="https://res.cloudinary.com/canonical/image/fetch/f_auto,q_auto,fl_sanitize,w_676,h_492/https://assets.ubuntu.com/v1/7e3bd1ed-Anbox-Cloud+computing_outline.svg 2x" alt="" width="338" height="246" loading="auto" style="" />
            </div>
            <div class="u-hide--medium u-hide--large">
                <p>
                    <a href="/engage/anbox-cloud-webinar?utm_source=Takeover&amp;utm_medium=Takeover&amp;utm_campaign=CY20_DC_AnboxCloud_WBN_IntrotoAnboxCloud" class="p-button--positive">Watch the webinar
                    </a>
                </p>
            </div>
        </div>
    </section>-->
</template>

<!-- Default Takeover: Intro -->
<section data-lang="all" id="takeover" class="p-strip--image is-dark is-deep" style="background-color: <?= $config->takeover->default->colors[0] ?>; background-image: linear-gradient(110deg, <?= $config->takeover->default->colors[0] ?> 20%, <?= $config->takeover->default->colors[1] ?> 46%, <?= $config->takeover->default->colors[2] ?> 60%);">
    <div class="row">
        <div class="col-8">
            <h1 style="font-weight: 100;"><?= $config->takeover->default->title->$_LANGUAGE ?></h1>
            <p><?= $config->takeover->default->tagline->$_LANGUAGE ?></p>
            <p class="u-no-margin--bottom"><a href="<?= $config->takeover->default->link ?>" class="p-button--neutral u-no-margin--bottom"><?= $config->takeover->default->button->$_LANGUAGE ?></a></p>
        </div>
    </div>
</section>