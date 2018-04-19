<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<head>
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<meta name="MobileOptimized" content="width">
<meta name="HandheldFriendly" content="true">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--[if lt IE 9]><script src="<?php print base_path() . drupal_get_path('theme', 'oms') . '/js/html5.js'; ?>"></script><![endif]-->

<style type="text/css">
    <?php echo file_get_contents(DRUPAL_ROOT.'/sites/all/themes/oms/css/style-inline.css');?>
</style>


  <?php print $scripts; ?>
</head>
<body class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print $page_top; ?>
  <?php print $page; ?>

  <?php print $styles; ?>

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
<!-- Google Code dành cho Thẻ tiếp thị lại --><!--------------------------------------------------Không thể liên kết thẻ tiếp thị lại với thông tin nhận dạng cá nhân hay đặt thẻ tiếp thị lại trên các trang có liên quan đến danh mục nhạy cảm. Xem thêm thông tin và hướng dẫn về cách thiết lập thẻ trên: http://google.com/ads/remarketingsetup---------------------------------------------------><script type="text/javascript">/* <![CDATA[ */var google_conversion_id = 870868694;var google_custom_params = window.google_tag_params;var google_remarketing_only = true;/* ]]> */</script><script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script><noscript><div style="display:inline;"><img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/870868694/?guid=ON&amp;script=0"/></div></noscript>

</body>
</html>