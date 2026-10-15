<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>

<div class="otus-currency-rate">
    <h2><?= htmlspecialcharsbx(Loc::getMessage('OTUS_CURRENCY_RATE_TITLE')) ?></h2>

    <?php if (!empty($arResult['CURRENCIES'])): ?>
        <form method="get">
            <label for="otus-currency">
                <?= htmlspecialcharsbx(Loc::getMessage('OTUS_CURRENCY_RATE_SELECT')) ?>
            </label>

            <select id="otus-currency" name="otus_currency">
                <?php foreach ($arResult['CURRENCIES'] as $code): ?>
                    <option
                        value="<?= htmlspecialcharsbx($code) ?>"
                        <?= $code === $arResult['CURRENCY'] ? 'selected' : '' ?>
                    >
                        <?= htmlspecialcharsbx($code) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit">
                <?= htmlspecialcharsbx(Loc::getMessage('OTUS_CURRENCY_RATE_SUBMIT')) ?>
            </button>
        </form>
    <?php endif; ?>

    <?php if ($arResult['ERROR'] !== ''): ?>
        <p><?= htmlspecialcharsbx($arResult['ERROR']) ?></p>
    <?php else: ?>
        <p>
            1 <?= htmlspecialcharsbx($arResult['CURRENCY']) ?>
            =
            <?= number_format((float)$arResult['RATE'], 4, ',', ' ') ?>
            <?= htmlspecialcharsbx($arResult['BASE_CURRENCY']) ?>
        </p>
    <?php endif; ?>
</div>
