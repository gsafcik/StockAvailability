<?php

/**
 * @category    Graphic Sourcecode
 * @package     GSC_Stockavailability
 * @license     http://www.graphicsourcecode.com/gs-license.txt
 * @author      Geoff Safcik <info@graphicsourcecode.com>
 */

class GSC_Stockavailability_Block_System_Config_Info
    extends Mage_Adminhtml_Block_Abstract
    implements Varien_Data_Form_Element_Renderer_Interface
{
	public function render(Varien_Data_Form_Element_Abstract $element)
	{
		$html = '<div style="background-color:#FAFAFA; border:1px solid #D6D6D6; margin-bottom:10px; padding:10px 5px 5px 30px;">
						<p style="font-size:11px">This module is initiated when a Credit Memo (Return) is made.</p>
						<p style="font-size:11px">When a product has <span style="font-weight:bold;">0</span> quantity stock level, it is set to <span style="font-style:italic; color:#a61515;">out of stock</span>. When returning an <span style="text-decoration:underline;">out of stock item</span>, the <span style="font-weight:bold;">quanity</span> will increase but the item will still remain <span style="font-style:italic; color:#a61515;">out of stock</span>.</p>
						<p style="font-size:11px">With this module enabled, the above situation is <span style="font-weight:bold;">fixed</span>. Along with the <span style="font-weight:bold;">quantity</span> increase (upon return of the item), the <span style="font-style:italic; color:#a61515;">out of stock</span> status is reset to <span style="font-style:italic; color:#6ab105;">in stock</span>.</p>
						<p style="font-size:10px"><span style="font-weight:bold;">Note:</span> This module does <span style="font-weight:bold; text-decoration:underline;">not</span> fix the <a href="http://www.magentocommerce.com/bug-tracking/issue?issue=13610" target="_blank">Magento Credit Memo quantity bug</a> for Magento ver. 1.6.* or less </p>
					</div>';
        
        return $html;
    }
}
