<div class="row" ng-controller="NotepadController" >
    <div class="col-md-5">
        <div class="panel panel-primary">
            <div class="panel-heading">Chapters
                <span class="pull-right">
                    <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#addChapterModal">Add</button>
                    <button class="btn btn-xs btn-warning"  ng-click="showUpdateChapterDialog();">Update</button>
                    <button class="btn btn-xs btn-danger"  ng-click="showDeleteChapterDialog();">Delete</button>
                    <button class="btn btn-xs btn-danger"  ng-click="customModal('hii','hello');">Modal</button>
                </span>
            </div>
            <div class="panel-body">
                <div class="row well">
                    <span class="">Selected Chapter: {{upChapterName}}</span>
                    <span class="btn btn-primary btn-sm pull-right" ng-click="getApplicationData();"><i class="glyphicon glyphicon-refresh" ></i> Get All</span>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-hover table-striped">
                            <tr ng-repeat="chapter in chapters" ng-click="loadChapter(chapter);" 
                                style="background: {{chapter.color}};color:{{chapter.text_color}};"
                                class="chapterRows"
                                >
                                <td>
                                    {{chapter.chapter_name}}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered table-condensed table-hover table-striped">
                            <tr ng-repeat="note in notes" ng-click="loadNote(note.id);" 
                                style="background: {{note.color}};color:{{note.text_color}};"
                                class="noteRows"
                                >
                                <td>
                                    {{note.note_title}}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-7">
        <span class="pull-right" style="margin-top: 10px;">
            <button class="btn btn-xs btn-primary" id="addNewNote" ng-click="addNewNoteMode();">Add New</button>
            <button class="btn btn-xs btn-warning" id="updateNote" ng-click="showUpdateNoteDialog();">Update</button>
            <button class="btn btn-xs btn-danger" id="deleteNote" ng-click="showDeleteNoteDialog();">Delete</button>
            <button class="btn btn-xs btn-success" id="saveNewNote" data-toggle="modal" data-target="#newNoteModal">Save</button>
            <button class="btn btn-xs btn-danger" id="cancelNewNote" ng-click="nothingSelectedMode();">Cancel</button>
        </span>
        <h2>{{selectedNote.note_title}}</h2>
        <hr/>
        <textarea id="noteTextArea">
            {{selectedNote.note_body}}
        </textarea>
    </div>


    <!--Modals-->
    <!-- Modal -->
    <div id="addChapterModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add new chapter</h4>
                </div>
                <div class="modal-body">
                    <!--Chapter Name: <input type="text" ng-model="newChapterName" class="form-control"/>-->

                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Chapter Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  placeholder=""
                                       value="" ng-model="newChapterName" id="cn">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Chapter Color</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="cp1"
                                       value="#ffffff" ng-model="newChapterColor">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Text Color</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="cp2"
                                       value="#000000" ng-model="newChapterTextColor">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal" ng-click="saveChapter();">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>

        </div>
    </div>


    <div id="updateChapterModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update chapter {{upChapterName}}</h4>
                </div>
                <div class="modal-body">
                    <!--Chapter Name: <input type="text" ng-model="newChapterName" class="form-control"/>-->

                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Chapter Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  placeholder=""
                                       value="{{upChapterName}}" ng-model="upChapterName" id="cn1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Chapter Color</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="cp3"
                                       value="#ffffff" ng-model="upChapterColor">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Text Color</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="cp4"
                                       value="#000000" ng-model="upChapterText">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal" ng-click="updateChapter();">Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>

        </div>
    </div>


    <div id="deleteChapterModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete chapter {{upChapterName}}</h4>
                </div>
                <div class="modal-body">
                    <!--Chapter Name: <input type="text" ng-model="newChapterName" class="form-control"/>-->
                    Are you sure want to delete?


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" ng-click="deleteChapter();">Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>

        </div>
    </div>
    
    <div id="deleteNoteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete note {{selectedNote.note_title}}</h4>
                </div>
                <div class="modal-body">
                    <!--Chapter Name: <input type="text" ng-model="newChapterName" class="form-control"/>-->
                    Are you sure want to delete?


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" ng-click="deleteNote(selectedNote.id);">Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>

        </div>
    </div>
    
    
    <div id="newNoteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add new note</h4>
                </div>
                <div class="modal-body">
                    <!--Chapter Name: <input type="text" ng-model="newChapterName" class="form-control"/>-->

                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Note Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  placeholder=""
                                       value="" id="newNoteName">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Note Color</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" 
                                       value="#ffffff" id="newNoteColor">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Text Color</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" 
                                       value="#000000" id="newNoteTextColor">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal" ng-click="saveNote();">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="nothingSelectedMode();">Cancel</button>
                </div>
            </div>

        </div>
    </div>
    
    
        
    <div id="updateNoteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update note {{selectedNote.note_title}}</h4>
                </div>
                <div class="modal-body">
                    <!--Chapter Name: <input type="text" ng-model="newChapterName" class="form-control"/>-->

                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Note Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  placeholder=""
                                       value="{{selectedNote.note_title}}" id="updatedNoteName">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Note Color</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" 
                                       value="{{selectedNote.color}}" id="updatedNoteColor">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Text Color</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" 
                                       value="{{selectedNote.text_color}}" id="updatedNoteTextColor">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal" ng-click="updateNote();">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="nothingSelectedMode();">Cancel</button>
                </div>
            </div>

        </div>
    </div>

    
        <div id="noChapterSelectedModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Oops!</h4>
                </div>
                <div class="modal-body">
                    You have not selected a chapter yet!
                 </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
                    
                </div>
            </div>

        </div>
    </div>
    
    <div id="noNoteSelectedModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Oops!</h4>
                </div>
                <div class="modal-body">
                    You have not selected a note yet!
                 </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
                    
                </div>
            </div>

        </div>
    </div>
    
    <div id="customModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="customModalTitle">Oops!</h4>
                </div>
                <div class="modal-body" id="customModalBody">
                    Your message appears here!
                 </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
                    
                </div>
            </div>

        </div>
    </div>
    
    
</div>
<script>
    $(document).ready(function () {

        $('#cp1').colorpicker();
        $('#cp2').colorpicker();
        $('#cp3').colorpicker();
        $('#cp4').colorpicker();
        $("#newNoteColor").colorpicker();
        $("#newNoteTextColor").colorpicker();
        $("#updatedNoteColor").colorpicker();
        $("#updatedNoteTextColor").colorpicker();
        
    });
</script>