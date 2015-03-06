{{ elements.getMenu() }}
<div>
    <ul>
        {% for controller,option in elements._headerMenu %}
            <li> <?php echo $this->tag->linkTo($controller. '/' .$option['action'], $option['caption']) ?> </li>
        {% endfor %}
    </ul>
</div>