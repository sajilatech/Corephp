<div id="left">
<ul class="lbe_list_3">
 <?php if($current_tab=='gallery'){?>
            			<li><a href="createGallery.php?current_tab=gallery">ADD PHOTO</a></li>
                        <li><a href="viewGallery.php?current_tab=gallery">VIEW PHOTOS</a></li>
                        <li><a href="createVideo.php?current_tab=gallery">ADD VIDEO</a></li>
                        <li><a href="viewVideo.php?current_tab=gallery">VIEW VIDEOS</a></li>
             <?php }
			 else if($current_tab=='newsletter'){
			 ?>
            
           
              <li><a href="send_newsletter.php?current_tab=newsletter">SEND NEWSLETTER</a></li>
                <li><a href="viewNewsletter.php?current_tab=newsletter">VIEW SENT NEWSLETTERS</a></li>
             <?php
			 }
			 		
			 		?>
</ul>
</div>