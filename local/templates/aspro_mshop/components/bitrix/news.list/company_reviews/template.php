<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="reviews">
    <div class="reviews__head">
        <? if (CUser::IsAuthorized()): ?>
            <button class="reviews__add-review-btn button medium" type="button">Оставить отзыв</button>
            <div class="reviews__head-message">
                Перед отправкой отзыва убедитесь, что он не содержит оскорблений и ссылок на сторонние ресурсы.<br>
                Для удаления отзыва, необходимо написать на электронную почту: 89035259888@blagopar.ru
            </div>
        <? else: ?>
            <div class="reviews__message-for-guest">
                Для того, чтобы оставить отзыв о работе нашей компании, пожалуйста, <a href="/auth/">авторизуйтесь</a>
            </div>
        <? endif; ?>
    </div>
    <? if ($arResult['ITEMS']): ?>
        <div class="reviews__list">

            <? foreach ($arResult['ITEMS'] as $item): ?>
                <div class="review reviews__item">
                    <div class="review__name"><?= $item['PROPERTIES']['PROP_NAME']['VALUE'] ?></div>
                    <? if (!empty($item['PROPERTIES']['PROP_PROJECT']['VALUE'])): ?>
                        <div class="review__project">Проект: <?= $item['PROPERTIES']['PROP_PROJECT']['VALUE'] ?></div>
                    <? endif; ?>
                    <? if (!empty($item['PROPERTIES']['PROP_MESSAGE']['VALUE'])): ?>
                        <div class="review__message"><?= $item['PROPERTIES']['PROP_MESSAGE']['VALUE']['TEXT'] ?></div>
                    <? endif; ?>
                    <? if (isset($item['DISPLAY_PROPERTIES']['PROP_PHOTOS']) or isset($item['DISPLAY_PROPERTIES']['PROP_VIDEO'])): ?>
                        <div class="review__gallery">

                            <? if (isset($item['DISPLAY_PROPERTIES']['PROP_VIDEO'])): ?>
                                <div class="review__gallery-item">
                                    <? $APPLICATION->IncludeComponent(
                                        "bitrix:player",
                                        "",
                                        array(
                                            "ADVANCED_MODE_SETTINGS" => "N",
                                            "AUTOSTART" => "N",
                                            "AUTOSTART_ON_SCROLL" => "N",
                                            "HEIGHT" => "",
                                            "MUTE" => "N",
                                            "PATH" => $item['DISPLAY_PROPERTIES']['PROP_VIDEO']['FILE_VALUE']['SRC'],
                                            "PLAYBACK_RATE" => "1",
                                            "PLAYER_ID" => "",
                                            "PLAYER_TYPE" => "auto",
                                            "PRELOAD" => "N",
                                            "REPEAT" => "none",
                                            "SHOW_CONTROLS" => "Y",
                                            "SIZE_TYPE" => "fluid",
                                            "SKIN" => "",
                                            "SKIN_PATH" => "/bitrix/js/fileman/player/videojs/skins",
                                            "START_TIME" => "0",
                                            "VOLUME" => "90",
                                            "WIDTH" => ""
                                        )
                                    ); ?>
                                </div>
                            <? endif; ?>

                            <? if (isset($item['DISPLAY_PROPERTIES']['PROP_PHOTOS'])): ?>
                                <? if (count($item['DISPLAY_PROPERTIES']['PROP_PHOTOS']['VALUE']) === 1): ?>
                                    <a class="review__gallery-item" rel="review-gallery-<?= $item['ID']; ?>" href="<?= $item['DISPLAY_PROPERTIES']['PROP_PHOTOS']['FILE_VALUE']['SRC']; ?>">
                                        <img src="<?= $item['DISPLAY_PROPERTIES']['PROP_PHOTOS']['FILE_VALUE']['SRC']; ?>" alt="Фото">
                                    </a>
                                <? else: ?>
                                    <? foreach ($item['DISPLAY_PROPERTIES']['PROP_PHOTOS']['FILE_VALUE'] as $file): ?>
                                        <a class="review__gallery-item" rel="review-gallery-<?= $item['ID']; ?>" href="<?= $file['SRC']; ?>">
                                            <img src="<?= $file['SRC']; ?>" alt="Фото">
                                        </a>
                                    <? endforeach; ?>
                                <? endif; ?>
                            <? endif; ?>

                        </div>
                    <? endif; ?>
                </div>
            <? endforeach; ?>

        </div>
    <? else: ?>
        <div class="reviews__empty">Отзывов не найдено</div>
    <? endif; ?>

</div>

<div class="new_review_frame new-review-popup popup">
    <div class="popup-intro">
        <div class="pop-up-title">Оставить отзыв</div>
    </div>
    <a class="jqmClose close"><i></i></a>
    <div class="form-wr">
        <form class="new-review-form" method="post" action="/company/reviews/new_review.php" enctype="multipart/form-data">

            <div class="form-control bg">
                <label class="description">
                    Имя <span class="star">*</span>
                </label>
                <input type="text" name="name" value="">
            </div>

            <div class="form-control bg">
                <label class="description">E-mail</label>
                <input type="text" name="email" value="">
            </div>

            <div class="form-control bg">
                <label class="description">Текст отзыва</label>
                <textarea name="message" class="review-body-group"></textarea>
            </div>

            <div class="form-control bg">
                <label class="description">Фотографии</label>
                <input type="file" name="photos[]" multiple class="review-body-group">
            </div>

            <div class="form-control bg">
                <label class="description">Файл с видео-отзывом</label>
                <input type="file" name="video" class="review-body-group">
            </div>

            <? if (COption::GetOptionString("aspro.mshop", "SHOW_LICENCE", "N") == "Y"): ?>
                <div class="form-control bg">
                    <div class="licence_block filter label_block">
                        <input type="checkbox" id="licenses_popup_new_review" <?= (COption::GetOptionString("aspro.mshop", "LICENCE_CHECKED", "N") == "Y" ? "checked" : ""); ?> name="license" value="Y">
                        <label for="licenses_popup_new_review">
                            <? $APPLICATION->IncludeFile(SITE_DIR . "include/licenses_text.php", array(), array("MODE" => "html", "NAME" => "LICENSES")); ?>
                        </label>
                    </div>
                </div>
            <? endif; ?>

            <div class="form-control bg new-review-form__errors"></div>

            <div class="but-r clearfix">
                <button class="button short" type="submit" value="<?= GetMessage('SUBMIT_BUTTON_TEXT') ?>">
                    <span><?= GetMessage("SUBMIT_BUTTON_TEXT") ?></span>
                </button>
            </div>

        </form>

        <div class="new-review-popup__result"></div>
    </div>
</div>
