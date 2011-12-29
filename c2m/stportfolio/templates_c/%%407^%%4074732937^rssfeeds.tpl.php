<?php /* Smarty version 2.6.2, created on 2010-09-27 14:48:17
         compiled from rssfeeds.tpl */ ?>
<?php if ($this->_tpl_vars['feeds']): ?>
<?php if (count($_from = (array)$this->_tpl_vars['feeds'])):
    foreach ($_from as $this->_tpl_vars['feed']):
?>
<a href="<?php echo $this->_tpl_vars['feed']['link']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['feed']['title']; ?>
" class="newsLinkTitle" <?php if ($this->_tpl_vars['config']['newWindow']): ?>target="_blank"<?php endif; ?>><b><?php echo $this->_tpl_vars['feed']['title']; ?>
</b></a><br />
<div class="newsDescription"><?php echo $this->_tpl_vars['feed']['description']; ?>
</div>
<?php endforeach; unset($_from); endif; ?>
<?php endif; ?>