<html ng-app="myapp">
    <head>
        <link rel="stylesheet" href="#"/>
        <link rel="stylesheet" href="<?php echo base_url();?>/assets/bootstrap3/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="<?php echo base_url();?>/assets/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css"/>
        <link rel="stylesheet" href="<?php echo base_url();?>/assets/mystyles/style.css"/>
        <script src="<?php echo base_url();?>/assets/jquery/jquery-2.1.1.min.js"></script>
        <script src="<?php echo base_url();?>/assets/angularjs/angular.min.js"></script>
        <script src="<?php echo base_url();?>/assets/bootstrap3/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="<?php echo base_url();?>/assets/myscript/app.js"></script>
        <script src="http://cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
        <script>
         APPLICATION_DATA_URL = '<?php echo site_url('Notepad/getApplicationData');?>';
         GET_NOTE_URL =  '<?php echo site_url('Notepad/getNote');?>';
         GET_CHAPTER_NOTES_URL = '<?php echo site_url('Notepad/getChapterNotes');?>';
         ADD_NEW_CHAPTER_URL = '<?php echo site_url('Notepad/addUpdateChapter');?>';
         UPDATE_CHAPTER_URL = '<?php echo site_url('Notepad/addUpdateChapter');?>';
         DELETE_CHAPTER_URL = '<?php echo site_url('Notepad/deleteChapter');?>';
         ADD_NOTE_URL = '<?php echo site_url('Notepad/addUpdateNote');?>';
         UPDATE_NOTE_URL = '<?php echo site_url('Notepad/addUpdateNote');?>';
         DELETE_NOTE_URL = '<?php echo site_url('Notepad/deleteNote');?>';
        </script>
    </head>
    <body>
        <div class="container-fluid">