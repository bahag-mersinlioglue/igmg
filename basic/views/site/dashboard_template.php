<?php
/** @var string $lang */
/** @var \app\models\PrayerTime $prayerTime */
/** @var \app\models\Hadis $hadis */
/** @var \app\models\PrayerTime $prayerTimeTomorrow */
/** @var int $nextPrayerTimeInSeconds */
/** @var string $currentPrayerTimeName */
/** @var string $nextPrayerTimeName */
/** @var \app\models\Notification[] $notifications */
?>

<?php
$trans = [
    'tr' => [
        'datum' => 'Tarih',
        'fajr-next' => 'Imsak',
        'fajr' => 'Imsak',
        'sunrise' => 'Günes',
        'dhuhr' => 'Ögle',
        'asr' => 'Ikindi',
        'maghrib' => 'Aksam',
        'ishaa' => 'Yatsi',
    ],
    'de' => [
        'datum' => 'Datum',
        'fajr-next' => 'Imsak (De)',
        'fajr' => 'Imsak (De)',
        'sunrise' => 'Aufgang',
        'dhuhr' => 'Mittag',
        'asr' => 'Nachmittag',
        'maghrib' => 'Abend',
        'ishaa' => 'Nacht',
    ],
    'ar' => [
        'datum' => 'Date',
        'fajr-next' => 'Fajr',
        'fajr' => 'Fajr',
        'sunrise' => 'Sunrise',
        'dhuhr' => 'Dhuhr',
        'asr' => 'Asr',
        'maghrib' => 'Maghrib',
        'ishaa' => 'Ishaa',
    ]
];
?>

    <div class="row">
        <div class="col">
            <p>Jetzt: <b> <?= $trans[$lang][$currentPrayerTimeName] ?></b></p>
            <p>Nächtes: <b><?= $trans[$lang][$nextPrayerTimeName] ?></b></p>

            Kalan süre:
            <div style="font-size: 36px;">
            <span id="countdown" data-nexttime="<?= $nextPrayerTimeInSeconds ?>">
                <span class="countdown-hours"></span>
                <span class="">:</span>
                <span class="countdown-minutes"></span>
                <span class="">:</span>
                <span class="countdown-seconds"></span>
            </span>
            </div>

            <object id="clockWidget<?= $lang ?>" role="svidget" data="scripts/clock.svg" type="image/svg+xml"
                    width="200"
                    height="200">
                <param name="data" value=""/>
                <param name="backgroundColor" value="#fff"/>
                <param name="frameColor" value="#000"/>
                <param name="tickColor" value="#000"/>
                <param name="hourHandColor" value="#000"/>
                <param name="minuteHandColor" value="#000"/>
                <param name="secondHandColor" value="#f22"/>
                <param name="nobColor" value="#777"/>
                <param name="tickLineType" value="round"/>
                <param name="handLineType" value="round"/>
                <param name="frameWidth" value="20"/>
                <param name="labelStyle" value="{}"/>
                <param name="animationType" value="smooth"/>
                <param name="showLabels" value="true"/>
                <param name="showAnimation" value="true"/>
            </object>

        </div>
        <div class="col">
            <div class="row">
                <div class="col-2">
                    <?= $trans[$lang]['fajr'] ?>
                </div>
                <div class="col">
                    <?= Yii::$app->formatter->asDate($prayerTime->date) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <?= $trans[$lang]['fajr'] ?>
                </div>
                <div class="col">
                    <?= Yii::$app->formatter->asTime($prayerTime->fajr, 'short') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <?= $trans[$lang]['sunrise'] ?>
                </div>
                <div class="col">
                    <?= Yii::$app->formatter->asTime($prayerTime->sunrise, 'short') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <?= $trans[$lang]['dhuhr'] ?>
                </div>
                <div class="col">
                    <?= Yii::$app->formatter->asTime($prayerTime->dhuhr, 'short') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <?= $trans[$lang]['asr'] ?>
                </div>
                <div class="col">
                    <?= Yii::$app->formatter->asTime($prayerTime->asr, 'short') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <?= $trans[$lang]['maghrib'] ?>
                </div>
                <div class="col">
                    <?= Yii::$app->formatter->asTime($prayerTime->maghrib, 'short') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <?= $trans[$lang]['ishaa'] ?>
                </div>
                <div class="col">
                    <?= Yii::$app->formatter->asTime($prayerTime->ishaa, 'short') ?>
                </div>
            </div>

        </div>
    </div>

    <hr>
    <h3>Bildirimler</h3>
<?php foreach ($notifications as $notification): ?>
    <div class="row">
        <div class="col">
            <?= $notification->getAttribute("title_$lang") ?>
            <?= $notification->getAttribute("content_$lang") ?>
        </div>
    </div>
<?php endforeach; ?>

<?php if ($hadis): ?>
    <hr>
    <h3>Günün Hadisi</h3>
    <p>
        <?= $hadis->getAttribute("text_$lang") ?>
    </p>
<?php endif; ?>