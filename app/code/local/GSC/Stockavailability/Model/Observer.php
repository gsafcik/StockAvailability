<?php

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
        foreach ($creditmemo->getAllItems() as $item) {
            // check if item was to be returned to stock
            $process = false;
            if ($item->hasBackToStock()) {
                if ($item->getBackToStock() && $item->getQty()) {
                    $process = true;
                }
            } elseif (Mage::helper('cataloginventory')->isAutoReturnEnabled()) {
                $process = true;
            }

            if ($process == true) {
                // update the product id - based on code from http://stackoverflow.com/questions/10453324/
                $productId = $item->getProductId();
                $product = Mage::getModel('catalog/product')->load($productId);

                if (!$product->isConfigurable()) {
                    $stockItem = $product->getStockItem();
                    $stockItem->setIsInStock(1);
                    $stockItem->save();
                }
            }
        }
    }

}
