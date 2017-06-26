<!doctype html>
<html class="no-js" lang="<?php echo $lang; ?>">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title><?php echo $site_title; ?></title>
<meta name="description" content="<?php echo $site_description; ?>" />
<meta name="keywords" content="<?php echo $site_keywords; ?>" />
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />
<?php echo $meta_tag; ?>
<?php echo $styles; ?>
<!-- JS -->
<?php echo $scripts_header; ?>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar" data-color="azure">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="" class="simple-text">
                        YoYo
                    </a>
                </div>

                <ul class="nav">
                    
                    <?php foreach ($menus as $menu): ?>
                    <?php $access = explode(",", $menu['detail']['group']); ?>
                    <?php if ( $this->ion_auth->in_group(array_map("trim", $access)) ) : ?>
                    <li class="<?php if($this->uri->segment(1)==$menu['detail']['link']){echo "active";}?>">
                        <a <?php if(isset($menu['submenus'])){echo 'data-toggle="collapse" href="#'.$menu['detail']['controller'].'"';}else{ echo 'href="'.site_url().'/'.$menu['detail']['link'].'"'; }?>>
                            <i class="pe-7s-graph"></i><p><?php echo $menu['detail']['name']; ?><?php if(isset($menu['submenus'])){echo '<b class="caret"></b>';}?></p>
                        </a>
                        <?php if (isset($menu['submenus'])): ?>
                        <?php $collapse = FALSE; ?>
                        <?php foreach ($menu['submenus'] as $submenus): ?>
                            <?php foreach ($submenus as $submenu): ?>
                                <?php if($this->uri->segment(2)==$submenu['detail']['link']){$collapse = TRUE;}?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                        
                        <div class="collapse <?php if($collapse){echo "in";}?>" id="<?php echo $menu['detail']['controller']; ?>">
                            <ul class="nav">
                                <?php foreach ($menu['submenus'] as $submenus): ?>
                                    <?php foreach ($submenus as $submenu): ?>
                                        <li class="<?php if($this->uri->segment(2)==$submenu['detail']['link']){echo "active";}?>">
                                            <a href="<?php echo site_url().'/'.$menu['detail']['link'].'/'.$submenu['detail']['link']; ?>"><?php echo $submenu['detail']['name']; ?></a></li>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </li>
                    <?php endif; ?>

                    <?php endforeach; ?>
                </ul>
    	    </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Dashboard</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-dashboard"></i>
                                </a>
                            </li>
                        </ul>
    
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                               <a href="">
                                   Account
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <div class="content">
                <div class="container-fluid">
                    <?php echo $content; ?>
                </div>
            </div>
            
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
    
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                    </p>
                </div>
            </footer>
            
        </div>
    </div>
            
    <?php echo $scripts_footer; ?>
    
</body>
</html>
