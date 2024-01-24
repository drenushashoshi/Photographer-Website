<?php
function printStory($title, $text, $src){
    echo '<div class="blogs">
            <img src="' . $src . '"/>
            <div class="Stories">
                <h2>' . $title . '</h2><br>
                <p>' . $text . '</p>
            </div>
        </div>';
}

function printRecentWork($src, $description,$date){
    echo '<div class="foto">
            <img src="' .$src. '"/>
            <div class="description">
                <p>' . $description. '</p>
                <p>' . $date . '</p>
            </div>
        </div>';
}

function printSaying($they, $says, $srcc){
    echo '<div class="WhatTheySay">
            <div class="teksti">
                <h3>' . $they . '</h3><br>
                <p>' . $says . '</p>
            </div>
            <img src="' . $srcc . '"/>
        </div>';
}
?>