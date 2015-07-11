<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 2015/06/13
 * Time: 15:49
 */
?>
<html>

<FRAMESET cols="50%, *">
    <frame src="<?php echo htmlspecialchars($_GET["Link1"]); ?>" frameborder="0" name="frame_left" />
    <frame src="<?php echo htmlspecialchars($_GET["Link2"]); ?>" frameborder="0" name="frame_right" />
</FRAMESET>
</html>