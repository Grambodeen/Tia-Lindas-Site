<?php session_start(); ?>

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Contact Tia Linda</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="../style4.css">
</head>

<body>
	<nav>
    <ul>
        <li><a href="../index.html">Home</a></li>
        <li><a href="../about.html">Her Story</a></li>
        <li><a href="../launch.html">Where Is She?</a></li>
        <li><a href="../product.html">Product</a></li>
        <li><a href="emailform/formpage.php">Contact</a></li>
    </ul>
   </nav>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <p>Contact Us!</p>
  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>

<div id="contact-form" class="clearfix">
    <h1>Get In Touch!</h1>
    <h2>Fill out our super swanky HTML5 contact form below to get in touch with us! Please provide as much information as possible for us to help you with your enquiry :)</h2>
    <?php
    //init variables
    $cf = array();
    $sr = false;
     
    if(isset($_SESSION['cf_returndata'])){
        $cf = $_SESSION['cf_returndata'];
        $sr = true;
    }
    <ul id="errors" class="<?php echo ($sr && !$cf['form_ok']) ? 'visible' : ''; ?>">
        <li id="info">There were some problems with your form submission:</li>
        <?php 
        if(isset($cf['errors']) && count($cf['errors']) > 0) :
            foreach($cf['errors'] as $error) :
        ?>
        <li><?php echo $error ?></li>
        <?php
            endforeach;
        endif;
        ?>
    </ul>
    <form method="post" action="process.php">
        <label for="name">Name: <span class="required">*</span></label>
        <input type="text" id="name" name="name" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['name'] : '' ?>" placeholder="John Doe" required autofocus />
         
        <label for="email">Email Address: <span class="required">*</span></label>
        <input type="email" id="email" name="email" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['email'] : '' ?>" placeholder="johndoe@example.com" required />
         
        <label for="telephone">Telephone: </label>
        <input type="tel" id="telephone" name="telephone" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['telephone'] : '' ?>" />
         
        <label for="enquiry">Enquiry: </label>
        <select id="enquiry" name="enquiry">
            <option value="General" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['enquiry'] == 'General') ? "selected='selected'" : '' ?>>General</option>
            <option value="Sales" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['enquiry'] == 'Sales') ? "selected='selected'" : '' ?>>Sales</option>
            <option value="Support" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['enquiry'] == 'Support') ? "selected='selected'" : '' ?>>Support</option>
        </select>
         
        <label for="message">Message: <span class="required">*</span></label>
        <textarea id="message" name="message" placeholder="Your message must be greater than 20 charcters" required data-minlength="20"><?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['message'] : '' ?></textarea>
         
        <span id="loading"></span>
        <input type="submit" value="Holla!" id="submit-button" />
        <p id="req-field-desc"><span class="required">*</span> indicates a required field</p>
    </form>
    <?php unset($_SESSION['cf_returndata']); ?>
</div>

</body>

</html>
