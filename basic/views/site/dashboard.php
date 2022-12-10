<?php
/** @var string[] $langs */
/** @var \app\models\PrayerTime $prayerTime */
/** @var \app\models\PrayerTime $prayerTimeTomorrow */
/** @var int $nextPrayerTimeInSeconds */
/** @var string $currentPrayerTimeName */
/** @var string $nextPrayerTimeName */
/** @var \app\models\Notification[] $notifications */
?>

<?php foreach ($langs as $lang): ?>
    <div data-lang="<?= $lang ?>">
        <?=
            $this->render('dashboard_template', [
                'lang' => $lang,
                'prayerTime' => $prayerTime,
                'prayerTimeTomorrow' => $prayerTimeTomorrow,
                'nextPrayerTimeInSeconds' => $nextPrayerTimeInSeconds,
                'currentPrayerTimeName' => $currentPrayerTimeName,
                'nextPrayerTimeName' => $nextPrayerTimeName,
                'notifications' => $notifications,
            ])
        ?>
    </div>
<?php endforeach; ?>
