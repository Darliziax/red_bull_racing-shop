<?php

session_unset();
session_destroy();

header('Location: index_.php');
exit;