<?php


class Inicio extends Controller {

    public function index(){

        if (!isset($_SESSION)) {

            session_start();
        }

        $login = $this->loadController('login');

        $login_model = $this->loadModel('LoginModel');

        if($login->isLoged()) {

            echo '<script language="javascript">';
            echo 'window.location.href="' . URL . $_SESSION['area'] . '/"';
            echo '</script>';
           //header("Location:" . URL . $_SESSION['area'].'/');
        } else {

            echo '<script language="javascript">';
            echo 'window.location.href="' . URL . 'login/"';
            echo '</script>';
            //header("Location:" . URL . 'login');
        }
    }

    public function initProcessByUser($userID, $processID) {

        $login_model = $this->loadModel('LoginModel');

        if ($sessions_model->checkSessionByUser($userID)) {

            $sessionId = $_SESSION['teamSession'][$userID]['memberSessionID'];

            $memberProcessID = $processID;

            $restart = $cambio_model->newMemberCambio($userID,$sessionId,$memberProcessID);

            if ($restart) {

                $_SESSION['teamSession'][$_POST['user']]['memberProcessID'] = $processID;

                $sessions_model->putMemberOnTiro($sessionId);

                require 'application/views/tiro/userInterface.php';
            } else {

                echo "<p style='padding:30px;color:red;'>No se pudo guardar la informacion por favor hablale a los de sistemas</p>";
            }
        } else {

            $initMember=$sessions_model->newMemberSession($userID,$processID);

            if ($initMember) {

                $memberSessionID = $_SESSION['teamSession'][$userID]['memberSessionID'];

                $memberProcessID = $_SESSION['teamSession'][$userID]['memberProcessID'];

                $tiro_inserted = $cambio_model->newMemberCambio($userID,$memberSessionID,$memberProcessID);

                if ($tiro_inserted) {

                    echo "usuario iniciado";
                } else {

                    echo "<p style='color:#fff;'>Ocurrio un error porfavor hablale a los de sistemas</p>";
                }
            } else {

                echo "<p style='color:#fff;'>Ocurrio un error porfavor hablale a los de sistemas</p>";
            }
        }
    }


    public function initTeam() {

        if (!isset($_SESSION)) {

            session_start();
        }

        $roles=$_POST['leader'];

        $_SESSION['odt'] = $_POST['odt'];
        $sessions_model->setOdtInSession($_POST['odt']);
        $sessions_model->putTeamOnAjuste();

        foreach ($_POST['workers'] as $worker) {

            $role = $roles[$worker];

            $sessions_model->addMemeberToTeam($worker,$_POST['sesion'],$role);

            if (isset($_SESSION['preparingTasks'][$worker])) {

                $processID = $_SESSION['preparingTasks'][$worker][0];
                $userID = $worker;

                if ($sessions_model->checkSessionByUser($userID)) {

                    $sessionId = $_SESSION['teamSession'][$userID]['memberSessionID'];
                    $memberProcessID = $processID;

                    $restart=$cambio_model->newMemberCambio($userID,$sessionId,$memberProcessID);

                    if ($restart) {

                        $_SESSION['teamSession'][$_POST['user']]['memberProcessID'] = $processID;
                        $sessions_model->putMemberOnTiro($sessionId);

                        require 'application/views/tiro/userInterface.php';
                    } else {

                        echo "<p style='padding:30px;color:red;'>No se pudo guardar la informacion por favor hablale a los de sistemas</p>";
                    }
                } else {

                    $initMember = $sessions_model->newMemberSession($userID,$processID);

                    if ($initMember) {

                        $memberSessionID = $_SESSION['teamSession'][$userID]['memberSessionID'];

                        $memberProcessID = $_SESSION['teamSession'][$userID]['memberProcessID'];

                        $tiro_inserted = $cambio_model->newMemberCambio($userID,$memberSessionID,$memberProcessID);

                        if ($tiro_inserted) {

                        } else {

                            echo "<p style='color:#fff;'>Ocurrio un error porfavor hablale a los de sistemas</p>";
                        }
                    } else {

                        echo "<p style='color:#fff;'>Ocurrio un error porfavor hablale a los de sistemas</p>";
                    }
                }

                //$this->initProcessByUser($worker,$tasks[0]);
            }
        }

        require 'application/views/inicio/odt.php';
    }


    public function assignTasks() {

        if (!isset($_SESSION)) {

            session_start();
        }

        $login_model = $this->loadModel('LoginModel');

        $stations = $process_model->getProcesByUser($_POST['user']);

        require 'application/views/inicio/options.php';
    }


    public function prepareTasks() {

        if (!isset($_SESSION)) {

            session_start();
        }

        $login_model = $this->loadModel('LoginModel');

        $taken = $sessions_model->userIsTaken($_POST['user']);

        $result   =array();
        $assigned =array();

        if (!$taken) {

            foreach ($_POST['tasks'] as $task) {

                $assigned[] = $task;
            }

            $_SESSION['preparingTasks'][$_POST['user']]=$assigned;
            $result['response'] = 'success';
        } else {

            $result['response'] = 'taken';
        }

        echo json_encode($result);
    }


    public function chooseODT() {

        if (!isset($_SESSION)) {

            session_start();
        }

        $login_model = $this->loadModel('LoginModel');

        require 'application/views/inicio/ODT.php';
    }

}
