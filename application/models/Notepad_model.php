<?php


class Notepad_model extends CI_Model{
    var $noteTable = 'notes';
    var $chapterTable = 'chapters';
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    /*
     * Getters
     */
    public function getChapters($user,$flag){
        $query = $this->db->get_where($this->chapterTable,array(
            'user'=>$user,
            'flag'=>$flag
        ));
        return $query->result();
    }
    public function getChapterNotes($user,$chapterId,$flag){
        $query = $this->db->get_where($this->noteTable,array(
            'user'=>$user,
            'chapter_id'=>$chapterId,
            'flag'=>$flag
        ));
        return $query->result();
    }
    public function getNote($user,$noteId,$flag){
        $query = $this->db->get_where($this->noteTable,array(
            'user'=>$user,
            'id'=>$noteId,
            'flag'=>$flag
        ));
        return $query->result();
    }
    public function getNotes($user,$flag){
        $query = $this->db->get_where($this->noteTable,array(
            'user'=>$user,
            'flag'=>$flag
        ));
        return $query->result();
    }
    
    /*
     * Creators
     */
    public function createChapter($chapter){
        $this->db->insert($this->chapterTable,$chapter);
    }
    public function createNote($note){
        $this->db->insert($this->noteTable,$note);
    }
    
    /*
     * Updaters
     */
    public function updateChapter($user,$chapter,$chapterId){
        $this->db->update($this->chapterTable,$chapter,array(
            'user'=>$user,
            'id'=>$chapterId
        ));
    }
    public function updateNote($user,$note,$noteId){
        $this->db->update($this->noteTable,$note,array(
            'user'=>$user,
            'id'=>$noteId
        ));
    }
    
    /*
     * Deleters
     */
    public function deleteChapter($user,$chapterId){
        $this->db->update($this->chapterTable,array(
            'flag'=>0
        ),array(
            'user'=>$user,
            'id'=>$chapterId
        ));
        
        $this->deleteAllNotesInChapter($user,$chapterId);
    }
    public function deleteAllNotesInChapter($user,$chapterId){
        $this->db->update($this->noteTable,array(
            'flag'=>0
        ),array(
            'user'=>$user,
            'chapter_id'=>$chapterId
        ));
    }
    public function deleteNote($user,$noteId){
        $this->db->update($this->noteTable,array(
            'flag'=>0
        ),array(
            'user'=>$user,
            'id'=>$noteId
        ));
    }
}
