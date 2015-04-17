

<nav class="navbar navbar-default">
  <div class="container">

    <div class="navbar-header">
     <?php echo $this->tag->linkTo(array(array("for" => "about", "language" => $this->dispatcher->getParam("language")), "O nama", "class" => "navbar-brand")) ?>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
         <li> <?php echo $this->tag->linkTo("index/changeLanguage/hr", "Hrvatski") ?> </li>
         <li> <?php echo $this->tag->linkTo("index/changeLanguage/en", "English") ?> </li>
        {% for controller,option in elements._headerMenu %}
        <li> <?php if ($option["route"]!="login" && $option["route"]!="logout")
        echo $this->tag->linkTo(array(array("for" => $option["route"], "language" => $this->dispatcher->getParam("language")), $option['caption'])) ?> </li>
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
             echo $this->tag->linkTo(array(array("for" => "login", "language" => $this->session->get("lang")), "prijava"));
           }?>
          <ul class="dropdown-menu" role="menu">
          <?php if($this->session->get("user_id")==1)
          { ?>
            <li> <?php echo $this->tag->linkTo(array(array("for" => "orderstable", "language" => $this->dispatcher->getParam("language")), "Popis narudžbi")) ?> </li>
            <li> <?php echo $this->tag->linkTo(array(array("for" => "products", "language" => $this->dispatcher->getParam("language")), "Proizvodi")) ?> </li>
            <li class="divider"></li>
            <li> <?php echo $this->tag->linkTo(array(array("for" => "logout", "language" => $this->dispatcher->getParam("language")), "Odjava")) ?> </li>
         <?php }
         else { ?>
            <li> <?php echo $this->tag->linkTo(array(array("for" => "account", "language" => $this->dispatcher->getParam("language")), "Vaš Račun")) ?> </li>
            <li> <?php echo $this->tag->linkTo(array(array("for" => "yourorders", "language" => $this->dispatcher->getParam("language")), "Vaše narudžbe")) ?> </li>
            <li class="divider"></li>
            <li> <?php echo $this->tag->linkTo(array(array("for" => "logout", "language" => $this->dispatcher->getParam("language")), "Odjava")) ?> </li>
           <?php } ?>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>