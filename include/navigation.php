<?php 

$parts = explode('/', $_SERVER["SCRIPT_NAME"]);
$file = $parts[count($parts) - 1];

$HOME_ACTIVE = $file == "index.php" ? 'active' : '';
$ABOUT_ACTIVE = $file == "about.php" ? 'active' : '';
$PROJECT_ACTIVE = $file == "project.php" ? 'active' : '';
$CARRER_ACTIVE = $file == "carrer.php" ? 'active' : '';
$CONTACT_ACTIVE = $file == "contact-us.php" ? 'active' : '';
?>

<nav class="navbar navbar-expand-lg navbar-light py-3">
        <div class="container">
            <a href="./index.php" class="navbar-brand">
            <img src="images/sv_logo_icon-1 1.svg" alt="sv" />
          </a>

          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navmenu"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"> <a href="./index.php" class="nav-link <?php echo $HOME_ACTIVE; ?>">HOME</a> </li>
                <li class="nav-item"> <a href="./about.php" class="nav-link <?php echo $ABOUT_ACTIVE; ?>">ABOUT US</a> </li>
                <li class="nav-item"> <a href="./project.php" class="nav-link <?php echo $PROJECT_ACTIVE; ?>">PROJECTS</a> </li>
                <li class="nav-item"> <a href="./carrer.php" class="nav-link <?php echo $CARRER_ACTIVE; ?>">CAREER</a> </li>
                <li class="nav-item"> <a href="./contact-us.php" class="nav-link <?php echo $CONTACT_ACTIVE; ?>">CONTACT</a> </li>
                <li class="nav-item"><button class="ani-b" data-bs-toggle="modal" data-bs-target="#form-modal">
                            <span> For Enquire<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 36.1 25.8" enable-background="new 0 0 36.1 25.8"
                                xml:space="preserve">
                                <g>
                                            <line fill="none" stroke="#FFFFFF" stroke-width="3" stroke-miterlimit="10"
                                                x1="0" y1="12.9" x2="34" y2="12.9"></line>
                                            <polyline fill="none" stroke="#FFFFFF" stroke-width="3"
                                                stroke-miterlimit="10" points="22.2,1.1 34,12.9 22.2,24.7   ">
                                            </polyline>
                                        </g>
                                    </svg></span>
                            </button>
                        </li>
            </ul>
          </div>
        </div>
      </nav>

