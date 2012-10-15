<?php

/**
 * @category    Graphic Sourcecode
 * @package     GSC_Stockavailability
 * @license     http://www.graphicsourcecode.com/gs-license.txt
 * @author      Geoff Safcik <info@graphicsourcecode.com>
 */

class GSC_Stockavailability_Model_Observer
{
    /**
     * Return creditmemo items qty to stock
     *
     * @param Varien_Event_Observer $observer
     */
    public function refundOrderInventory($observer)
    {
        $creditmemo = $observer->getEvent()->getCreditmemo();
        $items = array();
        foreach ($creditmemo->getAllItems() as $item) {
            $return = false;
            if ($item->hasBackToStock()) {
                if ($item->getBackToStock() && $item->getQty()) {
                    $return = true;
                }
            } elseif (Mage::helper('cataloginventory')->isAutoReturnEnabled()) {
                $return = true;
            }
            if ($return) {
                if (isset($items[$item->getProductId()])) {
                    $items[$item->getProductId()]['qty'] += $item->getQty();
                } else {
                    $items[$item->getProductId()] = array(
                        'qty' => $item->getQty(),
                        'item'=> null,
                    );
                }
            }
        }
        Mage::getSingleton('cataloginventory/stock')->revertProductsSale($items);

        foreach ($creditmemo->getAllItems() as $item) {
            $productId = $item->getProductId();
            $product = Mage::getModel('catalog/product')->load($productId);

            if(!$product->isConfigurable()){

                $stockItem = $product->getStockItem();

                $stockItem->setQty($item->getQty());
                $stockItem->setIsInStock(1);
                $stockItem->save();

                //$product->setStockItem($stockItem);
                //$product->save();
            }
        }
    }

}
