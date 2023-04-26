<?php
require('include/common.php');
$class=new Common();
$photos=$class->getResultArray('SELECT * FROM gallery');
$videos=$class->getResultArray('SELECT * FROM video');
$admin=$class->getRowByID('admin','admin_ID','1',$condition='');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>BHAGINI NIVEDITA Balika Sadanam</title>
		<meta charset=utf-8>
        <meta name="description" content="kadampazhipuram Trust" />
        <meta name="keywords" content="kadampazhipuram Trust"/>
		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<!--<link  href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:regular,bold" rel="stylesheet" type="text/css" />-->
   <link rel="stylesheet" href="font/font.css" type="text/css" charset="utf-8">  
   <link rel="stylesheet" href="text/font.css" type="text/css" charset="utf-8">  

<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css" media="screen"/> 
   
  
  
  
   <script src="js/jquery-1.6.3.min.js" type="text/javascript"></script><!--video-->
   
   
   
   
   
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script><!--Login--> 

     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script><!--tab-->
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script><!--tab-->
     
  
  

  
     
        <!-- Arquivos utilizados pelo jQuery lightBox plugin -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script><!--main-->
    <script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />
    <!-- / fim dos arquivos utilizados pelo jQuery lightBox plugin -->
    
    <!-- Ativando o jQuery lightBox plugin -->
    <script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();
    });
    </script>
  
  

		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script><!--main-->


        
        
     
        
        
        <script type="text/javascript">
$(document).ready(function() {
	//Default Action
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content
	
	//On Click Event
	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});

});
</script>   <!--tab-->
  
  
  
  <script type="text/javascript">
$(document).ready(function() {
	//Default Action
	$(".tab_content2").hide(); //Hide all content
	$("ul.tabs2 li:first").addClass("active").show(); //Activate first tab
	$(".tab_content2:first").show(); //Show first tab content
	
	//On Click Event
	$("ul.tabs2 li").click(function() {
		$("ul.tabs2 li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content2").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});

});
</script>   <!--tab-->
  
  
  
  <script type="text/javascript"><!--Login pop up-->
$(document).ready(function() {
	$('a.login-window').click(function() {
		
		// Getting the variable's value from a link 
		var loginBox = $(this).attr('href');

		//Fade in the Popup and add close button
		$(loginBox).fadeIn(300);
		
		//Set the center alignment padding + border
		var popMargTop = ($(loginBox).height() + 24) / 2; 
		var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
		$(loginBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask').live('click', function() { 
	  $('#mask , .login-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	}); 
	return false;
	});
});
</script>

<script src="js/jquery.prettyPhoto.js" type="text/javascript"></script><!--video-->
   <script src="js/hover-image.js" type="text/javascript"></script><!--video--> 

<script type="text/javascript">
			$(window).load(function(){
				$("a[data-gal^='prettyVideo']").prettyPhoto({animation_speed:'normal',theme:'facebook',slideshow:false, autoplay_slideshow: false});
				$("a[data-gal^='prettyVideo_1']").prettyPhoto({animation_speed:'normal',theme:'facebook',slideshow:false, autoplay_slideshow: false});
				$("a[data-gal^='prettyVideo_2']").prettyPhoto({animation_speed:'normal',theme:'facebook',slideshow:false, autoplay_slideshow: false});
				$("a[data-gal^='prettyVideo_3']").prettyPhoto({animation_speed:'normal',theme:'facebook',slideshow:false, autoplay_slideshow: false});
				$("a[data-gal^='prettyVideo_4']").prettyPhoto({animation_speed:'normal',theme:'facebook',slideshow:false, autoplay_slideshow: false});
				$("a[data-gal^='prettyVideo_5']").prettyPhoto({animation_speed:'normal',theme:'facebook',slideshow:false, autoplay_slideshow: false});
			}); 
		</script><!--video-->		
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
 <script language="javascript" src="javascripts/validation.js"></script>
</head>
    
    
<body>
    
    
    
    <div id="login-box" class="login-popup">
        <a href="#" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
        <form method="post" action="admin/adminmain.php">
        <p style="padding-left:15px; font-size:12px;">Login to edit your site</p>
      
        <input  type="hidden" title="searchfield" value="<?php echo $admin['admin_username'];?>" id="login_username" name="login_username"  />
<input type="Password"  id="pop" name="login_password"  class="addres"/>
<input type="hidden" value="home" name="page">
<input type="submit" class="submit" value="Submit"  name="login"id="newsletterGO3">
</form> 
		</div>

    
    
    
    
		<div id="ac_background" class="ac_background">
			<img class="ac_bgimage" src="images/Default.jpg" alt="Background"/>
			<div class="ac_overlay"></div>
			<div class="ac_loading"></div>
		</div>
		<div id="ac_content" class="ac_content">
			<h1>logo</h1>
			<div class="ac_menu">
            
           <!-- <div id="help">"Help Children in Vettekkara"</div>-->
            
				<ul>
               
               
               
               
				<li>
				<a href="images/1.jpg">About Us</a>
				<div class="ac_subitem">
				<span class="ac_close"></span>
							
                            
        <ul class="tabs">
        <li><a href="#tab1">1</a></li>
        <li><a href="#tab2">2</a></li>
        <li><a href="#tab3">3</a></li>
        <li><a href="#tab4">4</a></li>
        <li><a href="#tab5">5</a></li>
        </ul>


<div class="tab_container">

        <div id="tab1" class="tab_content">
        
        <h2>About Us</h2>                            
        <h3>The average family in Vettekkara makes about $70 per year, and faces a constant battle against poverty</h3>
        
          
	<div class="span_l">
                            <p>The village is located in the state of Andrah Pradesh in Southern India amid a vast area of rolling tableland 120 miles south of Hyderbad. The village economy is primarily based on agriculture. Most families cannot afford to send their children to school where they could acquire the skills and opportunities needed to break out of an intergenerational cycle of poverty.</p>
              </div>
                            
                            
                              <div class="span_l">
        <p>Economic opportunities in the village are scarce, especially for women. Family plays an important role in the social life of the village. They practice various faiths, including Hinduism, Islam and Christianity. Households consist of parents, married sons and their wives, all unmarried children and the children of sons.</p>
                            </div>
			</div>
        
        
        <div id="tab2" class="tab_content">
        
        <h2>Charity</h2>                            
        <h3>The average family in Vettekkara makes about $70 per year, and faces a constant battle against poverty</h3>
        
<div class="span_l">
                            <p>The village is located in the state of Andrah Pradesh in Southern India amid a vast area of rolling tableland 120 miles south of Hyderbad. The village economy is primarily based on agriculture. Most families cannot afford to send their children to school where they could acquire the skills and opportunities needed to break out of an intergenerational cycle of poverty.</p>
              </div>
                            
                            
                              <div class="span_l">
        <p>Economic opportunities in the village are scarce, especially for women. Family plays an important role in the social life of the village. They practice various faiths, including Hinduism, Islam and Christianity. Households consist of parents, married sons and their wives, all unmarried children and the children of sons.</p>
                            </div>
      </div>
      
      
      
      
      <div id="tab3" class="tab_content">
      <h2>Child Education</h2>                            
        <h3>The average family in Vettekkara makes about $70 per year, and faces a constant battle against poverty</h3>
<div class="span_l">
                            <p>The village is located in the state of Andrah Pradesh in Southern India amid a vast area of rolling tableland 120 miles south of Hyderbad. The village economy is primarily based on agriculture. Most families cannot afford to send their children to school where they could acquire the skills and opportunities needed to break out of an intergenerational cycle of poverty.</p>
              </div>
                            
                            
                              <div class="span_l">
        <p>Economic opportunities in the village are scarce, especially for women. Family plays an important role in the social life of the village. They practice various faiths, including Hinduism, Islam and Christianity. Households consist of parents, married sons and their wives, all unmarried children and the children of sons.</p>
                            </div>
        </div>
        
        
        
        <div id="tab4" class="tab_content">
        <h2>Social Work</h2>                            
        <h3>The average family in Vettekkara makes about $70 per year, and faces a constant battle against poverty</h3>
<div class="span_l">
                            <p>The village is located in the state of Andrah Pradesh in Southern India amid a vast area of rolling tableland 120 miles south of Hyderbad. The village economy is primarily based on agriculture. Most families cannot afford to send their children to school where they could acquire the skills and opportunities needed to break out of an intergenerational cycle of poverty.</p>
              </div>
                            
                            
                              <div class="span_l">
        <p>Economic opportunities in the village are scarce, especially for women. Family plays an important role in the social life of the village. They practice various faiths, including Hinduism, Islam and Christianity. Households consist of parents, married sons and their wives, all unmarried children and the children of sons.</p>
                            </div>
        </div>
        
        
        
        
        
        
        
        <div id="tab5" class="tab_content">
        <h2>Guest book</h2>                            
        <h3>The average family in Vettekkara makes about $70 per year, and faces a constant battle against poverty</h3>
<div class="span_l">
                            <p>The village is located in the state of Andrah Pradesh in Southern India amid a vast area of rolling tableland 120 miles south of Hyderbad. The village economy is primarily based on agriculture. Most families cannot afford to send their children to school where they could acquire the skills and opportunities needed to break out of an intergenerational cycle of poverty.</p>
              </div>
                            
                            
                              <div class="span_l">
        <p>Economic opportunities in the village are scarce, especially for women. Family plays an important role in the social life of the village. They practice various faiths, including Hinduism, Islam and Christianity. Households consist of parents, married sons and their wives, all unmarried children and the children of sons.</p>
                            </div>
        </div>
</div>
				  </div>
				  </li>
					<li>
						<a href="images/MainCourse.jpg">I Can Help</a>
						<div class="ac_subitem">
							<span class="ac_close"></span>
							<h2>I Can Help</h2>
							 <h3>Your time, your money or your voice can help the childrens of Balika Sadhanam</h3>
                            
                            <div class="span_l">
                            <p>We appreciate donations in any amount. Click the button below to contribute whatever you are comfortable with or choose any of the options at the right to direct your support to a specific cause.</p>
                            
                            <form target="paypal" method="post" action="">
<input type="submit" class="donate" id="submit" name="insert_contact" value="Donate to Balika Sadhanam">
</form>

<p>Can't support us financially? We need your help to spread the word about Balika Sadhanam.<br>

  <a class="one" href="#">Email this site to your friends</a></p>
                            </div>
                            
                               <div class="span_l">
     <div class="donate">
     <p><img src="images/donate-5000.png">Student school year sponsorship </p>
     <p><img src="images/donate-3000.png">Student school year sponsorship </p>
     <p><img src="images/donate-1000.png">Student school year sponsorship </p>
     <p><img src="images/donate-500.png">Student school year sponsorship </p>
     <p><img src="images/donate-100.png">Student school year sponsorship </p>
     <p><img src="images/donate-50.png">Student school year sponsorship </p>
     </div>
                            </div>
						</div>
					</li>
					<li>
						<a href="images/Appetizers.jpg">Sample</a>
						<div class="ac_subitem">
							<span class="ac_close"></span>
							<h2>Sample</h2>
							 <h3>Established in 1999 to assist destitute and low-income families of Vettekkara</h3>
                          
                            
                            <div class="span_l">
                            <p>Our mission is to form relationships that instill hope by establishing financial, emotional, spiritual and personal commitments between sponsors and impoverished families in Katampazhipuram, India. We maintain an office in Ithaca, New York where volunteers perform all office administration and fund raising activities. In Katampazhipuram the HC India Program Coordinator works in conjunction with a local nonprofit organization, the Jeveena Jyothi Charitable Trust (JJCT), to identify community needs and to develop and manage on-site programming. </p>                                                        
                            </div>
                            
                            
                            <div class="span_l">
                            <p>JJCT is a nondenominational organization, formed for the sole purpose of receiving and distributing Hearts' Cry humanitarian aid donations in Katampazhipuram. JJCT was founded by Fr. George Allam, who volunteers his time as director and visits the village on weekends to oversee programming. Staff positions include doctor, nurse, women's development coordinator, community center cook and tutors.</p>                                                        
                            </div>
						</div>
					</li>
					<li>
						<a href="images/Desserts.jpg">Future Plan</a>
						<div class="ac_subitem">
							<span class="ac_close"></span>
							<h2>Future Plan</h2>
							
                             <h3>Biannual publications from India and Ithaca</h3>                            
                            <div id="small">
                            <p><a class="one" href="#"><strong>November 2010</strong> (1.5mb pdf)</a></p>
                            <p>Contents include: Father George Visits Ithaca, and Rochester! Ithaca ALternative Gift Fair, Program News, New Board Members and more.</p>
                            
                            <div id="cln_10"></div>
                            
                            <p><a class="one" href="#"><strong>June 2010</strong> (3.4mb pdf)</a></p>
                            <p>Contents include: Father George Visits Ithaca, and Rochester! Ithaca ALternative Gift Fair, Program News, New Board Members and more.</p>
                            
                            <div id="cln_10"></div>                         
                            </div>
                            
                            
                            
                            <div id="small">
                            <p><a class="one" href="#"><strong>November 2010</strong> (1.5mb pdf)</a></p>
                            <p>Contents include: Father George Visits Ithaca, and Rochester! Ithaca ALternative Gift Fair, Program News, New Board Members and more.</p>
                            
                            <div id="cln_10"></div>
                            <p><a class="one" href="#"><strong>June 2010</strong> (3.4mb pdf)</a></p>
                            <p>Contents include: Father George Visits Ithaca, and Rochester! Ithaca ALternative Gift Fair, Program News, New Board Members and more.</p>
                            
                            <div id="cln_10"></div>
                            </div>
                            
                            <div id="small">
                            <p style="color:#000000;">Subscribe To Newsletter</p>
                            <p>You will be the first to be informed on special promotions, latest baalika news and more.</p>
<p>We only need your email address and name, and you can subscribe at any time via the website.</p> 
                                                       
                            <div id="cln_10"></div>
                            
                          <form method="post" action="newsletter.php" onSubmit="return newsletter_validation()">
<input class="input-letter" type="text" value="Enter your name"   name="title" id="title"  onfocus="clearText(this)" onBlur="clearText(this)"/>
<input class="input-text" type="text" value="Enter your email address" name="nemail" id="nemail"  onfocus="clearText(this)" onBlur="clearText(this)" />
<input type="submit" class="ok" name="Submit" value="SEND">
</form>                                                                                  
                            </div>
						</div>
					</li>
					<li>
						<a href="images/Wines.jpg">Gallery</a>
						<div class="ac_subitem">
							<span class="ac_close"></span>
                            
                            <ul class="tabs2">
        <li><a href="#tab6">1</a></li>
        <li><a href="#tab7">2</a></li>
        </ul>
   
   
   
   
   
   
   <div class="tab_container2">

        <div id="tab6" class="tab_content2">
        
        <h2>Photos</h2>                            
        <h3>Meet The Childrens of Balika Sadhanam</h3>
              
      <div id="cln">       
              <div id="gallery">
                           
    <ul>
     <!--<li>
            <a href="photos/image1.jpg" title="Title">
                <img src="photos/thumb_image1.jpg" alt="" />            </a>        </li>
        <li>
            <a href="photos/image2.jpg" title="Title">
                <img src="photos/thumb_image2.jpg" alt="" />            </a>        </li>
        <li>
            <a href="photos/image3.jpg" title="Title">
                <img src="photos/thumb_image3.jpg" alt="" />            </a>        </li>
        <li>
            <a href="photos/image4.jpg" title="Title">
                <img src="photos/thumb_image4.jpg" alt="" />            </a>        </li>-->
        
    <?php 
		foreach($photos as $row){
		?>
       <li>
            <a href="uploads/gallery_image/<?php echo $row['gallery_image'];?>" title="Title">
                <img src="uploads/gallery_thumb/<?php echo $row['gallery_thumb'];?>" alt="" />            </a>        </li>
                 <?php
		}
		?>
    </ul>
</div>


<div id="cln_10"></div>
<p><em>Please contact us if you wish to use our pictures at a higher resolution for fundraising or promotional purposes.<br>
                 Do not use without permission.</em></p>
      </div>                          
			</div>
            
            
            
            
            
            
            
        
        
        <div id="tab7" class="tab_content2">        
        <h2>Videos</h2>                            
       <h3>Meet The Childrens of Balika Sadhanam</h3>
       
       <div id="cln"> 
       
       
        

        
        
  
 <div class="wrapper">

  <?php 
		foreach($videos as $row){
		?>
 
<div class="grid_4">

											<div class="padding-grid-2">
												<div class="p2">
													<div class="style-img-2 fleft">
                                                    <a class="lightbox-image" style="opacity:100; margin:0; padding:0;" href="video/<?php echo $row['gallery_image'];?>?width=495&amp;height=275&amp;fileVideo=intro06.flv" data-gal="prettyVideo[prettyVideo]"><img src="uploads/video_thumb/<?php echo $row['gallery_thumb'];?>"  alt=""></a></div>
											  </div>
											</div>
										</div>
                                     
     <?php
	 }
	 ?>                                   
									</div>
        		
				
<!--<ul class="list">
<li class=""><a href="#"><img src="images/video-1.png"><h2>We Do Web</h2> <p>Coming soon</p> </a></li>
<li class=""><a href="#"><img src="images/video-2.png"><h2>We Do Web</h2>  <p>Coming soon</p></a></li>
<li class=""><a href="#"><img src="images/video-3.png"><h2>We Do Web</h2>  <p>Coming soon</p></a></li>
<li class=""><a href="#"><img src="images/video-3.png"><h2>We Do Web</h2>  <p>Coming soon</p></a></li>

</ul>-->
     </div>                       
      </div>
</div>
						</div>
					</li>
                    <li>
						<a href="images/Specials.jpg">Contact</a>
						<div class="ac_subitem">
							<span class="ac_close"></span>
							<h2>Contact</h2>
							<h3>How To Get In Touch With Balika Sadhanam</h3>
                            
  <div id="contact">                          
<form method="post" action="contact_process.php" onSubmit="return contact_validation()">
<p>Your Name : </p>
<input class="contact" type="text"   name="name" id="name" />
<p>Your Email :  </p>
<input class="contact" type="text" name="email" id="email" />
<p>Message :  </p>
<textarea id="message" name="message" class="contact"></textarea>
<input type="submit" value="Send Message" name="Submit" class="send">
</form>  
            </div>    
            
            
            <div class="span_l" style="width:150px;">
            <p style="color:#000000;">Balika Sadhanam.</p>
            <p>Vettekkara(po)</p>
            <p>kadampazhipuram, Palakkad</p>
            <p>Pin - 678633</p>
            
            <p style="color:#000000;">Telephone</p>
            <p>+91 4662260735</p>
            
            <p style="color:#000000;">Email</p>
            <p>email@balikasadhanam.org</p>
            </div>
            
            <div class="span_l" style="width:160px;">
            <p style="color:#000000;">Online</p>
            <p style="color:#000000;">Twitter (@balika sadhanam)</p>
            <p style="color:#000000;">Facebook</p>
            </div>
						</div>
					</li>
				</ul>
			</div>
</div>
		<div class="ac_footer">
			<span class="left"><img src="images/copy.png"> 2012 Balika Sadhanam. All rights reserved. | Site By<a href="http://www.cyberlegendz.com/"> Cyberlegendz</a></span>
            	<span class="left_2"> Login: <a href="#login-box" class="login-window"> Webmaster</a> | <a href="http://www.cyberlegendz.com:2095/horde/login.php">Webmail</a></span>
		</div>
		<!-- The JavaScript -->
		
		<script type="text/javascript">
			$(function() {
				var $ac_background	= $('#ac_background'),
				$ac_bgimage		= $ac_background.find('.ac_bgimage'),
				$ac_loading		= $ac_background.find('.ac_loading'),
				
				$ac_content		= $('#ac_content'),
				$title			= $ac_content.find('h1'),
				$menu			= $ac_content.find('.ac_menu'),
				$mainNav		= $menu.find('ul:first'),
				$menuItems		= $mainNav.children('li'),
				totalItems		= $menuItems.length,
				$ItemImages		= new Array();
				
				/* 
				for this menu, we will preload all the images. 
				let's add all the image sources to an array,
				including the bg image
				*/
				$menuItems.each(function(i) {
					$ItemImages.push($(this).children('a:first').attr('href'));
				});
				$ItemImages.push($ac_bgimage.attr('src'));
					  
				
				var Menu 			= (function(){
					var init				= function() {
						loadPage();
						initWindowEvent();
					},
					loadPage			= function() {
						/*
							1- loads the bg image and all the item images;
							2- shows the bg image;
							3- shows / slides out the menu;
							4- shows the menu items;
							5- initializes the menu items events
						 */
						$ac_loading.show();//show loading status image
						$.when(loadImages()).done(function(){
							$.when(showBGImage()).done(function(){
								//hide the loading status image
								$ac_loading.hide();
								$.when(slideOutMenu()).done(function(){
										$.when(toggleMenuItems('up')).done(function(){
										initEventsSubMenu();
									});
								});
							});
						});
					},
					showBGImage			= function() {
						return $.Deferred(
						function(dfd) {
							//adjusts the dimensions of the image to fit the screen
							adjustImageSize($ac_bgimage);
							$ac_bgimage.fadeIn(1000, dfd.resolve);
						}
					).promise();
					},
					slideOutMenu		= function() {
						/* calculate new width for the menu */
						var new_w	= $(window).width() - $title.outerWidth(true);
						return $.Deferred(
						function(dfd) {
							//slides out the menu
							$menu.stop()
							.animate({
								width	: new_w + 'px'
							}, 700, dfd.resolve);
						}
					).promise();
					},
						/* shows / hides the menu items */
						toggleMenuItems		= function(dir) {
						return $.Deferred(
						function(dfd) {
							/*
							slides in / out the items. 
							different animation time for each one.
							*/
							$menuItems.each(function(i) {
										var $el_title	= $(this).children('a:first'),
											marginTop, opacity, easing;
										if(dir === 'up'){
											marginTop	= '0px';
											opacity		= 1;
											easing		= 'easeOutBack';
										}
										else if(dir === 'down'){
											marginTop	= '60px';
											opacity		= 0;
											easing		= 'easeInBack';
						}
								$el_title.stop()
								.animate({
													marginTop	: marginTop,
													opacity		: opacity
												 }, 200 + i * 200 , easing, function(){
									if(i === totalItems - 1)
										dfd.resolve();
								});
							});
						}
					).promise();
					},
					initEventsSubMenu	= function() {
						$menuItems.each(function(i) {
							var $item		= $(this), // the <li>
							$el_title	= $item.children('a:first'),
							el_image	= $el_title.attr('href'),
							$sub_menu	= $item.find('.ac_subitem'),
							$ac_close	= $sub_menu.find('.ac_close');
							
							/* user clicks one item : appetizers | main course | desserts | wines | specials */
							$el_title.bind('click.Menu', function(e) {
									$.when(toggleMenuItems('down')).done(function(){
									openSubMenu($item, $sub_menu, el_image);
								});
								return false;
							});
							/* closes the submenu */
							$ac_close.bind('click.Menu', function(e) {
								closeSubMenu($sub_menu);
								return false;
							});
						});
					},
					openSubMenu			= function($item, $sub_menu, el_image) {
						$sub_menu.stop()
						.animate({
							height		: '400px',
							marginTop	: '-200px'
						}, 400, function() {
										//the bg image changes
							showItemImage(el_image);
						});
					},
						/* changes the background image */
					showItemImage		= function(source) {
							//if its the current one return
						if($ac_bgimage.attr('src') === source)
							return false;
								
						var $itemImage = $('<img src="'+source+'" alt="Background" class="ac_bgimage"/>');
						$itemImage.insertBefore($ac_bgimage);
						adjustImageSize($itemImage);
						$ac_bgimage.fadeOut(1500, function() {
							$(this).remove();
							$ac_bgimage = $itemImage;
						});
						$itemImage.fadeIn(1500);
					},
					closeSubMenu		= function($sub_menu) {
						$sub_menu.stop()
						.animate({
							height		: '0px',
							marginTop	: '0px'
						}, 400, function() {
							//show items
										toggleMenuItems('up');
						});
					},
						/*
						on window resize, ajust the bg image dimentions,
						and recalculate the menus width
						*/
					initWindowEvent		= function() {
						/* on window resize set the width for the menu */
						$(window).bind('resize.Menu' , function(e) {
							adjustImageSize($ac_bgimage);
							/* calculate new width for the menu */
							var new_w	= $(window).width() - $title.outerWidth(true);
							$menu.css('width', new_w + 'px');
						});
					},
						/* makes an image "fullscreen" and centered */
					adjustImageSize		= function($img) {
						var w_w	= $(window).width(),
						w_h	= $(window).height(),
						r_w	= w_h / w_w,
						i_w	= $img.width(),
						i_h	= $img.height(),
						r_i	= i_h / i_w,
						new_w,new_h,
						new_left,new_top;
							
						if(r_w > r_i){
							new_h	= w_h;
							new_w	= w_h / r_i;
						}
						else{
							new_h	= w_w * r_i;
							new_w	= w_w;
						}
							
						$img.css({
							width	: new_w + 'px',
							height	: new_h + 'px',
							left	: (w_w - new_w) / 2 + 'px',
							top		: (w_h - new_h) / 2 + 'px'
						});
					},
						/* preloads a set of images */
					loadImages			= function() {
						return $.Deferred(
						function(dfd) {
							var total_images 	= $ItemImages.length,
							loaded			= 0;
							for(var i = 0; i < total_images; ++i){
								$('<img/>').load(function() {
									++loaded;
									if(loaded === total_images)
										dfd.resolve();
								}).attr('src' , $ItemImages[i]);
							}
						}
					).promise();
					};
						
					return {
						init : init
					};
				})();
			
				/*
			call the init method of Menu
				 */
				Menu.init();
			});
		</script>
    </body>
</html>