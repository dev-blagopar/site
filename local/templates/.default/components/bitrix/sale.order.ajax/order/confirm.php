<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 * @var $APPLICATION CMain
 */

if ($arParams["SET_TITLE"] == "Y")
{
	$APPLICATION->SetTitle(Loc::getMessage("SOA_ORDER_COMPLETE"));
}
?>

<? if (!empty($arResult["ORDER"])): ?>

	<table class="sale_order_full_table">
		<tr>
			<td>
				<?=Loc::getMessage("SOA_ORDER_SUC", array(
					"#ORDER_DATE#" => $arResult["ORDER"]["DATE_INSERT"],
					"#ORDER_ID#" => $arResult["ORDER"]["ACCOUNT_NUMBER"]
				))?>
				<? if (!empty($arResult['ORDER']["PAYMENT_ID"])): ?>
					<?=Loc::getMessage("SOA_PAYMENT_SUC", array(
						"#PAYMENT_ID#" => $arResult['PAYMENT'][$arResult['ORDER']["PAYMENT_ID"]]['ACCOUNT_NUMBER']
					))?>
				<? endif ?>
				<br /><br /><strong>Наши менеджеры свяжутся с вами в ближайшее рабочее время, для подтверждения заказа и уточнения времени доставки</strong>
				<br /><br />
				<?=Loc::getMessage("SOA_ORDER_SUC1", array("#LINK#" => $arParams["PATH_TO_PERSONAL"]))?>

			</td>
		</tr>
	</table>

	<?
	if ($arResult["ORDER"]["IS_ALLOW_PAY"] === 'Y')
	{
		if (!empty($arResult["PAYMENT"]))
		{
			foreach ($arResult["PAYMENT"] as $payment)
			{
				if ($payment["PAID"] != 'Y')
				{
					if (!empty($arResult['PAY_SYSTEM_LIST'])
						&& array_key_exists($payment["PAY_SYSTEM_ID"], $arResult['PAY_SYSTEM_LIST'])
					)
					{
						$arPaySystem = $arResult['PAY_SYSTEM_LIST'][$payment["PAY_SYSTEM_ID"]];

						if (empty($arPaySystem["ERROR"]))
						{
							?>
							<br /><br />
<!--Скроем позицию с оплатой
							<table class="sale_order_full_table">
	<tr>
									<td class="ps_logo">
										<div class="pay_name"><?=Loc::getMessage("SOA_PAY") ?></div>
										<?=CFile::ShowImage($arPaySystem["LOGOTIP"], 100, 100, "border=0\" style=\"width:100px\"", "", false) ?>
										<div class="paysystem_name"><?=$arPaySystem["NAME"] ?></div>
										<br/>
									</td>
								</tr>
								
								<tr>
									<td>
										<? if (strlen($arPaySystem["ACTION_FILE"]) > 0 && $arPaySystem["NEW_WINDOW"] == "Y" && $arPaySystem["IS_CASH"] != "Y"): ?>
											<?
											$orderAccountNumber = urlencode(urlencode($arResult["ORDER"]["ACCOUNT_NUMBER"]));
											$paymentAccountNumber = $payment["ACCOUNT_NUMBER"];
											?>
											<script>
												window.open('<?=$arParams["PATH_TO_PAYMENT"]?>?ORDER_ID=<?=$orderAccountNumber?>&PAYMENT_ID=<?=$paymentAccountNumber?>');
											</script>
										<?=Loc::getMessage("SOA_PAY_LINK", array("#LINK#" => $arParams["PATH_TO_PAYMENT"]."?ORDER_ID=".$orderAccountNumber."&PAYMENT_ID=".$paymentAccountNumber))?>
										<? if (CSalePdf::isPdfAvailable() && $arPaySystem['IS_AFFORD_PDF']): ?>
										<br/>
											<?=Loc::getMessage("SOA_PAY_PDF", array("#LINK#" => $arParams["PATH_TO_PAYMENT"]."?ORDER_ID=".$orderAccountNumber."&pdf=1&DOWNLOAD=Y"))?>
										<? endif ?>
										<? else: ?>
											<?=$arPaySystem["BUFFERED_OUTPUT"]?>
										<? endif ?>
									</td>
								</tr>
							</table>
-->
							<?
						}
						else
						{
							?>
							<span style="color:red;"><?=Loc::getMessage("SOA_ORDER_PS_ERROR")?></span>
							<?
						}
					}
					else
					{
						?>
						<span style="color:red;"><?=Loc::getMessage("SOA_ORDER_PS_ERROR")?></span>
						<?
					}
				}
			}
		}
	}
	else
	{
		?>
		<br /><strong><?=$arParams['MESS_PAY_SYSTEM_PAYABLE_ERROR']?></strong>
		<?
	}
	?>
	<?
		if($arResult["ORDER"]["ACCOUNT_NUMBER"]){
			$new_order = CSaleOrder::GetByID($arResult["ORDER"]["ACCOUNT_NUMBER"]);
			CSaleOrderProps::GetByID($new_order['ID']);
			$new_comment = $new_order['COMMENTS'];
			$new_comment .= "\n";
			$dbProps = CSaleOrderPropsValue::GetList(array(), array("ORDER_ID" => $new_order['ID']), false, false, array("ID", "NAME", "VALUE","CODE"));
			while($fields = $dbProps->GetNext()){
				if($fields['VALUE'] == ""){
					continue;
				}
				if( $fields['CODE'] == "LOCATION"){
					$fields['VALUE'] = CSaleLocation::GetByID($fields['VALUE']);
					$location = $fields['VALUE']['COUNTRY_NAME_LANG'];
					$location .= ", ";
					$location .= $fields['VALUE']['REGION_NAME_LANG'];
					$location .= ", ";
					$location .= $fields['VALUE']['CITY_NAME_LANG'];
					$fields['VALUE'] = $location;
				}
				$new_comment .= "\n";
				$new_comment .= $fields['NAME'];
				$new_comment .= "  :  ";
				$new_comment .= $fields['VALUE'];
			}
			$arPaySys = CSalePaySystem::GetByID($new_order['PAY_SYSTEM_ID']);
			if($arPaySys){
				$strPaySys = "\nВыбранный способ оплаты : " . $arPaySys['NAME'];
				$new_comment .= $strPaySys;
			}
			$arDeliv = CSaleDelivery::GetByID($new_order['DELIVERY_ID']);
			if ($arDeliv)
			{
				$strDeliv =  "\nВыбранный способ доставки : " . $arDeliv["NAME"];
				$new_comment .= $strDeliv;
			}
			$new_shipment = \Bitrix\Sale\Shipment::loadForOrder($new_order['ID']);
				$new_shipment_store = $new_shipment[0]->getStoreId();
				if($new_shipment_store){
					$store = CCatalogStore::GetList(
						$arOrder = array(),
						$arFilter = array("ID" => $new_shipment_store),
						$arGroupBy = false,
						$arNavStartParams = false,
						$arSelectFields = array()
					);
					$store = $store->GetNext();
					$strStore = "\nСклад самовывоза : " . $store['TITLE'];
					$new_comment .= $strStore;  
				}
			CSaleOrder::CommentsOrder($new_order['ID'], $new_comment);
		}
	?>
<? else: ?>

	<b><?=Loc::getMessage("SOA_ERROR_ORDER")?></b>
	<br /><br />

	<table class="sale_order_full_table">
		<tr>
			<td>
				<?=Loc::getMessage("SOA_ERROR_ORDER_LOST", array("#ORDER_ID#" => $arResult["ACCOUNT_NUMBER"]))?>
				<?=Loc::getMessage("SOA_ERROR_ORDER_LOST1")?>
			</td>
		</tr>
	</table>

<? endif ?>
