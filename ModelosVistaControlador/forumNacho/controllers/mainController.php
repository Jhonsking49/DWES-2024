<?php
//cargamos el modelo

require_once 'models/User.php';
require_once 'models/UserRepository.php';

require_once 'models/Message.php';
require_once 'models/MessageRepository.php';

require_once 'models/Thread.php';
require_once 'models/ThreadRepository.php';

require_once 'models/Forum.php';
require_once 'models/ForumRepository.php';

session_start();

if (isset($_GET['c'])) {
    require_once('controllers/' . $_GET['c'] . 'Controller.php');
}


$forums = ForumRepository::getForums();
require_once 'views/mainView.phtml';
