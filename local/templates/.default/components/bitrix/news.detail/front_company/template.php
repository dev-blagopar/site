<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
<?php $this->setFrameMode(true); ?>
<?php use \Bitrix\Main\Localization\Loc; ?>

<?php
if ($arResult['BENEFITS']) {
    $templateData['BENEFITS'] = $arResult['DISPLAY_PROPERTIES']['LINK_BENEFIT']['VALUE'];
}
?>

<div class="content_wrapper_block <?= $templateName; ?>">
    <div class="maxwidth-theme <?= $arParams['TYPE_BLOCK'] == 'type2' ? '' : 'wide' ?> ">
        <?php // preview image
        $bShowImage = in_array('PREVIEW_PICTURE', $arParams['FIELD_CODE']);
        $bShowUrl = (isset($arResult['DISPLAY_PROPERTIES']['URL']) && strlen($arResult['DISPLAY_PROPERTIES']['URL']['VALUE']));

        if ($bShowImage) {
            $bImage = strlen($arResult['FIELDS']['PREVIEW_PICTURE']['SRC']);
            $arImage = ($bImage ? CFile::ResizeImageGet($arResult['FIELDS']['PREVIEW_PICTURE']['ID'], array('width' => 1000, 'height' => 1000), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true) : array());
            $imageSrc = ($bImage ? $arImage['src'] : '');
        }

        $bNoImg = ($arParams['TYPE_IMG'] == 'sm no-img' && $arParams['TYPE_BLOCK'] == 'type2');

        $lightText = $arResult['BG_IMG'] && $arResult['PROPERTIES']['LIGHT_TEXT']['VALUE'] === 'Y';

        $videoSource = strlen($arResult['PROPERTIES']['VIDEO_SOURCE']['VALUE_XML_ID']) ? $arResult['PROPERTIES']['VIDEO_SOURCE']['VALUE_XML_ID'] : 'LINK';
        $videoSrc = $arResult['PROPERTIES']['VIDEO_SRC']['VALUE'];
        if ($videoFileID = $arResult['PROPERTIES']['VIDEO']['VALUE'])
            $videoFileSrc = CFile::GetPath($videoFileID);

        $videoPlayer = $videoPlayerSrc = '';
        ?>

        <div class="item-views company lazy <?= $lightText ? 'company_light_text' : ''; ?> <?= $arParams['TYPE_IMG']; ?> <?= $arParams['TYPE_BLOCK']; ?><?= ($arParams['TYPE_IMG'] == 'lg' ? ' ' : ' with-padding'); ?>"
             <?php if ($arResult['BG_IMG']): ?>data-src="<?= $arResult['BG_IMG']; ?>"
             style="background-image:url(<?= \Aspro\Functions\CAsproMax::showBlankImg($arResult['BG_IMG']); ?>)"<?php endif; ?>>
            <div class="company-block">
                <div class="row flexbox<?= ($arParams['TYPE_BLOCK'] == 'type2' ? ($arParams['REVERCE_IMG_BLOCK'] == 'Y' ? '' : ' flex-direction-row-reverse') : ($arParams['REVERCE_IMG_BLOCK'] == 'Y' ? ' flex-direction-row-reverse' : '')) ?>">
                    <div class="col-md-<?= ($arParams['TYPE_BLOCK'] == 'type2' ? ($arParams['TYPE_IMG'] == 'md' ? 8 : 9) : 6); ?> text-block col-xs-12">
                        <div class="item">
                            <div class="item-inner">
                                <div class="text">
                                    <?php ob_start(); ?>
                                    <?php if ($bShowUrl): ?>
                                    <a class="show_all muted font_upper"
                                       href="<?= $arResult['DISPLAY_PROPERTIES']['URL']['VALUE']; ?>">
                                        <?php else: ?>
                                        <span class="muted font_upper">
										<?php endif; ?>

                                            <?php if (in_array('NAME', $arParams['FIELD_CODE']) && $arResult['FIELDS']['NAME']): ?>
                                                <span><?= $arResult['FIELDS']['NAME'] ?></span>
                                            <?php endif; ?>

                                            <?php if ($bShowUrl): ?>
                                    </a>
                                <?php else: ?>
                                    </span>
                                <?php endif; ?>
                                    <?php $text = ob_get_contents();
                                    ob_end_clean(); ?>

                                    <?php if (!$bNoImg): ?>
                                        <?= $text; ?>
                                    <?php endif; ?>

                                    <?php if ($arParams['REGION'] && $arParams['~REGION']['DETAIL_TEXT']): ?>
                                        <?= $arParams['~REGION']['DETAIL_TEXT']; ?>
                                    <?php else: ?>
                                        <?php if (isset($arResult['DISPLAY_PROPERTIES']['COMPANY_NAME']) && $arResult['DISPLAY_PROPERTIES']['COMPANY_NAME']['VALUE']): ?>
                                            <h3><?= $arResult['DISPLAY_PROPERTIES']['COMPANY_NAME']['VALUE']; ?></h3>
                                        <?php endif; ?>
                                        <?php if ($arResult['PREVIEW_TEXT']): ?>
                                            <div class="preview-text muted777"><?= $arResult['PREVIEW_TEXT']; ?></div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php ob_start(); ?>
                                    <div class="buttons">
                                        <?php if (isset($arResult['DISPLAY_PROPERTIES']['URL']) && strlen($arResult['DISPLAY_PROPERTIES']['URL']['VALUE'])): ?>
                                            <a class="btn <?= (!$bNoImg ? 'btn-default' : 'btn-transparent-border-color'); ?>"
                                               href="<?= str_replace('//', '/', SITE_DIR . '/' . $arResult['DISPLAY_PROPERTIES']['URL']['VALUE']); ?>"><span><?= (strlen($arResult['PROPERTIES']['MORE_BUTTON_TITLE']['VALUE']) ? $arResult['PROPERTIES']['MORE_BUTTON_TITLE']['VALUE'] : Loc::getMessage('S_TO_SHOW_ALL_MORE')) ?></span></a>
                                        <?php endif; ?>
                                    </div>
                                    <?php $button = ob_get_contents();
                                    ob_end_clean(); ?>

                                    <?php if ($bNoImg): ?>
                                        <?= $button; ?>
                                    <?php endif; ?>

                                    <div class="js-tizers"></div>


                                    <?php if (!$bNoImg): ?>
                                        <?= $button; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-<?= ($arParams['TYPE_BLOCK'] == 'type2' ? ($arParams['TYPE_IMG'] == 'md' ? 4 : 3) : 6); ?> image-block col-xs-12">
                        <div class="item video-block">
                            <?php if ($bNoImg): ?>
                                <div class="with-text-block-wrapper">
                                    <?= $text; ?>
                                    <div class="js-h3"></div>
                                    <?= $button; ?>
                                </div>
                            <?php elseif ($bImage): ?>
                                <?php if ($videoSrc): ?>
                                    <a href="<?= $videoSrc ?>" target="_blank">
                                        <div class="image lazy<?= ($arParams['TYPE_BLOCK'] == 'type2' ? ' rounded' : ''); ?>"
                                             data-src="<?= $imageSrc; ?>"
                                             style="background-image:url(<?= \Aspro\Functions\CAsproMax::showBlankImg($imageSrc); ?>)">
                                            <div class="play"></div>
                                        </div>
                                    </a>
                                <?php else: ?>
                                    <div class="image lazy<?= ($arParams['TYPE_BLOCK'] == 'type2' ? ' rounded' : ''); ?>"
                                         data-src="<?= $imageSrc; ?>"
                                         style="background-image:url(<?= \Aspro\Functions\CAsproMax::showBlankImg($imageSrc); ?>)">
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>