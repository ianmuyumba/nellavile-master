<?php
session_start();
$pp_url = 'http://www.gallyapp.com/tf_themes/anan_wp/';

if(isset($_GET['pp_homepage_style']))
{
	$_SESSION['pp_homepage_style'] = $_GET['pp_homepage_style'];
	header( 'Location: '.$pp_url ) ;
	exit;
}

if(isset($_GET['pp_portfolio_style']))
{
	$_SESSION['pp_portfolio_style'] = $_GET['pp_portfolio_style'];
	header( 'Location: '.$pp_url.'?gallery=landscape' ) ;
	exit;
}

header( 'Location: '.$_SERVER['HTTP_REFERER'] ) ;
?>