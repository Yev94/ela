<?php

class PanelBuilder{

    public function buildCard($title, $url, $img){
        echo '<div class="col">
        <a class="link-dark text-decoration-none" href="' . DOMAIN . 'panel' . $url . '">
                    <div class="card card-cover overflow-hidden align-self-center card1">
                        <div class="d-flex flex-column h-100 p-2 pt-3 align-self-center align-items-center text-shadow-1">
                            <img src="' . DOMAIN . 'img/'. $img . '" alt="" width="120px">
                            <h4 class="pt-2 display-6 fw-bold text-center">' . $title . '</h4>
                        </div>
                    </div>
                    </a>
                    </div>';
    }
}