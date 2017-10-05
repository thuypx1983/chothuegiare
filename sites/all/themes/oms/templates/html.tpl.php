<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<head>
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<meta name="MobileOptimized" content="width">
<meta name="HandheldFriendly" content="true">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php print $styles; ?>
<!--[if lt IE 9]><script src="<?php print base_path() . drupal_get_path('theme', 'oms') . '/js/html5.js'; ?>"></script><![endif]-->
<?php print $scripts; ?>
</head>
<body class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>

  <!-- Load Facebook SDK for JavaScript -->
  <script>
      window.fbAsyncInit = function() {
          FB.init({
              appId      : '2393003784259030',
              xfbml      : true,
              version    : 'v2.10'
          });
          FB.AppEvents.logPageView();
      };

      (function(d, s, id){
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) {return;}
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js";
          fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
  </script>
  <div id="fb-root"></div>


  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="/sites/all/themes/oms/js/pushy/js/pushy.js" async defer></script>


</body>
</html>