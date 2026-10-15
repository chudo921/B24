
<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Currency\CurrencyManager;
use Bitrix\Currency\CurrencyTable;
use Bitrix\Main\Context;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class OtusCurrencyRateComponent extends \CBitrixComponent
{
    /**
     * Подготавливает входные параметры компонента.
     *
     * @param array $arParams Параметры компонента.
     *
     * @return array
     */
    public function onPrepareComponentParams($arParams): array
    {
        $currency = strtoupper(trim((string)($arParams['CURRENCY'] ?? 'RUB')));

        $arParams['CURRENCY'] = $currency !== '' ? $currency : 'RUB';

        return $arParams;
    }

    /**
     * Получает список валют и курс выбранной валюты.
     *
     * @return void
     */
    public function executeComponent(): void
    {
        $currency = $this->arParams['CURRENCY'];

        $this->arResult = [
            'CURRENCY' => $currency,
            'CURRENCIES' => [],
            'BASE_CURRENCY' => '',
            'RATE' => null,
            'ERROR' => '',
        ];

        if (!Loader::includeModule('currency')) {
            $this->arResult['ERROR'] =
                Loc::getMessage('OTUS_CURRENCY_RATE_MODULE_ERROR');
        } else {
            $currencies = CurrencyTable::getList([
                'select' => ['CURRENCY'],
                'order' => ['SORT' => 'ASC'],
            ]);

            while ($row = $currencies->fetch()) {
                $code = (string)$row['CURRENCY'];

                $this->arResult['CURRENCIES'][$code] = $code;
            }

            $request = Context::getCurrent()->getRequest();
            $requestedCurrency = $request->getQuery('otus_currency');

            if (is_string($requestedCurrency)) {
                $requestedCurrency = strtoupper(trim($requestedCurrency));

                if (isset($this->arResult['CURRENCIES'][$requestedCurrency])) {
                    $currency = $requestedCurrency;
                }
            }

            $this->arResult['CURRENCY'] = $currency;

            if (!CurrencyManager::isCurrencyExist($currency)) {
                $this->arResult['ERROR'] =
                    Loc::getMessage('OTUS_CURRENCY_RATE_UNKNOWN_CURRENCY');
            } else {
                $baseCurrency = CurrencyManager::getBaseCurrency();

                $rate = \CCurrencyRates::GetConvertFactorEx(
                    $currency,
                    $baseCurrency
                );

                $this->arResult['BASE_CURRENCY'] = $baseCurrency;

                if ($rate > 0) {
                    $this->arResult['RATE'] = $rate;
                } else {
                    $this->arResult['ERROR'] =
                        Loc::getMessage('OTUS_CURRENCY_RATE_NO_RATE');
                }
            }
        }

        $this->includeComponentTemplate();
    }
}
