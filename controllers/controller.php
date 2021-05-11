<?php
    // directorio actual
    chdir('../controllers');
    require('./../models/post-model.php');
    require('./../views/view.php');
    chdir("../");
    class Controller{
        private $model;
        private $view;
    
        public function __construct(){
            $this->model = new PostModel();
            $this->view = new View();
        }

        public function Close_Connection(){
            $this->model->close();
        }

        public function Add_new_post($data){
            return $this->model->add_post($data);
        }

        public function Update_path_Img($path, $id){
            $this->model->update_path($path, $id);
        }

        public function Create_post($id){
            $row = $this->model->get_post($id);
            $html = $this->view->create_post_view($row);
            return $html;
        }

        public function Create_pagination($page){
            $record_per_page = 3;
            $start_from = ($page - 1)*$record_per_page;
            $limit_rows = $this->model->get_limit_post($start_from, $record_per_page);
            $total_records  = $this->model->count_posts();
            $total_pages = ceil($total_records/$record_per_page);
            $section_post = $this->view->create_post_section($limit_rows);
            $pager = $this->view->create_pager($page, $total_pages);
            return ["section" => $section_post, "pager" => $pager];
        }

        public function Add_new_comment($data){
            $this->model->add_comment($data);
        }

        public function Create_comment_section($id){
            // 1.- Create the view of the comments in a post
            $rows = $this->model->get_comments($id);
            $html = $this->view->Create_comment_section($rows);
            // 2.- Add the replies to every comment in the post
            if(count($rows)){ 
                foreach($rows as $row){
                    $replies = $this->model->get_all_replies($row['ID_Post'], $row['ID_Comment']);
                    $replies_view = $this->view->create_replies_section($replies);
                    $pattern = "%replies" . $row['ID_Comment'] . "%";
                    $html = str_replace($pattern, $replies_view, $html);
                }
            }
            return $html;
        }

        public function Add_new_reply($data){
            $this->model->add_reply($data);
        }

        /*public function Create_post(){

        }*/

        /*
        public function create_view_fulltable(){
            $rows = $this->model->get_all_employees();
            $html = $this->view->create_table($rows, 1);
            return $html;
        }

        public function search_row($id){
            $row = $this->model->search_byid($id);
            return $row;
        }

        public function add_new_record($data){
            $this->model->add_row($data);
            return $this->create_view_fulltable();
        }

        public function update_record($data){
            $this->model->update_row($data);
            return $this->create_view_fulltable();
        }

        public function delete_record($id){
            $this->model->delete_row($id);
            return $this->create_view_fulltable();
        }

        public function filter_by_name($term){
            $record_per_page = 5;
            $rows = $this->model->filter_name($term);
            $total_records = count($rows);
            $total_pages = ceil($total_records/$record_per_page);
            $full_rows = $this->model->get_all_employees();
            $data = [
                "total_rows" => count($rows), 
                "total_records" => count($full_rows),
                "total_pages" => $total_pages,
                "page" => 1,
            ];
            $table = $this->view->create_table($rows, 1);
            $pagination = $this->view->create_pagination($data);
            return ["table" => $table, "pagination" => $pagination];
        }

        public function create_pagination($page){
            $record_per_page = 5;
            $start_from = ($page - 1)*$record_per_page;
            $limit_rows = $this->model->get_limit_employees($start_from, $record_per_page);
            $full_rows = $this->model->get_all_employees();
            $total_records = count($full_rows);
            $total_pages = ceil($total_records/$record_per_page);
            $data = [
                "total_rows" => count($limit_rows), 
                "total_records" => $total_records,
                "total_pages" => $total_pages,
                "page" => $page,
            ];
            $table = $this->view->create_table($limit_rows, $page);
            $pagination = $this->view->create_pagination($data);
            return ["table" => $table, "pagination" => $pagination];
        } */
    }
?>