{{ elements.getMenu() }}
<div>
    <ul>
         <li> <?php echo $this->tag->linkTo("index/changeLanguage/hr", "Hrvatski") ?> </li>
         <li> <?php echo $this->tag->linkTo("index/changeLanguage/en", "English") ?> </li>
        {% for controller,option in elements._headerMenu %}
            <li> <?php echo $this->tag->linkTo($controller. '/' .$option['action'], $option['caption']) ?> </li>
        {% endfor %}
    </ul>
</div>