<?php
/** @var string[] $langs */
/** @var \app\models\PrayerTime $prayerTime */
/** @var \app\models\Hadis $hadis */
/** @var \app\models\PrayerTime $prayerTimeTomorrow */
/** @var int $nextPrayerTimeInSeconds */
/** @var string $currentPrayerTimeName */
/** @var string $nextPrayerTimeName */
/** @var \app\models\Notification[] $notifications */

$this->registerCssFile("@web/revealjs/reveal.css");
$this->registerCssFile("@web/revealjs/reveal.css");
$this->registerJsFile("@web/revealjs/reveal.js", ['depends' => [\yii\web\JqueryAsset::class]]);
$this->registerJsFile("@web/main.js", ['depends' => [\yii\web\JqueryAsset::class]]);

?>

<div class="reveal">
    <div id="slidecontainer" class="slides">
        <section data-background-color="aquamarine">
            <div class="dashboard-wrapper" data-page-id="0">
                <?php foreach ($langs as $key => $lang): ?>
                    <div data-lang="<?= $lang ?>" class="<?= $key == 0 ? 'active' : '' ?>">
                        <?=
                        $this->render('dashboard_template', [
                            'lang' => $lang,
                            'prayerTime' => $prayerTime,
                            'hadis' => $hadis,
                            'prayerTimeTomorrow' => $prayerTimeTomorrow,
                            'nextPrayerTimeInSeconds' => $nextPrayerTimeInSeconds,
                            'currentPrayerTimeName' => $currentPrayerTimeName,
                            'nextPrayerTimeName' => $nextPrayerTimeName,
                            'notifications' => $notifications,
                        ])
                        ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <?php foreach ($notifications as $notification): ?>
            <section data-background-color="aquamarine">
                <p>
                    <?= $notification->getAttribute("title_de") ?>
                </p>
                <p>
                    <?= $notification->getAttribute("content_de") ?>
                </p>
            </section>
            <section data-background-color="aquamarine">
                <p><?= $notification->getAttribute("title_tr") ?></p>
                <p><?= $notification->getAttribute("content_tr") ?></p>
            </section>
            <section data-background-color="aquamarine">
                <p>
                    <?= $notification->getAttribute("title_ar") ?>
                </p>
                <p>
                    <?= $notification->getAttribute("content_ar") ?>
                </p>
            </section>
        <?php endforeach; ?>

    </div>
</div>



