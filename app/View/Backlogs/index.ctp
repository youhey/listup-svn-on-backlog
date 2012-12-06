<?php
/**
 * Backlog management
 *
 * @since         2012-12-04
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 */

?>
<style>
#index {
    margin-top: 48px;
    margin-bottom: 48px;
}

</style>
<p class="lead"><?php echo h($title_for_layout) ?></p>

<div id="index">
    <ol>
        <li><?php echo $this->Html->link('List up for Subversion', array('action' => 'list_svn')) ?></li>
    </ol>
</div>

