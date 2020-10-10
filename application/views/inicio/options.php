<?php

$stations = $process_model->getProcesByUser($_POST['user']);
$userInfo = $login_model->getUserInfo($_POST['user']);

?>

<style>
	.box {
		background: rgba(44,151,222, 0.90);
		color:#fff;
	}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <ul class="topbar">
        <li style="font-weight: bold;">

            <a class="active" href="#"><?=$userInfo['logged_in']; ?></a>
        </li>

        <li>

            <div id="assign-tasks">ASIGNAR<!--<div--> </div>
        </li>

        <li style="float:right" >

            <div class="close-modal"></div>
        </li>

    </ul>
    
    <div class="options-container">
        
        <div class="options">
            
            <form id="task-form">
            
                <input type="hidden" id="task-user" name="user" value="<?=$_POST['user'] ?>">

                <?php foreach ($stations as $key1 => $station) {
    
                    $processes = $station;
                    $count     = count($processes);
    
                    foreach ($processes as $key2 => $row) {
                    
                        $pendings = $process_model->getPendingsByUser($_POST['user']);
                    ?>  
    
                        <div data-option="<?=$row['id_proceso'] ?>" data-user="<?=$_POST['user'] ?>" data-sname="<?=$key1 ?>" data-pname="<?=$row['nombre_proceso'] ?>" data-station="<?=$row['id_estacion'] ?>" <?=(array_key_exists($row['id_proceso'], $pendings))?'data-cola="'.$pendings[$row['id_proceso']]['id_cola'].'"':'' ?> class="process <?=($count>21)? 'fit-process':'' ?>"><span><?=$row['nombre_proceso'] ?></span>
                            <?php if(array_key_exists($row['id_proceso'], $pendings)) { ?>
                        
                                <div class="pending-indicator"><?=getPendingsByProcess($row['id_proceso']); ?> Cambio Pendiente</div>
                            <?php  }?>
                            
                            <input type="checkbox" name="tasks[]" value="<?=$row['id_proceso'] ?>">
                        </div>
                    <?php 
                    }
                } ?>
            </form>
        </div>
    </div>
