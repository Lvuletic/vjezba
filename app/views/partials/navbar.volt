{{ elements.getMenu() }}
<div>
    <ul>
         <li> <?php echo $this->tag->linkTo("index/changeLanguage/hr", "Hrvatski") ?> </li>
         <li> <?php echo $this->tag->linkTo("index/changeLanguage/en", "English") ?> </li>
        {% for controller,option in elements._headerMenu %}
            <li> <?php echo $this->tag->linkTo(array(array("for" => $option["route"], "language" => $this->session->get("lang")), $option['caption'])) ?> </li>
        {% endfor %}
    </ul>
</div>