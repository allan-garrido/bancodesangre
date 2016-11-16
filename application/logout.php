<?php
session_start ();
unset ( $SESSION ['Usuario'] );
session_destroy ();
header ( 'Location: /' );
?>