<?php

$todos = [];
if(file_exists('todo2.txt')){
    $file = file_get_contents('todo2.txt');
    $todos = unserialize($file);
}

if(isset($_POST['todo'])){
    $data = $_POST['todo'];
    $todos[] =[
        'todo' => $data,
        'status' => 0
    ];
    saveData($todos);
}

if(isset($_GET['status'])){
    $todos[$_GET['key']]['status'] = $_GET['status'];
    saveData($todos);
}

if(isset($_GET['hapus'])){
    unset($todos[$_GET['key']]);
    saveData($todos);
}


function saveData($todos){
    file_put_contents('todo2.txt', serialize($todos));
    header ('Location:index.php');
}
// print_r($todos);

?>







<h1>Todo App</h1>

<form method="POST">
    <label> Apa kegiatanmu hari ini?</label>
    <input type="text" name="todo">
    <button type ="submit">Simpan</button>
</form>


<ul>
    <?php foreach ($todos as $key => $value): ?>
    <li>
    <input type="checkbox" name="todo" onclick="window.location.href='index.php?status=<?php echo ($value ['status'] == 1)? '0':'1'; ?>&key=<?php echo $key;?>'" <?php if($value['status']==1)echo 'checked'?>>

        <label>
            <?php
                if($value['status'] == 1)
                     echo '<del>' .$value['todo']. '</del>';
                else
                     echo $value["todo"];
            ?>
        </label>
        <a href="index.php?hapus=1&key=<?php echo $key;?>" onclick= "return confirm('Apakah kamu yakin akan menghapus todo ini?')"> hapus</a>
    </li>

    <?php endforeach; ?>
</ul>