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

jimport('joomla.html.pane');

//loads xml file
$form = JForm::getInstance('jform', JPATH_COMPONENT.DS.'models'.DS.'forms'.DS.'EditPageForm.xml');

?>

<h1>
<?php echo 'Aq JForm Example';?>
</h1>

<!-- normal fieldsets -->
<div class="width-60 fltlft">
    <?php
    // Iterate through the normal form fieldsets and display each one.
    foreach ($form->getFieldsets('main') as $fieldsets => $fieldset):
    ?>
    <fieldset class="adminform">
        <legend>
            <?php echo $fieldset->label; ?>
        </legend>
        
        <!-- Fields go here -->
		<dl>
			<?php
			// Iterate through the fields and display them.
			foreach($form->getFieldset($fieldset->name) as $field):
			// If the field is hidden, only use the input.
			if ($field->hidden):
			echo $field->input;
			else:
			?>
			<dt>
				<?php echo $field->label; ?>
			</dt>
			<dd
			<?php echo ($field->type == 'Editor' || $field->type == 'Textarea') ? ' style="clear: both; margin: 0;"' : ''?>>
				<?php echo $field->input ?>
			</dd>
			<?php
			endif;
			endforeach;
			?>
		</dl>

	</fieldset>
    <?php
    endforeach;
    ?>
</div>


<!-- extra fieldsets -->
<div class="width-40 fltrt">
    <?php $pane = JPane::getInstance();  
    	echo $pane->startPane("extra"); ?>
        <?php
        // Iterate through the extra form fieldsets and display each one.
        foreach ($form->getFieldsets("extra") as $fieldsets => $fieldset):
        ?>
        <?php echo $pane->startPanel(JText::_($fieldset->name.'_jform_fieldset_label'), $fieldsets); ?>
        <fieldset class="panelform">
            <dl>
            <?php
            // Iterate through the fields and display them.
            foreach($form->getFieldset($fieldset->name) as $field):
                // If the field is hidden, just display the input.
                if ($field->hidden):
                    echo $field->input;
                else:
                ?>
                <dt>
                    <?php echo $field->label; ?>
                </dt>
                <dd>
                    <?php echo $field->input; ?>
                </dd>
                <?php
                endif;
            endforeach;
            ?>
            </dl>
        </fieldset>
        <?php echo $pane->endPanel(); ?>
        <?php
        endforeach;
        ?>
    <?php echo $pane->endPane(); ?>
</div>
