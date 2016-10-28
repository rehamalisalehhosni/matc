<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
   include "include/classes_header.php";
?>

<html>
    <head>
        <title>Match</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="Assets/css/style.css" />
        <link rel="stylesheet" type="text/css" href="Assets/font-awesome-4.5/css/font-awesome.min.css" />
        <script type="text/javascript" src="Assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="Assets/js/jquery-1.11.2.js"></script>
    </head>
    <body>
        <header>
            <div class="container">
                <div class="pull-left"><img src="Assets/img/logo.png" /></div>
                <div class="pull-right">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li><a href="index.php">Add Team </a></li>
                                    <li><a href="teams.php">Teams</a></li>
                                    <li><a href="score.php">Add score</a></li>
                                    <li><a href="showscore.php">Show score</a></li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
            </div>
        </header>
        <div class="container home">
