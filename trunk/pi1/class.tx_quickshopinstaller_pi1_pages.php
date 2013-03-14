<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010-2012 - Dirk Wildt <http://wildt.at.die-netzmacher.de>
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
 *  116: class tx_quickshopinstaller_pi1_pages extends tslib_pibase
 *
 *              SECTION: Main
 *  174:     public function main( $content, $conf)
 *
 *              SECTION: Confirmation
 *  257:     private function confirmation()
 *
 *              SECTION: Counter
 *  333:     private function countPages( $pageUid )
 *
 *              SECTION: Create
 *  362:     private function create( )
 *  380:     private function createBeGroup()
 *  486:     private function createContent()
 *  628:     private function createFilesShop()
 *
 *              SECTION: Create pages
 *  695:     private function createPageCaddy( $pageUid, $sorting )
 *  732:     private function createPageDelivery( $pageUid, $sorting )
 *  769:     private function createPageLegalinfo( $pageUid, $sorting )
 *  806:     private function createPageLibrary( $pageUid, $sorting )
 *  857:     private function createPageLibraryFooter( $pageUid, $sorting )
 *  895:     private function createPageLibraryHeader( $pageUid, $sorting )
 *  933:     private function createPageProducts( $pageUid, $sorting )
 * 1030:     private function createPageTerms( $pageUid, $sorting )
 * 1065:     private function createPages( )
 * 1097:     private function createPagesLibrary( $pageUid )
 * 1123:     private function createPagesLibraryRecords( $pageUid )
 * 1151:     private function createPagesLibrarySqlInsert( $pages )
 * 1178:     private function createPagesRoot( $pageUid )
 * 1199:     private function createPagesRootRecords( $pageUid )
 * 1242:     private function createPagesRootSqlInsert( $pages )
 *
 *              SECTION: Create plugins
 * 1275:     private function createPlugins()
 *
 *              SECTION: Create records
 * 1517:     private function createRecordsPowermail()
 * 2126:     private function createRecordsShop()
 *
 *              SECTION: Create TypoScript
 * 2494:     private function createTyposcript()
 *
 *              SECTION: Consolidate
 * 2801:     private function consolidatePageCurrent()
 * 3024:     private function consolidatePluginPowermail()
 * 3101:     private function consolidateTsWtCart()
 *
 *              SECTION: Extensions
 * 3243:     private function extensionCheck( )
 * 3308:     private function extensionCheckCaseBaseTemplate( )
 * 3347:     private function extensionCheckExtension( $key, $title )
 *
 *              SECTION: Html
 * 3388:     private function htmlReport( )
 *
 *              SECTION: Init
 * 3445:     private function initBoolTopLevel( )
 * 3486:     private function install( )
 * 3525:     private function installNothing( )
 *
 *              SECTION: Prompt
 * 3551:     private function promptCleanUp()
 *
 *              SECTION: ZZ
 * 3600:     private function zz_getCHash($str_params)
 * 3614:     private function zz_getMaxDbUid($table)
 * 3641:     private function zz_getPathToIcons()
 * 3655:     private function zz_getFlexValues()
 *
 * TOTAL FUNCTIONS: 41
 * (This index is automatically created/updated by the extension "extdeveval")
 *
 */

require_once(PATH_tslib.'class.tslib_pibase.php');


/**
 * Plugin 'Quick Shop Inmstaller' for the 'quickshop_installer' extension.
 *
 * @author    Dirk Wildt <http://wildt.at.die-netzmacher.de>
 * @package    TYPO3
 * @subpackage    tx_quickshopinstaller
 * @version 1.0.6
 */
class tx_quickshopinstaller_pi1_pages extends tslib_pibase
{
  public $prefixId      = 'tx_quickshopinstaller_pi1_pages';                // Same as class name
  public $scriptRelPath = 'pi1/class.tx_quickshopinstaller_pi1_pages.php';  // Path to this script relative to the extension dir.
  public $extKey        = 'quickshop_installer';                      // The extension key.

  public $pObj = null;

  
  
 /***********************************************
  *
  * Counter
  *
  **********************************************/

/**
 * countPages( ) :
 *
 * @param	[type]		$$pageUid: ...
 * @return	string
 * @access private
 * @version 3.0.0
 * @since 1.0.0
 */
  private function countPages( $pageUid )
  {
    static $counter = 0;

    $counter  = $counter + 1 ;
    $pageUid  = $pageUid + 1 ;
    $sorting  = 256 * $counter;

    $csvResult = $pageUid . ',' . $sorting;

    return $csvResult;
  }

  
  
 /***********************************************
  *
  * Create pages
  *
  **********************************************/

/**
 * createPageCaddy( ) :
 *
 * @param	integer		$pageUid            : uid of the current page
 * @param	integer		$sorting            : sorting value
 * @return	array		$page               : current page record
 * @access private
 * @version 3.0.0
 * @since 1.0.0
 */
  private function createPageCaddy( $pageUid, $sorting )
  {
    $pageTitle    = 'page_title_cart';
    $llPageTitle  = $this->pi_getLL( $pageTitle );

    $page = array
            (
              'uid'           => $pageUid,
              'pid'           => $GLOBALS['TSFE']->id,
              'title'         => $llPageTitle,
              'dokType'       => 1,  // 1: page
              'crdate'        => time( ),
              'tstamp'        => time( ),
              'perms_userid'  => $this->pObj->markerArray['###BE_USER###'],
              'perms_groupid' => $this->pObj->markerArray['###GROUP_UID###'],
              'perms_user'    => 31, // 31: Full access
              'perms_group'   => 31, // 31: Full access
              'urlType'       => 1,
              'sorting'       => $sorting
            );

    $this->pObj->arr_pageUids[ $llPageTitle ] = $pageUid;
    $this->pObj->arr_pageTitles[ $pageUid ]   = $llPageTitle;

    return $page;
  }

/**
 * createPageDelivery( ) :
 *
 * @param	integer		$pageUid            : uid of the current page
 * @param	integer		$sorting            : sorting value
 * @return	array		$page               : current page record
 * @access private
 * @version 3.0.0
 * @since 1.0.0
 */
  private function createPageDelivery( $pageUid, $sorting )
  {
    $pageTitle    = 'page_title_shipping';
    $llPageTitle  = $this->pi_getLL( $pageTitle );

    $page = array
            (
              'uid'           => $pageUid,
              'pid'           => $GLOBALS['TSFE']->id,
              'title'         => $llPageTitle,
              'dokType'       => 1,  // 1: page
              'crdate'        => time( ),
              'tstamp'        => time( ),
              'perms_userid'  => $this->pObj->markerArray['###BE_USER###'],
              'perms_groupid' => $this->pObj->markerArray['###GROUP_UID###'],
              'perms_user'    => 31, // 31: Full access
              'perms_group'   => 31, // 31: Full access
              'urlType'       => 1,
              'sorting'       => $sorting
            );

    $this->pObj->arr_pageUids[ $llPageTitle ] = $pageUid;
    $this->pObj->arr_pageTitles[ $pageUid ]   = $llPageTitle;

    return $page;
  }

/**
 * createPageLegalinfo( ) :
 *
 * @param	integer		$pageUid            : uid of the current page
 * @param	integer		$sorting            : sorting value
 * @return	array		$page               : current page record
 * @access private
 * @version 3.0.0
 * @since 1.0.0
 */
  private function createPageLegalinfo( $pageUid, $sorting )
  {
    $pageTitle    = 'page_title_legalinfo';
    $llPageTitle  = $this->pi_getLL( $pageTitle );

    $page = array
            (
              'uid'           => $pageUid,
              'pid'           => $GLOBALS['TSFE']->id,
              'title'         => $llPageTitle,
              'dokType'       => 1,  // 1: page
              'crdate'        => time( ),
              'tstamp'        => time( ),
              'perms_userid'  => $this->pObj->markerArray['###BE_USER###'],
              'perms_groupid' => $this->pObj->markerArray['###GROUP_UID###'],
              'perms_user'    => 31, // 31: Full access
              'perms_group'   => 31, // 31: Full access
              'urlType'       => 1,
              'sorting'       => $sorting
            );

    $this->pObj->arr_pageUids[ $llPageTitle ] = $pageUid;
    $this->pObj->arr_pageTitles[ $pageUid ]   = $llPageTitle;

    return $page;
  }

/**
 * createPageLibrary( ) :
 *
 * @param	integer		$pageUid            : uid of the current page
 * @param	integer		$sorting            : sorting value
 * @return	array		$page               : current page record
 * @access private
 * @version 3.0.0
 * @since 1.0.0
 */
  private function createPageLibrary( $pageUid, $sorting )
  {
    $pageTitle    = 'page_title_library';
    $llPageTitle  = $this->pi_getLL( $pageTitle );

    $dateHumanReadable  = date('Y-m-d G:i:s');

    $page = array
            (
              'uid'           => $pageUid,
              'pid'           => $GLOBALS['TSFE']->id,
              'title'         => $llPageTitle,
              'dokType'       => 254,  // 254: sysfolder
              'crdate'        => time( ),
              'tstamp'        => time( ),
              'perms_userid'  => $this->pObj->markerArray['###BE_USER###'],
              'perms_groupid' => $this->pObj->markerArray['###GROUP_UID###'],
              'perms_user'    => 31, // 31: Full access
              'perms_group'   => 31, // 31: Full access
              'module'        => 'library',
              'urlType'       => 1,
              'sorting'       => $sorting,
              'TSconfig'      => '

// QUICK SHOP INSTALLER at ' . $dateHumanReadable . ' -- BEGIN

TCEMAIN {
  clearCacheCmd = pages
}

// QUICK SHOP INSTALLER at ' . $dateHumanReadable . ' -- END

'
            );

    $this->pObj->arr_pageUids[ $llPageTitle ] = $pageUid;
    $this->pObj->arr_pageTitles[ $pageUid ]   = $llPageTitle;

    return $page;
  }

/**
 * createPageLibraryFooter( ) :
 *
 * @param	integer		$pageUid            : uid of the current page
 * @param	integer		$sorting            : sorting value
 * @return	array		$page               : current page record
 * @access private
 * @version 3.0.0
 * @since 1.0.0
 */
  private function createPageLibraryFooter( $pageUid, $sorting )
  {
    $pageTitle    = 'page_title_library_footer';
    $llPageTitle  = $this->pi_getLL( $pageTitle );
    $pidTitle     = 'page_title_library';
    $llPidTitle   = $this->pi_getLL( $pidTitle );
    $pid          = $this->pObj->arr_pageUids[ $llPidTitle ];

    $page = array
            (
              'uid'           => $pageUid,
              'pid'           => $pid,
              'title'         => $llPageTitle,
              'dokType'       => 1,  // 1: page
              'crdate'        => time( ),
              'tstamp'        => time( ),
              'perms_userid'  => $this->pObj->markerArray['###BE_USER###'],
              'perms_groupid' => $this->pObj->markerArray['###GROUP_UID###'],
              'perms_user'    => 31, // 31: Full access
              'perms_group'   => 31, // 31: Full access
              'urlType'       => 1,
              'sorting'       => $sorting
            );

    $this->pObj->arr_pageUids[ $llPageTitle ] = $pageUid;
    $this->pObj->arr_pageTitles[ $pageUid ]   = $llPageTitle;

    return $page;
  }

/**
 * createPageLibraryHeader( ) :
 *
 * @param	integer		$pageUid            : uid of the current page
 * @param	integer		$sorting            : sorting value
 * @return	array		$page               : current page record
 * @access private
 * @version 3.0.0
 * @since 1.0.0
 */
  private function createPageLibraryHeader( $pageUid, $sorting )
  {
    $pageTitle    = 'page_title_library_header';
    $llPageTitle  = $this->pi_getLL( $pageTitle );
    $pidTitle     = 'page_title_library';
    $llPidTitle   = $this->pi_getLL( $pidTitle );
    $pid          = $this->pObj->arr_pageUids[ $llPidTitle ];

    $page = array
            (
              'uid'           => $pageUid,
              'pid'           => $pid,
              'title'         => $llPageTitle,
              'dokType'       => 1,  // 1: page
              'crdate'        => time( ),
              'tstamp'        => time( ),
              'perms_userid'  => $this->pObj->markerArray['###BE_USER###'],
              'perms_groupid' => $this->pObj->markerArray['###GROUP_UID###'],
              'perms_user'    => 31, // 31: Full access
              'perms_group'   => 31, // 31: Full access
              'urlType'       => 1,
              'sorting'       => $sorting
            );

    $this->pObj->arr_pageUids[ $llPageTitle ] = $pageUid;
    $this->pObj->arr_pageTitles[ $pageUid ]   = $llPageTitle;

    return $page;
  }

/**
 * createPageProducts( ) :
 *
 * @param	integer		$pageUid            : uid of the current page
 * @param	integer		$sorting            : sorting value
 * @return	array		$page               : current page record
 * @access private
 * @version 3.0.0
 * @since 1.0.0
 */
  private function createPageProducts( $pageUid, $sorting )
  {
    $pageTitle    = 'page_title_products';
    $llPageTitle  = $this->pi_getLL( $pageTitle );

    $dateHumanReadable  = date('Y-m-d G:i:s');

    $page = array
            (
              'uid'           => $pageUid,
              'pid'           => $GLOBALS['TSFE']->id,
              'title'         => $llPageTitle,
              'dokType'       => 254,  // 254: sysfolder
              'crdate'        => time( ),
              'tstamp'        => time( ),
              'perms_userid'  => $this->pObj->markerArray['###BE_USER###'],
              'perms_groupid' => $this->pObj->markerArray['###GROUP_UID###'],
              'perms_user'    => 31, // 31: Full access
              'perms_group'   => 31, // 31: Full access
              'module'        => 'quickshop',
              'urlType'       => 1,
              'sorting'       => $sorting,
              'TSconfig'      => '

// Created by QUICK SHOP INSTALLER at ' . $dateHumanReadable . ' -- BEGIN



  ////////////////////////////////////////////////////////////////////////
  //
  // INDEX
  // =====
  // TCAdefaults
  // TCEMAIN



  ////////////////////////////////////////////////////////////////////////
  //
  // TCAdefaults

  // Default values for new records
TCAdefaults {
    // Default values for organiser calendar
  tx_quickshop_products {
      // Width in Pixel
    imagewidth    = 200
      // 26: Beside text, left
    imageorient   =  26
      // 1: All images have 1 column
    imagecols     =   1
      // 1: Click enlarge is enabled
    image_zoom    =   1
      // 1: Every image get its own div-tag
    image_noRows  =   1
      // 1: reduced, 2: normal
    tax           =   2
  }
}
  // Default values for new records
  // TCAdefaults



  ////////////////////////////////////////////////////////////////////////
  //
  // TCEMAIN

TCEMAIN {
  clearCacheCmd = pages
}
  // TCEMAIN



// Created by QUICK SHOP INSTALLER at ' . $dateHumanReadable . ' -- BEGIN

'
            );

    $this->pObj->arr_pageUids[ $llPageTitle ] = $pageUid;
    $this->pObj->arr_pageTitles[ $pageUid ]   = $llPageTitle;

    return $page;
  }

/**
 * createPageTerms( ) :
 *
 * @param	integer		$pageUid            : uid of the current page
 * @param	integer		$sorting            : sorting value
 * @param	string		$dateHumanReadable  : human readabel date
 * @return	array		$page               : current page record
 * @access private
 * @version 3.0.0
 * @since 1.0.0
 */
  private function createPageTerms( $pageUid, $sorting )
  {
    $pageTitle    = 'page_title_terms';
    $llPageTitle  = $this->pi_getLL( $pageTitle );

    $page = array
            (
              'uid'           => $pageUid,
              'pid'           => $GLOBALS['TSFE']->id,
              'title'         => $llPageTitle,
              'dokType'       => 1,  // 1: page
              'crdate'        => time( ),
              'tstamp'        => time( ),
              'perms_userid'  => $this->pObj->markerArray['###BE_USER###'],
              'perms_groupid' => $this->pObj->markerArray['###GROUP_UID###'],
              'perms_user'    => 31, // 31: Full access
              'perms_group'   => 31, // 31: Full access
              'urlType'       => 1,
              'sorting'       => $sorting
            );

    $this->pObj->arr_pageUids[ $llPageTitle ] = $pageUid;
    $this->pObj->arr_pageTitles[ $pageUid ]   = $llPageTitle;

    return $page;
  }

/**
 * createPages( ) :
 *
 * @return	void
 * @access public
 * @version 3.0.0
 * @since 1.0.0
 */
  public function createPages( )
  {
      // Prompt header
    $this->pObj->arrReport[ ] = '
      <h2>
       '.$this->pi_getLL('page_create_header').'
      </h2>';
      // Prompt header

    $pageUid = $this->pObj->zz_getMaxDbUid( 'pages' );

      // Pages on the root level
    $pageUid = $this->createPagesRoot( $pageUid );

      // Pages within page library
    $pageUid = $this->createPagesLibrary( $pageUid );

var_dump(__METHOD__, __LINE__, $pageUid, $this->pObj->arrReport );
die( );

    return;
  }

/**
 * createPagesLibrary( ) :
 *
 * @param	integer		$pageUid: current page uid
 * @return	integer		$pageUid: latest page uid
 * @access private
 * @version 3.0.0
 * @since 1.0.0
 */
  private function createPagesLibrary( $pageUid )
  {
    if( $this->pObj->markerArray['###INSTALL_CASE###'] != 'install_all' )
    {
      return $pageUid;
    }

    $arrResult  = $this->createPagesLibraryRecords( $pageUid );
    $pages      = $arrResult['pages'];
    $pageUid    = $arrResult['pageUid'];
    unset( $arrResult );

    $this->createPagesLibrarySqlInsert( $pages );

    return $pageUid;
  }

/**
 * createPagesLibraryRecords( ) :
 *
 * @param	integer		$pageUid    : current page uid
 * @return	array		$arrReturn  : array with elements pages and pageUid
 * @access private
 * @version 3.0.0
 * @since 1.0.0
 */
  private function createPagesLibraryRecords( $pageUid )
  {
    $pages = array( );

    list( $pageUid, $sorting) = explode( ',', $this->countPages( $pageUid ) );
    $pages[$pageUid] = $this->createPageLibraryHeader( $pageUid, $sorting );

    list( $pageUid, $sorting) = explode( ',', $this->countPages( $pageUid ) );
    $pages[$pageUid] = $this->createPageLibraryFooter( $pageUid, $sorting );

    $arrReturn  = array
                  (
                    'pages'   => $pages,
                    'pageUid' => $pageUid
                  );

    return $arrReturn;
  }

/**
 * createPagesLibrary( ) :
 *
 * @param	array		$pages: page records
 * @return	void
 * @access private
 * @version 3.0.0
 * @since 1.0.0
 */
  private function createPagesLibrarySqlInsert( $pages )
  {
    foreach( $pages as $page )
    {
      $GLOBALS['TYPO3_DB']->exec_INSERTquery( 'pages', $page );
      $this->pObj->markerArray['###TITLE###'] = $this->pi_getLL( 'page_title_library' ) . ' > ' . $page['title'];
      $this->pObj->markerArray['###UID###']   = $page['uid'];
      $prompt = '
        <p>
          '.$this->pObj->arr_icons['ok'] . ' ' . $this->pi_getLL( 'page_create_prompt' ) . '
        </p>';
      $prompt = $this->pObj->cObj->substituteMarkerArray( $prompt, $this->pObj->markerArray );
      $this->pObj->arrReport[ ] = $prompt;
    }

    unset($pages);
  }

/**
 * createPagesRoot( ) :
 *
 * @param	integer		$pageUid: current page uid
 * @return	integer		$pageUid: latest page uid
 * @access private
 * @version 3.0.0
 * @since 1.0.0
 */
  private function createPagesRoot( $pageUid )
  {
    $arrResult  = $this->createPagesRootRecords( $pageUid );
    $pages      = $arrResult['pages'];
    $pageUid    = $arrResult['pageUid'];
    unset( $arrResult );

    $this->createPagesRootSqlInsert( $pages );

    return $pageUid;
  }

/**
 * createPagesRootRecords( ) :
 *
 * @param	integer		$pageUid    : current page uid
 * @return	array		$arrReturn  : array with elements pages and pageUid
 * @access private
 * @version 3.0.0
 * @since 1.0.0
 */
  private function createPagesRootRecords( $pageUid )
  {
    $pages = array( );

    list( $pageUid, $sorting) = explode( ',', $this->countPages( $pageUid ) );
    $pages[$pageUid] = $this->createPageCaddy( $pageUid, $sorting );

    list( $pageUid, $sorting) = explode( ',', $this->countPages( $pageUid ) );
    $pages[$pageUid] = $this->createPageDelivery( $pageUid, $sorting );

    list( $pageUid, $sorting) = explode( ',', $this->countPages( $pageUid ) );
    $pages[$pageUid] = $this->createPageTerms( $pageUid, $sorting );

    if( $this->pObj->markerArray['###INSTALL_CASE###'] == 'install_all' )
    {
      list( $pageUid, $sorting) = explode( ',', $this->countPages( $pageUid ) );
      $pages[$pageUid] = $this->createPageLegalinfo( $pageUid, $sorting );

      list( $pageUid, $sorting) = explode( ',', $this->countPages( $pageUid ) );
      $pages[$pageUid] = $this->createPageLibrary( $pageUid, $sorting );
    }

    list( $pageUid, $sorting) = explode( ',', $this->countPages( $pageUid ) );
    $pages[$pageUid] = $this->createPageProducts( $pageUid, $sorting );

    $arrReturn  = array
                  (
                    'pages'   => $pages,
                    'pageUid' => $pageUid
                  );

    return $arrReturn;
  }

/**
 * createPagesRoot( ) :
 *
 * @param	array		$pages: page records
 * @return	void
 * @access private
 * @version 3.0.0
 * @since 1.0.0
 */
  private function createPagesRootSqlInsert( $pages )
  {
    foreach( $pages as $page )
    {
      $GLOBALS['TYPO3_DB']->exec_INSERTquery( 'pages', $page );
      $this->pObj->markerArray['###TITLE###'] = $page['title'];
      $this->pObj->markerArray['###UID###']   = $page['uid'];
      $prompt = '
        <p>
          ' . $this->pObj->arr_icons['ok'] . ' ' . $this->pi_getLL( 'page_create_prompt' ) . '
        </p>';
      $prompt = $this->pObj->cObj->substituteMarkerArray( $prompt, $this->pObj->markerArray );
      $this->pObj->arrReport[] = $prompt;
    }

    unset($pages);
  }

}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/quickshop_installer/pi1/class.tx_quickshopinstaller_pi1_pages.php'])
{
  include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/quickshop_installer/pi1/class.tx_quickshopinstaller_pi1_pages.php']);
}