		<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="home">
			<img class="m-t-16-minus" src="<?php echo $site_url ;?>/public/images/house_rock.jpg" width="150" height="51">
	  </a>
    </div>
    <div class="collapse navbar-collapse profile-nav-b" id="myNavbar">
      <ul class="nav navbar-nav">
        <li id="href_home" data-click="pill">
			<a href="<?php echo $site_url ;?>/home">
				<span>HOME</span>
			</a>
		</li>
		
		<li id="href_profile" data-click="pill">
			<a href="<?php echo $site_url ;?>/profile">PROFILE</a>
		</li>
		
		<li class="disabled" id="href_resources">
			<a href="#">RESOURCES</a>
		</li>
		
		<li class="disabled" id="href_news">
			<a href="#">NEWS</a>
		</li>
		
		<li class="disabled" id="href_contact">
			<a href="#">CONTACT US</a>
		</li>
		
		<li id="href_about">
			<a href="logout">LOGOUT</a>
		</li>
		
                
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="form-group top_search">
                  <div class="input-group m-t-15">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </li>
      </ul>
    </div>
  </div>
</nav>