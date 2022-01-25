<?php
ob_start();
session_start();

if( $_SESSION['level'] >=  5)
{
	echo "Toegang verleend";

}
else
{
	echo "Toegang gewijgerd";
}