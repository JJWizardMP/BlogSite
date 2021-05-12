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
    }
?>
