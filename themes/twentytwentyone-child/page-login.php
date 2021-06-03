<?php

get_header();
the_title();
?>
<p>bienve</p>
<?php
wp_login_form();
strip_tags(get_the_content());
get_footer();

?>