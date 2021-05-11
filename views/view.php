<?php
    class View{
        public function create_post_view($row){
            $html = "";
            $html .= "<!-- Title -->";
            $html .= "<h1>" . $row["Title"] . "</h1>";
            $html .= "<!-- Author -->";
            $html .= '<p class="lead">';
            $html .= 'by <small>' . $row["Username"] . '</small></p><hr>';
            $html .= "<!-- Date/Time -->";
            $html .= '<p><i class="fas fa-clock"></i> '; 
            $html .= 'Posted on ' . $row["DateTime"] . '</p><hr>';
            $html .= '<!-- Preview Image -->'; 
            $html .= '<img class="img-responsive"'; 
            $html .= 'src="' . $row["Imagepath"] . '"alt=""><hr>';
            $html .= '<!-- Post Content -->';
            $html .= '<p class="lead">' . $row["Description"] . '</p>';
            $html .= '<p>' . $row["Content"] .'</p><hr>';
            return $html;
        }

        public function create_post_section($rows){
            $html = "";
            if(count($rows)){
                foreach($rows as $row){
                    $html .= '<div class="Post">';
                    $html .= '<h2>'. $row['Title'] . '</h2>';
                    $html .= '<p class="lead">';
                    $html .= 'by <small>' . $row['Username'] . '</small></p>';
                    $html .= '<p><i class="fas fa-clock"></i> '; 
                    $html .= 'Posted on ' . $row['DateTime'] . '</p><hr>';
                    $html .= '<img class="img-responsive"'; 
                    $html .= 'src="' . $row["Imagepath"] . '"alt=""><hr>';
                    $html .= '<p>'. $row['Description'] . '</p>';
                    $html .= '<button class="btn btn-primary post" data-id="' . $row['ID_Post'] . '">Read More'; 
                    $html .= '<i class="fas fa-chevron-right"></i></button>';
                    $html .= '<hr></div>';
                }
            }else{
                $html .= '<p class="no-comment">There are no post to show</p>';
            }
            return $html;
        }

        public function create_pager($page, $total_pages){
            $html = "";
            $html .= "<!-- Pager -->";
            $html .= '<ul class="pager">';
            $html .= '<li class="previous">';
            if($page+1 <= $total_pages){
                $html .= '<a class="pag" data-id="' . $page+1 . '" href="#">&larr; Older</a>';
            }else{
                $html .= '<a data-id="' . $page+1 . '" href="#">&larr; Older</a>';
            }
            $html .= '</li>';
            $html .= '<li class="next">';
            if($page-1 > 0){
                $html .= '<a class="pag" data-id="' . $page-1 . '" href="#">Newer &rarr;</a>';
            }else{
                $html .= '<a data-id="' . $page-1 . '" href="#">Newer &rarr;</a>';
            }
            $html .= '</li>';
            $html .= '</ul>';
            return $html;
        }

        public function create_comment_section($rows){
            $html = "";
            if(count($rows)){
                foreach($rows as $row){
                    $html .= '<!-- Comment -->
                    <div class="media">
                        <span class="pull-left">
                            <i class="fas fa-user-circle i-comment"></i>
                        </span>
                        <div class="media-body">
                            <h4 class="media-heading">' . $row['Username'] .
                            '</h4>
                            <p> <small>' . $row['DateTime'] . '</small></p>';
                    $html .= '<p>' . $row['Comment'] . '</p>
                            <div> 
                                <button class="reply" data-id="' . $row['ID_Comment'] . '">
                                    <span><i class="fa fa-reply"></i> reply</span>
                                </button> 
                            </div>';
                    $html .= '<div class="replybox" id="panel' . $row['ID_Comment'] . '" style="display:none">
                                <div class="widgets">
                                    <h5>Reply the Comment: <i class="fas fa-comment-alt"></i></h5>
                                    <form class="reply-form">
                                        <div class="form-group">
                                            <input hidden name="idcomment" value="' . $row['ID_Comment'] . '"></input>
                                            <textarea name="reply" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Comment
                                                <i class="fas fa-plus"></i>                                       
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <br>
                            <div class="reply-section"> %replies' . $row['ID_Comment'] .'%</div>
                        </div>
                    </div>';
                }
            }else{
                $html .= '<p class="no-comment">Be the first to comment</p>';
            }
            return $html;
        }
        public function create_replies_section($rows){
            $html = "";
            if(count($rows)){
                foreach($rows as $row){
                    $html .= '<div class="media">
                            <span class="pull-left">
                                <i class="fas fa-user-circle i-comment"></i>
                            </span>
                            <div class="media-body">
                                <h4 class="media-heading">' . $row['Username'] . '
                                </h4>
                                <p> <small> ' . $row['DateTime'] . '</small></p>
                                <p>' . $row['Reply'] . '
                                </p>
                            </div>
                        </div>';
                }
            }
            return $html;
        }
        /*
        public function create_table($rows, $page){
            $html = "";
            $i = (((int)$page) * 5) - 4;
            foreach($rows as $row){
                $html .= "<tr>";
                $html .= "<td>" . $i. "</td>";
                $html .= "<td>" . $row["Name"] . "</td>";
                $html .= "<td>" . $row["Email"] .Oqapppppppdfc11111112wnJ "</td>";
                $html .= "<td>" . $row["Address"] . "</td>";
                $html .= "<td>" . $row["Phone"] . "</td>";
                $html .= "<td>";
                $html .= '<a class="edit cursor-pointer" data-id="' .$row["ID"] . '">
                                    <i class="fas fa-pencil-alt" data-toggle="tooltip" 
                                    title="Edit"></i></a>';
                $html .= '<a class="delete cursor-pointer" data-id="' .$row["ID"] . '">
                                    <i class="fas fa-trash" data-toggle="tooltip" 
                                    title="Delete"></i></a>';
                $hml .= "</tr>";
                $i++;
            }
            return $html;
        }

        public function create_showing($total_rows, $total_records){
            $html = "<div class='hint-text'>Showing <b>". $total_rows . "</b> out of 
                        <b>" . $total_records . "</b> entries</div>";
            return $html;
        }

        public function create_pagination($data){
            $html = "";
            $html .= $this->create_showing($data["total_rows"], $data["total_records"]);
            $html .= '<ul class="pagination">'; 1
            for($i=1; $i<=$data["total_pages"]; $i++) {
                if($i == $data["page"]){
                    $html .= "<li id='" .$i. "' class='cursor-pointer page-link active'>
                        <span> " . $i . "</span></li>"; 
                }else{
                    $html .= "<li id='" .$i. "' class='cursor-pointer page-link'>
                        <span> " . $i . "</span></li>";
                }
            }  
            $html .= '</ul>';
            return $html;
        }*/
    }
?>
