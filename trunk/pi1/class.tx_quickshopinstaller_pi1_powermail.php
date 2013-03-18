<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2013 - Dirk Wildt <http://wildt.at.die-netzmacher.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 *
 *
 *   92: class tx_quickshopinstaller_pi1_powermail
 *
 *              SECTION: Main
 *  116:     public function main( )
 *
 *              SECTION: Fields: billing address
 *  145:     private function fieldBillingaddressAddress( $uid, $sorting )
 *  175:     private function fieldBillingaddressCity( $uid, $sorting )
 *  205:     private function fieldBillingaddressCompany( $uid, $sorting )
 *  235:     private function fieldBillingaddressCountry( $uid, $sorting )
 *  265:     private function fieldBillingaddressFirstname( $uid, $sorting )
 *  309:     private function fieldBillingaddressSurname( $uid, $sorting )
 *  353:     private function fieldBillingaddressZip( $uid, $sorting )
 *
 *              SECTION: Fields: contact data
 *  391:     private function fieldContactdataEmail( $uid, $sorting )
 *  438:     private function fieldContactdataFax( $uid, $sorting )
 *  468:     private function fieldContactdataPhone( $uid, $sorting )
 *
 *              SECTION: Fields: delivery address
 *  506:     private function fieldDeliveryaddressAddress( $uid, $sorting )
 *  536:     private function fieldDeliveryaddressCity( $uid, $sorting )
 *  566:     private function fieldDeliveryaddressCompany( $uid, $sorting )
 *  596:     private function fieldDeliveryaddressCountry( $uid, $sorting )
 *  626:     private function fieldDeliveryaddressFirstname( $uid, $sorting )
 *  656:     private function fieldDeliveryaddressSurname( $uid, $sorting )
 *  686:     private function fieldDeliveryaddressZip( $uid, $sorting )
 *
 *              SECTION: Fields: order
 *  724:     private function fieldOrderNote( $uid, $sorting )
 *  772:     private function fieldOrderSubmit( $uid, $sorting )
 *  802:     private function fieldOrderTerms( $uid, $sorting )
 *
 *              SECTION: Controller
 *  860:     private function fields( )
 *
 *              SECTION: Fieldsets
 *  966:     private function fieldsetBillingaddress( $uid, $sorting )
 *  996:     private function fieldsetContactdata( $uid, $sorting )
 * 1026:     private function fieldsetDeliveryaddress( $uid, $sorting )
 * 1056:     private function fieldsetOrder( $uid, $sorting )
 * 1084:     private function fieldsets( )
 *
 *              SECTION: Sql
 * 1126:     private function sqlInsert( $records, $table )
 *
 *              SECTION: ZZ
 * 1162:     private function zz_counter( $uid )
 *
 * TOTAL FUNCTIONS: 29
 * (This index is automatically created/updated by the extension "extdeveval")
 *
 */

/**
 * Plugin 'Quick Shop Inmstaller' for the 'quickshop_installer' extension.
 *
 * @author    Dirk Wildt <http://wildt.at.die-netzmacher.de>
 * @package    TYPO3
 * @subpackage    tx_quickshopinstaller
 * @version 3.0.0
 * @since 3.0.0
 */
class tx_quickshopinstaller_pi1_powermail
{
  public $prefixId      = 'tx_quickshopinstaller_pi1_powermail';                // Same as class name
  public $scriptRelPath = 'pi1/class.tx_quickshopinstaller_pi1_powermail.php';  // Path to this script relative to the extension dir.
  public $extKey        = 'quickshop_installer';                      // The extension key.

  public $pObj = null;
  
  public $fieldsetsLabelForms  = null;
  public $fieldsetsLabelFields = null;




 /***********************************************
  *
  * Main
  *
  **********************************************/

/**
 * main( )
 *
 * @return	void
 * @access public
 * @version 3.0.0
 * @since   0.0.1
 */
  public function main( )
  {
    $records = array( );

    $records = $this->fieldsets( );
    $this->sqlInsert( $records, 'tx_powermail_fieldsets' );

    $records = $this->fields( );
    $this->sqlInsert( $records, 'tx_powermail_fields' );
  }



 /***********************************************
  *
  * Fields: billing address
  *
  **********************************************/

/**
 * fieldBillingaddressAddress( )
 *
 * @param	integer		$uid      : uid of the current field
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the field record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldBillingaddressAddress( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_field_title_streetBilling' );
    $this->pObj->arr_recordUids[ 'record_pm_field_title_streetBilling' ] = $uid;

    $record['uid']       = $uid;
    $record['pid']       = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']    = time( );
    $record['crdate']    = time( );
    $record['cruser_id'] = $this->pObj->markerArray['###BE_USER###'];
    $record['title']     = $llTitle;
    $record['sorting']   = $sorting;
    $record['fieldset']  = $this->pObj->arr_recordUids[ 'record_pm_fSets_title_billingAddress' ];
    $record['formtype']  = 'text';

    return $record;
  }

/**
 * fieldBillingaddressCity( )
 *
 * @param	integer		$uid      : uid of the current field
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the field record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldBillingaddressCity( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_field_title_locationBilling' );
    $this->pObj->arr_recordUids[ 'record_pm_field_title_locationBilling' ] = $uid;

    $record['uid']       = $uid;
    $record['pid']       = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']    = time( );
    $record['crdate']    = time( );
    $record['cruser_id'] = $this->pObj->markerArray['###BE_USER###'];
    $record['title']     = $llTitle;
    $record['sorting']   = $sorting;
    $record['fieldset']  = $this->pObj->arr_recordUids[ 'record_pm_fSets_title_billingAddress' ];
    $record['formtype']  = 'text';

    return $record;
  }

/**
 * fieldBillingaddressCompany( )
 *
 * @param	integer		$uid      : uid of the current field
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the field record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldBillingaddressCompany( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_field_title_companyBilling' );
    $this->pObj->arr_recordUids[ 'record_pm_field_title_companyBilling' ] = $uid;

    $record['uid']       = $uid;
    $record['pid']       = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']    = time( );
    $record['crdate']    = time( );
    $record['cruser_id'] = $this->pObj->markerArray['###BE_USER###'];
    $record['title']     = $llTitle;
    $record['sorting']   = $sorting;
    $record['fieldset']  = $this->pObj->arr_recordUids[ 'record_pm_fSets_title_billingAddress' ];
    $record['formtype']  = 'text';

    return $record;
  }

/**
 * fieldBillingaddressCountry( )
 *
 * @param	integer		$uid      : uid of the current field
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the field record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldBillingaddressCountry( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_field_title_countryBilling' );
    $this->pObj->arr_recordUids[ 'record_pm_field_title_countryBilling' ] = $uid;

    $record['uid']       = $uid;
    $record['pid']       = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']    = time( );
    $record['crdate']    = time( );
    $record['cruser_id'] = $this->pObj->markerArray['###BE_USER###'];
    $record['title']     = $llTitle;
    $record['sorting']   = $sorting;
    $record['fieldset']  = $this->pObj->arr_recordUids[ 'record_pm_fSets_title_billingAddress' ];
    $record['formtype']  = 'text';

    return $record;
  }

/**
 * fieldBillingaddressFirstname( )
 *
 * @param	integer		$uid      : uid of the current field
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the field record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldBillingaddressFirstname( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_field_title_firstnameBilling' );
    $this->pObj->arr_recordUids[ 'record_pm_field_title_firstnameBilling' ] = $uid;

    $record['uid']       = $uid;
    $record['pid']       = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']    = time( );
    $record['crdate']    = time( );
    $record['cruser_id'] = $this->pObj->markerArray['###BE_USER###'];
    $record['title']     = $llTitle;
    $record['sorting']   = $sorting;
    $record['fieldset']  = $this->pObj->arr_recordUids[ 'record_pm_fSets_title_billingAddress' ];
    $record['formtype']  = 'text';
    $record['flexform']  = ''.
'<?xml version="1.0" encoding="utf-8" standalone="yes" ?>
<T3FlexForms>
    <data>
        <sheet index="sDEF">
            <language index="lDEF">
                <field index="mandatory">
                    <value index="vDEF">1</value>
                </field>
            </language>
        </sheet>
    </data>
</T3FlexForms>
';

    return $record;
  }

/**
 * fieldBillingaddressSurname( )
 *
 * @param	integer		$uid      : uid of the current field
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the field record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldBillingaddressSurname( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_field_title_surnameBilling' );
    $this->pObj->arr_recordUids[ 'record_pm_field_title_surnameBilling' ] = $uid;

    $record['uid']       = $uid;
    $record['pid']       = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']    = time( );
    $record['crdate']    = time( );
    $record['cruser_id'] = $this->pObj->markerArray['###BE_USER###'];
    $record['title']     = $llTitle;
    $record['sorting']   = $sorting;
    $record['fieldset']  = $this->pObj->arr_recordUids[ 'record_pm_fSets_title_billingAddress' ];
    $record['formtype']  = 'text';
    $record['flexform']  = ''.
'<?xml version="1.0" encoding="utf-8" standalone="yes" ?>
<T3FlexForms>
    <data>
        <sheet index="sDEF">
            <language index="lDEF">
                <field index="mandatory">
                    <value index="vDEF">1</value>
                </field>
            </language>
        </sheet>
    </data>
</T3FlexForms>
';

    return $record;
  }

/**
 * fieldBillingaddressZip( )
 *
 * @param	integer		$uid      : uid of the current field
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the field record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldBillingaddressZip( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_field_title_zipBilling' );
    $this->pObj->arr_recordUids[ 'record_pm_field_title_zipBilling' ] = $uid;

    $record['uid']       = $uid;
    $record['pid']       = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']    = time( );
    $record['crdate']    = time( );
    $record['cruser_id'] = $this->pObj->markerArray['###BE_USER###'];
    $record['title']     = $llTitle;
    $record['sorting']   = $sorting;
    $record['fieldset']  = $this->pObj->arr_recordUids[ 'record_pm_fSets_title_billingAddress' ];
    $record['formtype']  = 'text';

    return $record;
  }



 /***********************************************
  *
  * Fields: contact data
  *
  **********************************************/

/**
 * fieldContactdataEmail( )
 *
 * @param	integer		$uid      : uid of the current field
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the field record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldContactdataEmail( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_field_title_email' );
    $this->pObj->arr_recordUids[ 'record_pm_field_title_email' ] = $uid;

    $record['uid']       = $uid;
    $record['pid']       = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']    = time( );
    $record['crdate']    = time( );
    $record['cruser_id'] = $this->pObj->markerArray['###BE_USER###'];
    $record['title']     = $llTitle;
    $record['sorting']   = $sorting;
    $record['fieldset']  = $this->pObj->arr_recordUids[ 'record_pm_fSets_title_contactData' ];
    $record['formtype']  = 'text';
    $record['flexform']  = ''.
'<?xml version="1.0" encoding="utf-8" standalone="yes" ?>
<T3FlexForms>
    <data>
        <sheet index="sDEF">
            <language index="lDEF">
                <field index="mandatory">
                    <value index="vDEF">1</value>
                </field>
                <field index="validate">
                    <value index="vDEF">validate-email</value>
                </field>
            </language>
        </sheet>
    </data>
</T3FlexForms>
';

    return $record;
  }

/**
 * fieldContactdataFax( )
 *
 * @param	integer		$uid      : uid of the current field
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the field record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldContactdataFax( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_field_title_fax' );
    $this->pObj->arr_recordUids[ 'record_pm_field_title_fax' ] = $uid;

    $record['uid']       = $uid;
    $record['pid']       = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']    = time( );
    $record['crdate']    = time( );
    $record['cruser_id'] = $this->pObj->markerArray['###BE_USER###'];
    $record['title']     = $llTitle;
    $record['sorting']   = $sorting;
    $record['fieldset']  = $this->pObj->arr_recordUids[ 'record_pm_fSets_title_contactData' ];
    $record['formtype']  = 'text';

    return $record;
  }

/**
 * fieldContactdataPhone( )
 *
 * @param	integer		$uid      : uid of the current field
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the field record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldContactdataPhone( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_field_title_phone' );
    $this->pObj->arr_recordUids[ 'record_pm_field_title_phone' ] = $uid;

    $record['uid']       = $uid;
    $record['pid']       = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']    = time( );
    $record['crdate']    = time( );
    $record['cruser_id'] = $this->pObj->markerArray['###BE_USER###'];
    $record['title']     = $llTitle;
    $record['sorting']   = $sorting;
    $record['fieldset']  = $this->pObj->arr_recordUids[ 'record_pm_fSets_title_contactData' ];
    $record['formtype']  = 'text';

    return $record;
  }



 /***********************************************
  *
  * Fields: delivery address
  *
  **********************************************/

/**
 * fieldDeliveryaddressAddress( )
 *
 * @param	integer		$uid      : uid of the current field
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the field record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldDeliveryaddressAddress( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_field_title_streetDelivery' );
    $this->pObj->arr_recordUids[ 'record_pm_field_title_streetDelivery' ] = $uid;

    $record['uid']       = $uid;
    $record['pid']       = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']    = time( );
    $record['crdate']    = time( );
    $record['cruser_id'] = $this->pObj->markerArray['###BE_USER###'];
    $record['title']     = $llTitle;
    $record['sorting']   = $sorting;
    $record['fieldset']  = $this->pObj->arr_recordUids[ 'record_pm_fSets_title_deliveryAddress' ];
    $record['formtype']  = 'text';

    return $record;
  }

/**
 * fieldDeliveryaddressCity( )
 *
 * @param	integer		$uid      : uid of the current field
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the field record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldDeliveryaddressCity( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_field_title_locationDelivery' );
    $this->pObj->arr_recordUids[ 'record_pm_field_title_locationDelivery' ] = $uid;

    $record['uid']       = $uid;
    $record['pid']       = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']    = time( );
    $record['crdate']    = time( );
    $record['cruser_id'] = $this->pObj->markerArray['###BE_USER###'];
    $record['title']     = $llTitle;
    $record['sorting']   = $sorting;
    $record['fieldset']  = $this->pObj->arr_recordUids[ 'record_pm_fSets_title_deliveryAddress' ];
    $record['formtype']  = 'text';

    return $record;
  }

/**
 * fieldDeliveryaddressCompany( )
 *
 * @param	integer		$uid      : uid of the current field
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the field record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldDeliveryaddressCompany( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_field_title_companyDelivery' );
    $this->pObj->arr_recordUids[ 'record_pm_field_title_companyDelivery' ] = $uid;

    $record['uid']       = $uid;
    $record['pid']       = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']    = time( );
    $record['crdate']    = time( );
    $record['cruser_id'] = $this->pObj->markerArray['###BE_USER###'];
    $record['title']     = $llTitle;
    $record['sorting']   = $sorting;
    $record['fieldset']  = $this->pObj->arr_recordUids[ 'record_pm_fSets_title_deliveryAddress' ];
    $record['formtype']  = 'text';

    return $record;
  }

/**
 * fieldDeliveryaddressCountry( )
 *
 * @param	integer		$uid      : uid of the current field
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the field record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldDeliveryaddressCountry( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_field_title_countryDelivery' );
    $this->pObj->arr_recordUids[ 'record_pm_field_title_countryDelivery' ] = $uid;

    $record['uid']       = $uid;
    $record['pid']       = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']    = time( );
    $record['crdate']    = time( );
    $record['cruser_id'] = $this->pObj->markerArray['###BE_USER###'];
    $record['title']     = $llTitle;
    $record['sorting']   = $sorting;
    $record['fieldset']  = $this->pObj->arr_recordUids[ 'record_pm_fSets_title_deliveryAddress' ];
    $record['formtype']  = 'text';

    return $record;
  }

/**
 * fieldDeliveryaddressFirstname( )
 *
 * @param	integer		$uid      : uid of the current field
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the field record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldDeliveryaddressFirstname( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_field_title_firstnameDelivery' );
    $this->pObj->arr_recordUids[ 'record_pm_field_title_firstnameDelivery' ] = $uid;

    $record['uid']       = $uid;
    $record['pid']       = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']    = time( );
    $record['crdate']    = time( );
    $record['cruser_id'] = $this->pObj->markerArray['###BE_USER###'];
    $record['title']     = $llTitle;
    $record['sorting']   = $sorting;
    $record['fieldset']  = $this->pObj->arr_recordUids[ 'record_pm_fSets_title_deliveryAddress' ];
    $record['formtype']  = 'text';

    return $record;
  }

/**
 * fieldDeliveryaddressSurname( )
 *
 * @param	integer		$uid      : uid of the current field
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the field record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldDeliveryaddressSurname( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_field_title_surnameDelivery' );
    $this->pObj->arr_recordUids[ 'record_pm_field_title_surnameDelivery' ] = $uid;

    $record['uid']       = $uid;
    $record['pid']       = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']    = time( );
    $record['crdate']    = time( );
    $record['cruser_id'] = $this->pObj->markerArray['###BE_USER###'];
    $record['title']     = $llTitle;
    $record['sorting']   = $sorting;
    $record['fieldset']  = $this->pObj->arr_recordUids[ 'record_pm_fSets_title_deliveryAddress' ];
    $record['formtype']  = 'text';

    return $record;
  }

/**
 * fieldDeliveryaddressZip( )
 *
 * @param	integer		$uid      : uid of the current field
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the field record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldDeliveryaddressZip( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_field_title_zipDelivery' );
    $this->pObj->arr_recordUids[ 'record_pm_field_title_zipDelivery' ] = $uid;

    $record['uid']       = $uid;
    $record['pid']       = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']    = time( );
    $record['crdate']    = time( );
    $record['cruser_id'] = $this->pObj->markerArray['###BE_USER###'];
    $record['title']     = $llTitle;
    $record['sorting']   = $sorting;
    $record['fieldset']  = $this->pObj->arr_recordUids[ 'record_pm_fSets_title_deliveryAddress' ];
    $record['formtype']  = 'text';

    return $record;
  }



 /***********************************************
  *
  * Fields: order
  *
  **********************************************/

/**
 * fieldOrderNote( )
 *
 * @param	integer		$uid      : uid of the current field
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the field record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldOrderNote( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_field_title_note' );
    $this->pObj->arr_recordUids[ 'record_pm_field_title_note' ] = $uid;

    $record['uid']       = $uid;
    $record['pid']       = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']    = time( );
    $record['crdate']    = time( );
    $record['cruser_id'] = $this->pObj->markerArray['###BE_USER###'];
    $record['title']     = $llTitle;
    $record['sorting']   = $sorting;
    $record['fieldset']  = $this->pObj->arr_recordUids[ 'record_pm_fSets_title_order' ];
    $record['formtype']  = 'text';
    $record['formtype']  = 'textarea';
    $record['flexform']  = ''.
'<?xml version="1.0" encoding="utf-8" standalone="yes" ?>
<T3FlexForms>
    <data>
        <sheet index="sDEF">
            <language index="lDEF">
                <field index="cols">
                    <value index="vDEF">50</value>
                </field>
                <field index="rows">
                    <value index="vDEF">5</value>
                </field>
            </language>
        </sheet>
    </data>
</T3FlexForms>
';

    return $record;
  }

/**
 * fieldOrderSubmit( )
 *
 * @param	integer		$uid      : uid of the current field
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the field record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldOrderSubmit( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_field_title_submit' );
    $this->pObj->arr_recordUids[ 'record_pm_field_title_submit' ] = $uid;

    $record['uid']       = $uid;
    $record['pid']       = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']    = time( );
    $record['crdate']    = time( );
    $record['cruser_id'] = $this->pObj->markerArray['###BE_USER###'];
    $record['title']     = $llTitle;
    $record['sorting']   = $sorting;
    $record['fieldset']  = $this->pObj->arr_recordUids[ 'record_pm_fSets_title_order' ];
    $record['formtype']  = 'submit';

    return $record;
  }

/**
 * fieldOrderTerms( )
 *
 * @param	integer		$uid      : uid of the current field
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the field record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldOrderTerms( $uid, $sorting )
  {
    $record = null;

    $int_terms = $this->pObj->arr_pageUids[ 'page_title_terms' ];
    $str_terms = htmlspecialchars($this->pObj->pi_getLL('phrases_powermail_termsAccepted'));
    $str_terms = str_replace('###PID###', $int_terms, $str_terms);

    $llTitle = $this->pObj->pi_getLL( 'record_pm_field_title_terms' );
    $this->pObj->arr_recordUids[ 'record_pm_field_title_terms' ] = $uid;

    $record['uid']       = $uid;
    $record['pid']       = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']    = time( );
    $record['crdate']    = time( );
    $record['cruser_id'] = $this->pObj->markerArray['###BE_USER###'];
    $record['title']     = $llTitle;
    $record['sorting']   = $sorting;
    $record['fieldset']  = $this->pObj->arr_recordUids[ 'record_pm_fSets_title_order' ];
    $record['formtype']  = 'check';
    $record['flexform']  = ''.
'<?xml version="1.0" encoding="utf-8" standalone="yes" ?>
<T3FlexForms>
    <data>
        <sheet index="sDEF">
            <language index="lDEF">
                <field index="options">
                    <value index="vDEF">' . $str_terms . '</value>
                </field>
                <field index="mandatory">
                    <value index="vDEF">1</value>
                </field>
            </language>
        </sheet>
    </data>
</T3FlexForms>
';

    return $record;
  }



 /***********************************************
  *
  * Controller
  *
  **********************************************/


/**
 * fields( )
 *
 * @return	array		$records : the plugin records
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fields( )
  {
    $records  = array( );
    $uid      = $this->pObj->zz_getMaxDbUid( 'tx_powermail_fields' );

      // field billing address company
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldBillingaddressCompany( $uid, $sorting );

      // field billing address first name
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldBillingaddressFirstname( $uid, $sorting );

      // field billing address surname
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldBillingaddressSurname( $uid, $sorting );

      // field billing address address
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldBillingaddressAddress( $uid, $sorting );

      // field billing address zip
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldBillingaddressZip( $uid, $sorting );

      // field billing address city
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldBillingaddressCity( $uid, $sorting );

      // field billing address country
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldBillingaddressCountry( $uid, $sorting );

      // field delivery address company
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldDeliveryaddressCompany( $uid, $sorting );

      // field delivery address first name
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldDeliveryaddressFirstname( $uid, $sorting );

      // field delivery address surname
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldDeliveryaddressSurname( $uid, $sorting );

      // field delivery address address
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldDeliveryaddressAddress( $uid, $sorting );

      // field delivery address zip
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldDeliveryaddressZip( $uid, $sorting );

      // field delivery address city
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldDeliveryaddressCity( $uid, $sorting );

      // field delivery address country
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldDeliveryaddressCountry( $uid, $sorting );

      // field contact data e-mail
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldContactdataEmail( $uid, $sorting );

      // field contact data phone
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldContactdataPhone( $uid, $sorting );

      // field contact data fax
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldContactdataFax( $uid, $sorting );

      // field order note
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldOrderNote( $uid, $sorting );

      // field order terms
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldOrderTerms( $uid, $sorting );

      // field order submit
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldOrderSubmit( $uid, $sorting );

    return $records;
  }



 /***********************************************
  *
  * Fieldsets
  *
  **********************************************/

/**
 * fieldsetBillingaddress( )
 *
 * @param	integer		$uid      : uid of the current fieldset
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the plugin record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldsetBillingaddress( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_fSets_title_billingAddress' );
    $this->pObj->arr_recordUids[ 'record_pm_fSets_title_billingAddress' ] = $uid;

    $record['uid']        = $uid;
    $record['pid']        = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']     = time( );
    $record['crdate']     = time( );
    $record['cruser_id']  = $this->pObj->markerArray['###BE_USER###'];
    $record['title']      = $llTitle;
    $record['sorting']    = $sorting;
    $record[$this->fieldsetsLabelForms] = $this->pObj->arr_pluginUids[ 'plugin_powermail_header' ];
    $record[$this->fieldsetsLabelFields]     = '7';

    return $record;
  }

/**
 * fieldsetContactdata( )
 *
 * @param	integer		$uid      : uid of the current fieldset
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the fieldset record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldsetContactdata( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_fSets_title_contactData' );
    $this->pObj->arr_recordUids[ 'record_pm_fSets_title_contactData' ] = $uid;

    $record['uid']        = $uid;
    $record['pid']        = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']     = time( );
    $record['crdate']     = time( );
    $record['cruser_id']  = $this->pObj->markerArray['###BE_USER###'];
    $record['title']      = $llTitle;
    $record['sorting']    = $sorting;
    $record[$this->fieldsetsLabelForms] = $this->pObj->arr_pluginUids[ 'plugin_powermail_header' ];
    $record[$this->fieldsetsLabelFields]     = '3';

    return $record;
  }

/**
 * fieldsetDeliveryaddress( )
 *
 * @param	integer		$uid      : uid of the current fieldset
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the fieldset record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldsetDeliveryaddress( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_fSets_title_deliveryAddress' );
    $this->pObj->arr_recordUids[ 'record_pm_fSets_title_deliveryAddress' ] = $uid;

    $record['uid']        = $uid;
    $record['pid']        = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']     = time( );
    $record['crdate']     = time( );
    $record['cruser_id']  = $this->pObj->markerArray['###BE_USER###'];
    $record['title']      = $llTitle;
    $record['sorting']    = $sorting;
    $record[$this->fieldsetsLabelForms] = $this->pObj->arr_pluginUids[ 'plugin_powermail_header' ];
    $record[$this->fieldsetsLabelFields]     = '7';

    return $record;
  }

/**
 * fieldsetOrder( )
 *
 * @param	integer		$uid      : uid of the current fieldset
 * @param	integer		$sorting  : sorting value
 * @return	array		$record   : the fieldset record
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldsetOrder( $uid, $sorting )
  {
    $record = null;

    $llTitle = $this->pObj->pi_getLL( 'record_pm_fSets_title_order' );
    $this->pObj->arr_recordUids[ 'record_pm_fSets_title_order' ] = $uid;

    $record['uid']        = $uid;
    $record['pid']        = $this->pObj->arr_pageUids[ 'page_title_caddy' ];
    $record['tstamp']     = time( );
    $record['crdate']     = time( );
    $record['cruser_id']  = $this->pObj->markerArray['###BE_USER###'];
    $record['title']      = $llTitle;
    $record['sorting']    = $sorting;
    $record[$this->fieldsetsLabelForms] = $this->pObj->arr_pluginUids[ 'plugin_powermail_header' ];
    $record[$this->fieldsetsLabelFields]     = '3';

    return $record;
  }

/**
 * fieldsets( )
 *
 * @return	array		$records : the fieldset records
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function fieldsets( )
  {
    $records  = array( );
    
    $this->fieldsetsSetLabelsByVersion( ); 
            
    $uid      = $this->pObj->zz_getMaxDbUid( 'tx_powermail_fieldsets' );

      // fieldset billing address
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldsetBillingaddress( $uid, $sorting );

      // fieldset delivery address
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldsetDeliveryaddress( $uid, $sorting );

      // fieldset contact data
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldsetContactdata( $uid, $sorting );

      // fieldset order
    list( $uid, $sorting) = explode( ',', $this->zz_counter( $uid ) );
    $records[$uid] = $this->fieldsetOrder( $uid, $sorting );

    return $records;
  }

/**
 * fieldsetsSetLabelsByVersion( )
 *
 * @return	void
 * @access private
 * @version 3.0.0
 * @since   3.0.0
 */
  private function fieldsetsSetLabelsByVersion( )
  {
    switch( true )
    {
      case( $this->pObj->powermailVersionInt < 1000000 ):
        $prompt = 'ERROR: unexpected result<br />
          powermail version is below 1.0.0: ' . $this->pObj->powermailVersionInt . '<br />
          Method: ' . __METHOD__ . ' (line ' . __LINE__ . ')<br />
          TYPO3 extension: ' . $this->extKey;
        die( $prompt );
        break;
      case( $this->pObj->powermailVersionInt < 2000000 ):
        $this->fieldsetsSetLabelsByVersion1x( );
        break;
      case( $this->pObj->powermailVersionInt < 3000000 ):
        $this->fieldsetsSetLabelsByVersion2x( );
        break;
      case( $this->pObj->powermailVersionInt >= 3000000 ):
      default:
        $prompt = 'ERROR: unexpected result<br />
          powermail version is 3.x: ' . $this->pObj->powermailVersionInt . '<br />
          Method: ' . __METHOD__ . ' (line ' . __LINE__ . ')<br />
          TYPO3 extension: ' . $this->extKey;
        die( $prompt );
        break;
    }
  }

/**
 * fieldsetsSetLabelsByVersion1x( )
 *
 * @return	void
 * @access private
 * @version 3.0.0
 * @since   3.0.0
 */
  private function fieldsetsSetLabelsByVersion1x( )
  {
    $this->fieldsetsLabelForms  = 'tt_content';
    $this->fieldsetsLabelFields = 'felder';
  }

/**
 * fieldsetsSetLabelsByVersion2x( )
 *
 * @return	void
 * @access private
 * @version 3.0.0
 * @since   3.0.0
 */
  private function fieldsetsSetLabelsByVersion2x( )
  {
    $this->fieldsetsLabelForms  = 'forms';
    $this->fieldsetsLabelFields = 'fields';
  }



 /***********************************************
  *
  * Sql
  *
  **********************************************/

/**
 * sqlInsert( )
 *
 * @param	array		$records  : TypoScript records for pages
 * @param	string		$table    : name of the current table
 * @return	void
 * @access private
 * @version 3.0.0
 * @since   0.0.1
 */
  private function sqlInsert( $records, $table )
  {
    foreach( $records as $record )
    {
      //var_dump($GLOBALS['TYPO3_DB']->INSERTquery( $table, $record ) );
      $GLOBALS['TYPO3_DB']->exec_INSERTquery( $table, $record );
      $error = $GLOBALS['TYPO3_DB']->sql_error( );      
      
      if( $error )
      {
        $query  = $GLOBALS['TYPO3_DB']->INSERTquery( $table, $record );
        $prompt = 'SQL-ERROR<br />' . PHP_EOL .
                  'query: ' . $query . '.<br />' . PHP_EOL .
                  'error: ' . $error . '.<br />' . PHP_EOL .
                  'Sorry for the trouble.<br />' . PHP_EOL .
                  'TYPO3-Quick-Shop Installer<br />' . PHP_EOL .
                __METHOD__ . ' (' . __LINE__ . ')';
        die( $prompt );
      }
      
        // prompt
      $pageTitle = $this->pObj->arr_pageTitles[$record['pid']];
      $pageTitle = $this->pObj->pi_getLL( $pageTitle );
      $marker['###TITLE###']      = $record['title'];
      $marker['###TABLE###']      = $this->pObj->pi_getLL( $table );
      $marker['###TITLE_PID###'] = '"' . $pageTitle . '" (uid ' . $record['pid'] . ')';
      $prompt = '
        <p>
          ' . $this->pObj->arr_icons['ok'] . ' ' . $this->pObj->pi_getLL( 'record_create_prompt' ) . '
        </p>';
      $prompt = $this->pObj->cObj->substituteMarkerArray( $prompt, $marker );
      $this->pObj->arrReport[ ] = $prompt;
        // prompt
    }
  }



 /***********************************************
  *
  * ZZ
  *
  **********************************************/

/**
 * zz_counter( ) :
 *
 * @param	integer		$uid        : current record uid
 * @return	string		$csvResult  : uid, sorting
 * @access private
 * @version 3.0.0
 * @since 1.0.0
 */
  private function zz_counter( $uid )
  {
    static $counter = 0;

    $counter  = $counter + 1 ;
    $uid      = $uid + 1 ;
    $sorting  = 256 * $counter;

    $csvResult = $uid . ',' . $sorting;

    return $csvResult;
  }
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/quickshop_installer/pi1/class.tx_quickshopinstaller_pi1_powermail.php'])
{
  include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/quickshop_installer/pi1/class.tx_quickshopinstaller_pi1_powermail.php']);
}