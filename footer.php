<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package GWT
 * @since Government Website Template 2.0
 * eol-89
 */
?>


<!-- agency footer -->
<?php if(is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') ||
is_active_sidebar('footer-4')): ?>
<div id="footer" class="anchor" name="agencyfooter">
  <div id="supplementary" class="row">
    <?php if(is_active_sidebar('footer-1')): ?>
    <div class="<?php govph_displayoptions( 'govph_position_agency_footer' ); ?>" role="complementary">
      <?php do_action( 'before_sidebar' ); ?>
      <?php dynamic_sidebar( 'footer-1' ) ?>
    </div>
    <?php endif; // if active footer-1 ?>

    <?php if(is_active_sidebar('footer-2')): ?>
    <div class="<?php govph_displayoptions( 'govph_position_agency_footer' ); ?>" role="complementary">
      <?php do_action( 'before_sidebar' ); ?>
      <?php dynamic_sidebar( 'footer-2' ) ?>
    </div>
    <?php endif; // if active footer-2 ?>

    <?php if(is_active_sidebar('footer-3')): ?>
    <div class="<?php govph_displayoptions( 'govph_position_agency_footer' ); ?>" role="complementary">
      <?php do_action( 'before_sidebar' ); ?>
      <?php dynamic_sidebar( 'footer-3' ) ?>
    </div>
    <?php endif; // if active footer-3 ?>

    <?php if(is_active_sidebar('footer-4')): ?>
    <div class="<?php govph_displayoptions( 'govph_position_agency_footer' ); ?>" role="complementary">
      <?php do_action( 'before_sidebar' ); ?>
      <?php dynamic_sidebar( 'footer-4' ) ?>
    </div>
    <?php endif; // if active footer-4 ?>
  </div>
</div>
<?php endif; ?>

<!-- standard footer -->
<div id="gwt-standard-footer"></div>
<!-- end standard footer -->

</div><!-- #off-canvass-content -->
</div><!-- #off-canvass-wrapper inner -->
</div><!-- #off-canvass-wrapper -->

<!-- standard footer script -->
<script type="text/javascript">
(function(d, s, id) {
  var js, gjs = d.getElementById('gwt-standard-footer');

  js = d.createElement(s); js.id = id;
  js.src = "//gwhs.i.gov.ph/gwt-footer/footer.js";
  gjs.parentNode.insertBefore(js, gjs);
}(document, 'script', 'gwt-footer-jsdk'));
</script>


<!-- philippine standard time script-->
<script type="text/javascript" id="gwt-pst">
(function(d, eId) {
	var js, gjs = d.getElementById(eId);
	js = d.createElement('script'); js.id = 'gwt-pst-jsdk';
	js.src = "//gwhs.i.gov.ph/pst/gwtpst.js?"+new Date().getTime();
	gjs.parentNode.insertBefore(js, gjs);
}(document, 'gwt-pst'));

var gwtpstReady = function(){
	var firstPst = new gwtpstTime('pst-time');
}
</script>
<!-- end philippine standard time -->

<?php wp_footer(); ?>

<div><a href="#page" id="back-to-top" style="display: inline;"><i class="fa fa-arrow-circle-up fa-2x"></i></a></div>
</body>
</html>