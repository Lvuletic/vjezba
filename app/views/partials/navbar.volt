

<nav class="navbar navbar-default">
  <div class="container">

    <div class="navbar-header">
     <?php echo $this->tag->linkTo(array(array("for" => "about", "language" => $this->dispatcher->getParam("language")), $t->_("aboutlink"), "class" => "navbar-brand")) ?>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        {% for controller,option in elements._headerMenu %}
        <li> <?php if ($option["route"]!="login" && $option["route"]!="logout")
        echo $this->tag->linkTo(array(array("for" => $option["route"], "language" => $this->dispatcher->getParam("language")), $t->_($option['caption']))) ?> </li>
        {% endfor %}
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <?php if ($this->session->get("auth")){ ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                <?php echo $this->session->get("username") ?>
                <span class="caret"></span></a>
          <?php }
          else {
             echo $this->tag->linkTo(array(array("for" => "login", "language" => $this->dispatcher->getParam("language")), $t->_("loginlink")));
           }?>
          <ul class="dropdown-menu" role="menu">
          <?php if($this->session->get("user_id")==1)
          { ?>
            <li> <?php echo $this->tag->linkTo(array(array("for" => "orderstable", "language" => $this->dispatcher->getParam("language")), $t->_("list of orders"))) ?> </li>
            <li> <?php echo $this->tag->linkTo(array(array("for" => "products", "language" => $this->dispatcher->getParam("language")), $t->_("list of products"))) ?> </li>
            <li class="divider"></li>
            <li> <?php echo $this->tag->linkTo(array(array("for" => "logout", "language" => $this->dispatcher->getParam("language")), $t->_("logoutlink"))) ?> </li>
         <?php }
         else { ?>
            <li> <?php echo $this->tag->linkTo(array(array("for" => "account", "language" => $this->dispatcher->getParam("language")), $t->_("youraccount"))) ?> </li>
            <li> <?php echo $this->tag->linkTo(array(array("for" => "yourorders", "language" => $this->dispatcher->getParam("language")), $t->_("your orders"))) ?> </li>
            <li class="divider"></li>
            <li> <?php echo $this->tag->linkTo(array(array("for" => "logout", "language" => $this->dispatcher->getParam("language")), $t->_("logoutlink"))) ?> </li>
           <?php } ?>
          </ul>
        </li>
        <li> <a href="index/changeLanguage/hr"><img src="/vjezba/public/img/tinyCRO.gif" alt="Hr" title="Hrvatski jezik"> </a> </li>
        <li> <a href="index/changeLanguage/en"><img src="/vjezba/public/img/tinyUK.gif" alt="UK"title="English language"> </a> </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>