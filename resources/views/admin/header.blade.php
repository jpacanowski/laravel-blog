<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />

    <title>MicroCMS - Admin panel</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="128x128" href="favicon.png" />

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/admin.css" />
  </head>

  <body>

    <header class="main-header">
      <h1>Micro<span>CMS</span></h1>
      <!-- <nav class="menubar">
        <ul>
          <li class="dropdown">
            <span class="user_menu"><span class="user_fullname">{{ 'getUsername()' }}</span><i class="fa fa-power-off" aria-hidden="true"></i></span>
            <ul>
              <li><a href="/profile"><i class="fa fa-user" aria-hidden="true"></i>Profile</a></li>
              <li>
                <form class="form_logout" method="post" action="?url=users/logout">
                  <a href="?url=users/logout" onclick="document.getElementsByClassName('form_logout')[0].submit(); return false;"><i class="fa fa-power-off" aria-hidden="true"></i>Logout</a>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </nav> -->
      <nav>
        {{ 'username' }}
        <a href="/"><i class="fa fa-home" aria-hidden="true"></i></a>
        <a href="/admin/profile"><i class="fa fa-user" aria-hidden="true"></i></a>
        <a href="/admin/logout"><i class="fa fa-power-off" aria-hidden="true"></i></a>
      </nav>
    </header>
