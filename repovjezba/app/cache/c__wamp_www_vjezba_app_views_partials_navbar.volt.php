<?php echo $this->elements->getMenu(); ?>
<div>
    <ul>
         <li> <?php echo $this->tag->linkTo("index/changeLanguage/hr", "Hrvatski") ?> </li>
         <li> <?php echo $this->tag->linkTo("index/changeLanguage/en", "English") ?> </li>
        <?php foreach ($this->elements->_headerMenu as $controller => $option) { ?>
            <li> <?php echo $this->tag->linkTo($controller. '/' .$option['action'], $option['caption']) ?> </li>
        <?php } ?>
    </ul>
</div>