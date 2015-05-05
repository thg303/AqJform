<?php
/**
 * @version     $Id$
 * @package     aqjform
 * @subpackage  com_aqjform
 * @copyright   Copyright 2015 Ali Ghanavatian. All rights reserved.
 * @license     GNU General Public License version 3 or later.
 */

// No direct access
defined('_JEXEC') or die;


// Include dependencies
jimport('joomla.application.component.controller');

$controller = JController::getInstance('Aqjform');
$controller->execute(JRequest::getVar('task'));
$controller->redirect();