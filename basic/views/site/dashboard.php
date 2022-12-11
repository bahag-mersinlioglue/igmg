<?php
/** @var string[] $langs */
/** @var \app\models\PrayerTime $prayerTime */
/** @var \app\models\Hadis $hadis */
/** @var \app\models\PrayerTime $prayerTimeTomorrow */
/** @var int $nextPrayerTimeInSeconds */
/** @var string $currentPrayerTimeName */
/** @var string $nextPrayerTimeName */
/** @var \app\models\Notification[] $notifications */
?>

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
