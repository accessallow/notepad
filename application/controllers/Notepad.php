<?php

class Notepad extends CI_Controller {

    var $aliveFlag = 1;

    public function __construct() {
        parent::__construct();
        $this->load->model('Notepad_model', 'nmodel');
    }

    public function index() {
        $this->load->view('template/header');
        $this->load->view('dashboard/frontend');
        $this->load->view('template/footer');
    }

    /*
     * Get all the chapters,notes at one go
     */

    public function getApplicationData() {
        $chapters = $this->nmodel->getChapters('pankaj', $this->aliveFlag);
        $notes = $this->nmodel->getNotes('pankaj', $this->aliveFlag);
        $data = array(
            'chapters' => $chapters,
            'notes' => $notes
        );
        $this->output_json($this, $data);
    }

    public function addUpdateChapter() {
        if ($this->input->post('chapter_name')) {
            $chapter_name = $this->input->post('chapter_name');
            $chapter_color = $this->input->post('chapter_color');
            $chapter_text_color = $this->input->post('chapter_text_color');
            $action = $this->input->post('action');
            
            $chapter = array(
                'chapter_name'=>$chapter_name,
                'user'=>$this->getUser(),
                'color'=>$chapter_color,
                'text_color'=> $chapter_text_color,
                'flag'=>$this->aliveFlag
            );
            
            if(strcmp($action, 'add')==0){
                $this->nmodel->createChapter($chapter);
            }else if(strcmp($action, 'update')==0){
                $chapterId = $this->input->post('chapter_id');
                $this->nmodel->updateChapter($this->getUser(),$chapter,$chapterId);
            }
        }
    }

    public function addUpdateNote() {
        if ($this->input->post('note_title')) {
            $note_title = $this->input->post('note_title');
            $note_body = $this->input->post('note_body');
            $chapter_id = $this->input->post('chapter_id');
            $note_color = $this->input->post('note_color');
            $note_text_color = $this->input->post('note_text_color');
            $action = $this->input->post('action');
            
            $note = array(
                'note_title'=>$note_title,
                'note_body'=>$note_body,
                'user'=>$this->getUser(),
                'chapter_id'=>$chapter_id,
                'color'=>$note_color,
                'text_color'=>$note_text_color,
                'flag'=>$this->aliveFlag
            );
            
            if(strcmp($action, 'add')==0){
                $this->nmodel->createNote($note);
            }else if(strcmp($action, 'update')==0){
                $noteId = $this->input->post('note_id');
                $this->nmodel->updateNote($this->getUser(),$note,$noteId);
            }
        }
    }

    /*
     * Get a note specified by id : noteId
     */

    public function getNote($noteId) {
        $note = $this->nmodel->getNote('pankaj', $noteId, $this->aliveFlag);
        $this->output_json($this, $note);
    }

    /*
     * Get a chapter specified id: chapterId
     */

    public function getChapterNotes($chapterId) {
        $notes = $this->nmodel->getChapterNotes('pankaj', $chapterId, $this->aliveFlag);
        $this->output_json($this, $notes);
    }

    /*
     * Get all the chapters
     */

    public function getChapters() {
        $chapters = $this->nmodel->getChapters('pankaj', $this->aliveFlag);
        $this->output_json($this, $chapters);
    }
    
    public function deleteChapter(){
        if($this->input->post('chapter_id')){
            $chapters = $this->nmodel->deleteChapter($this->getUser(),$this->input->post('chapter_id'));
        }
    }
    public function deleteNote(){
        if($this->input->post('note_id')){
            $this->nmodel->deleteNote($this->getUser(),$this->input->post('note_id'));
        }
    }

    /**
     * Utility
     */
    function output_json($context, $data) {
        $context->output->set_content_type('application/json')
                ->set_output(json_encode($data));
    }
    function getUser(){
        return 'pankaj';
    }
}
