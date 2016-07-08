


var app = angular.module('myapp', []);

app.controller('NotepadController', ['$scope', '$http', function ($scope, $http) {


        $scope.newChapterColor = '#1A9893';
        $scope.newChapterName = 'New Chapter';
        $scope.newChapterTextColor = '#FEFEFE';

        $scope.upChapterName = '';
        $scope.upChapterColor = '';
        $scope.upChapterText = '';
        $scope.upChapterId = undefined;

        $scope.isChapterExist = function (chapterName) {
            var exist = false;
            for (c in $scope.chapters) {
                var item = $scope.chapters[c];
                if (item.chapter_name == chapterName) {
                    exist = true;
                }
            }
            return exist;
        }

        $scope.isNoteExist = function (noteName) {
            var exist = false;
            for (c in $scope.notes) {
                var item = $scope.notes[c];
                if (item.note_title == noteName) {
                    exist = true;
                }
            }
            return exist;
        }

        $scope.selectedNote = {
            id: undefined,
            note_body: '',
            note_title: 'No note selected'
        };
        $scope.selectedChapter = {
            chapter_id: 0,
            chapter_title: '',
            chapter_color: '',
            text_color: '',
        };

        $scope.getApplicationData = function () {
            $http.get(APPLICATION_DATA_URL).success(function (data) {
                $scope.chapters = data.chapters;
                $scope.notes = data.notes;
                console.log(data);
                $scope.upChapterName = "No chapter Selected!"
                $scope.upChapterId = undefined;

                $scope.selectedNote = {
                    id: undefined,
                    note_body: '',
                    note_title: 'No note selected'
                };
            });
        }

        $scope.loadNote = function (noteId) {
            console.log(GET_NOTE_URL + '/' + noteId);
            $http.get(GET_NOTE_URL + '/' + noteId).success(function (data) {
                $scope.selectedNote = data[0];

                console.log($scope.selectedNote);
                CKEDITOR.instances['noteTextArea'].setData($scope.selectedNote.note_body);
            });
            $scope.updateNoteMode();
        }
        $scope.deleteNote = function (noteId) {
            console.log("Deleting note = noteId = " + noteId);
            $http({
                method: 'POST',
                url: DELETE_NOTE_URL,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                transformRequest: function (obj) {
                    var str = [];
                    for (var p in obj)
                        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                    return str.join("&");
                },
                data: {
                    note_id: noteId
                }
            }).success(function () {
                $scope.getApplicationData();
                $scope.nothingSelectedMode();
                CKEDITOR.instances['noteTextArea'].setData('');
            });

        }

        $scope.loadChapter = function (chapter) {
            $scope.nothingSelectedMode();
            console.log("chapter = ");
            console.log(chapter);
            console.log(GET_CHAPTER_NOTES_URL + '/' + chapter.id);
            $http.get(GET_CHAPTER_NOTES_URL + '/' + chapter.id).success(function (data) {
                console.log(data);
                $scope.notes = data;
                $scope.selectedNote = {
                    note_body: '',
                    note_title: 'No note selected'
                };
//                $scope.selectedChapter = {
//                    chapter_id: chapter.id,
//                    chapter_title: chapter.chapter_title,
//                    chapter_color: chapter.color,
//                    text_color: chapter.text_color,
//                };

                $scope.upChapterName = chapter.chapter_name;
                $scope.upChapterColor = chapter.color;
                $scope.upChapterText = chapter.text_color;
                $scope.upChapterId = chapter.id;

                $("#cp3").val(chapter.color);
                $("#cp4").val(chapter.text_color);
                $("#cn1").val(chapter.text_color);

                CKEDITOR.instances['noteTextArea'].setData($scope.selectedNote.note_body);
            });
            
        }

        $scope.saveChapter = function () {

            console.log("save chapter getting called...");
            console.log("chapter name = " + $scope.newChapterName + "\
                \n chapter color = " + $scope.newChapterColor + "\n chapter text = " + $scope.newChapterTextColor);

            var a = $("#cn").val();
            var b = $("#cp1").val();
            var c = $("#cp2").val();
            console.log("a = " + a + " b = " + b + " c= " + c);

            if ($scope.isChapterExist(a)) {
                $scope.customModal("Oops!", "A chapter with this name already exist!");
            } else {
                $http({
                    method: 'POST',
                    url: ADD_NEW_CHAPTER_URL,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    transformRequest: function (obj) {
                        var str = [];
                        for (var p in obj)
                            str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                        return str.join("&");
                    },
                    data: {
                        chapter_name: a,
                        chapter_color: b,
                        chapter_text_color: c,
                        action: 'add'
                    }
                }).success(function () {
                    $scope.getApplicationData();
                });
            }


        }

        $scope.updateChapter = function () {
            console.log("update chapter getting called...");
            console.log("chapter id = " + $scope.upChapterId + "\nchapter name = " + $scope.upChapterName + "\
                \n chapter color = " + $scope.upChapterColor + "\n chapter text = " + $scope.upChapterText);

            var a = $("#cn1").val();
            var b = $("#cp3").val();
            var c = $("#cp4").val();
            console.log("a = " + a + " b = " + b + " c= " + c);


            $http({
                method: 'POST',
                url: UPDATE_CHAPTER_URL,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                transformRequest: function (obj) {
                    var str = [];
                    for (var p in obj)
                        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                    return str.join("&");
                },
                data: {
                    chapter_id: $scope.upChapterId,
                    chapter_name: a,
                    chapter_color: b,
                    chapter_text_color: c,
                    action: 'update'
                }
            }).success(function () {
                $scope.getApplicationData();
            });

        }

        $scope.deleteChapter = function () {
            var chapterId = $scope.upChapterId;
            console.log("chapter id to delete = " + chapterId);

            $http({
                method: 'POST',
                url: DELETE_CHAPTER_URL,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                transformRequest: function (obj) {
                    var str = [];
                    for (var p in obj)
                        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                    return str.join("&");
                },
                data: {
                    chapter_id: chapterId,
                }
            }).success(function () {
                $scope.getApplicationData();
            });

        }

        $scope.saveNote = function () {
            var a = $("#newNoteName").val();
            var b = $("#newNoteColor").val();
            var c = $("#newNoteTextColor").val();

            var chapterId = $scope.upChapterId;
            var noteData = CKEDITOR.instances['noteTextArea'].getData();

            console.log(a + " " + b + " " + c + " " + chapterId + " " + noteData);

            if ($scope.isNoteExist(a)) {
                $scope.customModal("Oops!", "A note with this name already exist!");
            } else {

                $http({
                    method: 'POST',
                    url: ADD_NOTE_URL,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    transformRequest: function (obj) {
                        var str = [];
                        for (var p in obj)
                            str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                        return str.join("&");
                    },
                    data: {
                        action: 'add',
                        chapter_id: chapterId,
                        note_title: a,
                        note_body: noteData,
                        note_color: b,
                        note_text_color: c
                    }
                }).success(function () {
                    $scope.getApplicationData();
                    $scope.nothingSelectedMode();
                });

            }
        }

        $scope.updateNote = function () {
            var a = $("#updatedNoteName").val();
            var b = $("#updatedNoteColor").val();
            var c = $("#updatedNoteTextColor").val();

            var chapterId = $scope.upChapterId;
            var noteData = CKEDITOR.instances['noteTextArea'].getData();
            var selectedNoteId = $scope.selectedNote.id;

            console.log(a + " " + b + " " + c + " " + chapterId + " " + noteData);

            $http({
                method: 'POST',
                url: UPDATE_NOTE_URL,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                transformRequest: function (obj) {
                    var str = [];
                    for (var p in obj)
                        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                    return str.join("&");
                },
                data: {
                    action: 'update',
                    note_id: selectedNoteId,
                    chapter_id: chapterId,
                    note_title: a,
                    note_body: noteData,
                    note_color: b,
                    note_text_color: c
                }
            }).success(function () {
                $scope.getApplicationData();
                $scope.nothingSelectedMode();
            });
        }

        $scope.addNewNoteMode = function () {
            var addNewButton = $("#addNewNote");
            var updateButton = $("#updateNote");
            var deleteButton = $("#deleteNote");
            var cancelButton = $("#cancelNewNote");
            var saveButton = $("#saveNewNote");

            addNewButton.hide();
            updateButton.hide();
            deleteButton.hide();

            cancelButton.show();
            saveButton.show();

            $scope.selectedNote = {
                note_body: '',
                note_title: 'New Note'
            };



            CKEDITOR.instances['noteTextArea'].setData($scope.selectedNote.note_body);
            //$('#newNoteModal').modal('show');
        }

        $scope.updateNoteMode = function () {
            $scope.hideAllButtons();
            var addNewButton = $("#addNewNote");
            var updateButton = $("#updateNote");
            var deleteButton = $("#deleteNote");
            addNewButton.show();
            updateButton.show();
            deleteButton.show();
        }
        $scope.nothingSelectedMode = function () {
            $scope.hideAllButtons();
            var addNewButton = $("#addNewNote");
            addNewButton.show();

        }

        $scope.hideAllButtons = function () {
            var addNewButton = $("#addNewNote");
            var updateButton = $("#updateNote");
            var deleteButton = $("#deleteNote");
            var cancelButton = $("#cancelNewNote");
            var saveButton = $("#saveNewNote");

            addNewButton.hide();
            updateButton.hide();
            deleteButton.hide();

            cancelButton.hide();
            saveButton.hide();

        }

        $scope.showUpdateChapterDialog = function () {
            if ($scope.upChapterId == undefined) {
                $('#noChapterSelectedModal').modal('show');
            } else {
                $('#updateChapterModal').modal('show');
            }
        }

        $scope.showDeleteChapterDialog = function () {
            if ($scope.upChapterId == undefined) {
                $('#noChapterSelectedModal').modal('show');
            } else {
                $('#deleteChapterModal').modal('show');
            }
        }
        $scope.showDeleteNoteDialog = function () {
            if ($scope.selectedNote.id == undefined) {
                $('#noNoteSelectedModal').modal('show');
            } else {
                $('#deleteNoteModal').modal('show');
            }
        }
        $scope.showUpdateNoteDialog = function () {
            if ($scope.selectedNote.id == undefined) {
                $('#noNoteSelectedModal').modal('show');
            } else if ($scope.upChapterId == undefined) {
                $('#noChapterSelectedModal').modal('show');
            } else {
                $('#updateNoteModal').modal('show');
            }
        }

        $scope.customModal = function (title, message) {
            $("#customModalTitle").html(title);
            $("#customModalBody").html(message);
            $('#customModal').modal('show');
        }

        $scope.nothingSelectedMode();
        $scope.getApplicationData();

    }]);



