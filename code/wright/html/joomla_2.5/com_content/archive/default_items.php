<?php
// Wright v.3 Override: Joomla 2.5.17
/**
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

/* Wright v.3: Classes to hide texts in mobile */
	$wrightBeforeIcon = '<span class="hidden-phone">';
	$wrightAfterIcon = '</span>';
	$wrightBeforeIconM = '<span class="visible-phone">';
	$wrightAfterIconM = '</span>';
/* End Wright v.3: Classes to hide texts in mobile */

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
$params = &$this->params;
?>

<ul id="archive-items">
<?php foreach ($this->items as $i => $item) : ?>
	<li class="row<?php echo $i % 2; ?>">

		<h2>
		<?php if ($params->get('link_titles')): ?>
			<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catslug, $item->language)); ?>">
				<?php echo $this->escape($item->title); ?></a>
		<?php else: ?>
				<?php echo $this->escape($item->title); ?>
		<?php endif; ?>
		</h2>

<?php if (($params->get('show_author')) or ($params->get('show_parent_category')) or ($params->get('show_category')) or ($params->get('show_create_date')) or ($params->get('show_modify_date')) or ($params->get('show_publish_date'))  or ($params->get('show_hits'))) : ?>
<dl class="article-info muted"> <?php // Wright v.3: Added muted class ?>
<dt class="article-info-term"><?php echo JText::_('COM_CONTENT_ARTICLE_INFO'); ?></dt>
<?php endif; ?>
<?php if ($params->get('show_parent_category')) : ?>
		<dd class="parent-category-name">
			<i class="icon-circle-arrow-up"></i> <?php // Wright v.3: Icon ?>
			<?php	$title = $this->escape($item->parent_title);
					$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($item->parent_slug)).'">'.$title.'</a>';?>
			<?php if ($params->get('link_parent_category') && $item->parent_slug) : ?>
				<?php echo $wrightBeforeIcon . JText::sprintf('COM_CONTENT_PARENT', $url) . $wrightAfterIcon; // Wright v.3: Icon for non-mobile version ?>
				<?php echo $wrightBeforeIconM . JText::sprintf($url) . $wrightAfterIconM; // Wright v.3: Icon for mobile version ?>
				<?php else : ?>
				<?php echo $wrightBeforeIcon . JText::sprintf('COM_CONTENT_PARENT', $title) . $wrightAfterIcon; // Wright v.3: Icon for non-mobile version ?>
				<?php echo $wrightBeforeIconM . JText::sprintf($title) . $wrightAfterIconM; // Wright v.3: Icon for mobile version ?>
			<?php endif; ?>
		</dd>
<?php endif; ?>

<?php if ($params->get('show_category')) : ?>
		<dd class="category-name">
			<i class="icon-folder-open"></i> <?php // Wright v.3: Icon ?>
			<?php	$title = $this->escape($item->category_title);
					$url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($item->catslug)) . '">' . $title . '</a>'; ?>
			<?php if ($params->get('link_category') && $item->catslug) : ?>
				<?php echo $wrightBeforeIcon . JText::sprintf('COM_CONTENT_CATEGORY', $url) . $wrightAfterIcon; // Wright v.3: Icon for non-mobile version ?>
				<?php echo $wrightBeforeIconM . JText::sprintf($url) . $wrightAfterIconM; // Wright v.3: Icon for mobile version ?>
				<?php else : ?>
				<?php echo $wrightBeforeIcon . JText::sprintf('COM_CONTENT_CATEGORY', $title) . $wrightAfterIcon; // Wright v.3: Icon for non-mobile version ?>
				<?php echo $wrightBeforeIconM . JText::sprintf($title) . $wrightAfterIconM; // Wright v.3: Icon for mobile version ?>
			<?php endif; ?>
		</dd>
<?php endif; ?>
<?php if ($params->get('show_create_date')) : ?>
		<dd class="create">
			<i class="icon-pencil"></i> <?php // Wright v.3: Icon ?>
			<?php echo $wrightBeforeIcon . JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $item->created, JText::_('DATE_FORMAT_LC2'))) . $wrightAfterIcon;  // Wright v.3: Icon for non-mobile version ?>
			<?php echo $wrightBeforeIconM . JText::sprintf(JHtml::_('date', $item->created, JText::_('DATE_FORMAT_LC3'))) . $wrightAfterIconM; // Wright v.3: Icon for mobile version ?>
		</dd>
<?php endif; ?>
<?php if ($params->get('show_modify_date')) : ?>
		<dd class="modified">
			<i class="icon-edit"></i> <?php // Wright v.3: Icon ?>
			<?php echo $wrightBeforeIcon .  JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $item->modified, JText::_('DATE_FORMAT_LC2'))) . $wrightAfterIcon;  // Wright v.3: Icon for non-mobile version ?>
			<?php echo $wrightBeforeIconM . JText::sprintf(JHtml::_('date', $item->modified, JText::_('DATE_FORMAT_LC3'))) . $wrightAfterIconM; // Wright v.3: Icon for mobile version ?>
		</dd>
<?php endif; ?>
<?php if ($params->get('show_publish_date')) : ?>
		<dd class="published">
			<i class="icon-calendar"></i> <?php // Wright v.3: Icon ?>
			<?php echo $wrightBeforeIcon .  JText::sprintf('COM_CONTENT_PUBLISHED_DATE_ON', JHtml::_('date', $item->publish_up, JText::_('DATE_FORMAT_LC2'))) . $wrightAfterIcon;  // Wright v.3: Icon for non-mobile version ?>
			<?php echo $wrightBeforeIconM . JText::sprintf(JHtml::_('date', $item->publish_up, JText::_('DATE_FORMAT_LC3'))) . $wrightAfterIconM; // Wright v.3: Icon for mobile version ?>
		</dd>
<?php endif; ?>
<?php if ($params->get('show_author') && !empty($item->author )) : ?>
	<dd class="createdby">
		<i class="icon-user"></i> <?php // Wright v.3: Icon ?>
		<?php $author =  $item->author; ?>
		<?php $author = ($item->created_by_alias ? $item->created_by_alias : $author);?>

			<?php if (!empty($item->contactid ) &&  $params->get('link_author') == true):?>
				<?php 	echo $wrightBeforeIcon .  JText::sprintf('COM_CONTENT_WRITTEN_BY' ,
				 JHtml::_('link', JRoute::_('index.php?option=com_contact&view=contact&id='.$item->contactid), $author)) . $wrightAfterIcon; // Wright v.3: Icon for non-mobile version ?>
				<?php 	echo $wrightBeforeIconM .  JText::sprintf(JHtml::_('link', JRoute::_('index.php?option=com_contact&view=contact&id='.$item->contactid), $author)) . $wrightAfterIconM; // Wright v.3: Icon for mobile version ?>
			<?php else :?>
				<?php echo $wrightBeforeIcon . JText::sprintf('COM_CONTENT_WRITTEN_BY', $author) . $wrightAfterIcon; // Wright v.3: Icon for non-mobile version ?>
				<?php echo $wrightBeforeIconM . JText::sprintf($author) . $wrightAfterIconM; // Wright v.3: Icon for mobile version ?>
			<?php endif; ?>
	</dd>
<?php endif; ?>
<?php if ($params->get('show_hits')) : ?>
		<dd class="hits">
			<i class="icon-eye-open"></i> <?php // Wright v.3: Icon ?>
		<?php echo $wrightBeforeIcon . JText::sprintf('COM_CONTENT_ARTICLE_HITS', $item->hits) . $wrightAfterIcon;  // Wright v.3: Icon for non-mobile version ?>
		<?php echo $wrightBeforeIconM . JText::sprintf($item->hits) . $wrightAfterIconM;  // Wright v.3: Icon for mobile version ?>
		</dd>
<?php endif; ?>
<?php if (($params->get('show_author')) or ($params->get('show_category')) or ($params->get('show_create_date')) or ($params->get('show_modify_date')) or ($params->get('show_publish_date'))  or ($params->get('show_hits'))) :?>
	</dl>
<?php endif; ?>

<?php if ($params->get('show_intro')) :?>
	<div class="intro">
		<?php echo JHtml::_('string.truncate', $item->introtext, $params->get('introtext_limit')); ?>
	</div>
<?php endif; ?>
	</li>
<?php endforeach; ?>
</ul>

<div class="divpagination">
	<p class="counter">
		<?php echo $this->pagination->getPagesCounter(); ?>
	</p>
	<?php echo $this->pagination->getPagesLinks(); ?>
</div>
