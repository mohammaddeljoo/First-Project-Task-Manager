<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title> Mohammad-deljoo-php</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="page">
  <div class="pageHeader">
    <div class="title">Dashboard</div>
    <div class="userPanel"><i class="fa fa-chevron-down"></i><span class="username">John Doe </span><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/73.jpg" width="40" height="40"/></div>
  </div>
  <div class="main">
    <div class="nav">
      <div class="searchbox">
        <div><i class="fa fa-search"></i>
          <input type="search" placeholder="Search"/>
        </div>
      </div>
      <div class="menu">
        <div class="title">FOLDERS</div>
        <ul class="folder-list">
        <li class="<?= isset($_GET['folder_id']) ? '' : 'active' ?>"> 
        <a href="<?= site_url() ?>" ><i class="fa fa-folder"></i> ALL </a></li>

          <?php foreach ($folders as $folder):?>
                        <!-- میگه این لینک با این پارامترارسال کن به پست و گت و... بعد فولدر با این ایدی  بیا و نشون بده اسمشم که از دیتابیس گرفتی نشون بده -->
            <li>
            <a href="?folder_id=<?=$folder->id ?>"><i class="fa fa-folder"></i><?= $folder->name ?></a>
            <a href="?delete_folder=<?=$folder->id ?>" class="remove"  onclick="return confirm('آیا برای دلیت کردن مطمِن هستید؟؟!!')" > X </a>
          </li>
            <?php endforeach;?>          
        </ul>
        <div>
          <input type="text" id="addFolderInput" style="width: 50%" placeholder="add new folder"/>
          <button id="addFolderButton"> + </button>
        </div>
      </div>
    </div>
    <div class="view">
      <div class="viewHeader">
        <div class="title" style="width: 50%;">

        
          <input type="text" id="addTaskInput" style="width: 100%; margin-left: 3%; line-height: 30px; padding: 3px 10px; border-radius: 3px; border: 2px solid blueviolet;" placeholder="add new tasks">       

        </div>
        <div class="functions">
          <div class="button active">Add New Task</div>
          <div class="button">Completed</div>
          <div class="button inverz"><i class="fa fa-trash-o"></i></div>
        </div>
      </div>
      <div class="content">
        <div class="list">
          <div class="title">Today</div>


          <ul>
          <?php if( sizeof($tasks)): ?>  

          <?php foreach ($tasks as $task):  ?>
            <li class="<?= $task->is_done ? 'checked' : '' ; ?>">
            <i data-taskId="<?= $task->id ?>" class="isDone clickabke fa <?= $task->is_done ? 'fa-check-square-o' : 'fa-square-o' ; ?>"></i>
            <span><?= $task->title ?></span>
              <div class="info">
                <span class='created-at'> Created :  <?= $task->created_at ?></span>
                <a href="?delete_task=<?= $task->id ?>" class="remove" onclick="return confirm('آیا برای دلیت کردن مطمِن هستید؟؟!!')"> X </a>
              </div>
            </li>
            <?php endforeach;  ?>
            <?php else: ?>
              <li>No Task Here...</li>
            <?php endif; ?>

          </ul>


        </div>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="<?= BASE_URL ?>assets/js/script.js"></script>

  <script>

    $(document).ready(function(){

      $('.isDone').click(function(e){
        var tid = $(this).attr('data-taskId') //اینو از تگ آی دان شده یا نشده گرفتیم) تسک ای دی رو اینجوری گرفتیم

        $.ajax({
          url: "process/ajaxHandler.php",
          method: "post",
          data: {action:"doneSwitch",taskId :tid},
          success: function(response){
            location.reload();


          }
        });

      });
      ////////////////////////////
      $('#addFolderButton').click(function(e){
        var input = $('input#addFolderInput');
        alert(input.val());
        $.ajax({
          url: "process/ajaxHandler.php",
          method: "post",
          data: {action:"addFolder",folderName:input.val()},
          success: function(response){
            if(response == '1')
            {
              $('<li><a href="#=<?=$folder->id ?>"><i class="fa fa-folder"></i>'+ input.val() +'</a></li>').appendTo('ul.folder-list');
            }
            alert(response);
          }
        });

      });
    ///////////////////

    $('#addTaskInput').on('keypress',function(e) {
        if(e.which == 13) {
          $.ajax({
          url: "process/ajaxHandler.php",
          method: "post",
          data : {action: "addTask",folderId : <?= $_GET['folder_id'] ?? 0 ?> ,taskTitle: $('#addTaskInput').val()},
          success: function(response){
            if(response == '1')
            {
              location.reload();
            }else{
            alert(response);
            }
          }
        });



            


        }
    });

    $('#addTaskInput').focus();
  });    

  </script>

</body>
</html>
