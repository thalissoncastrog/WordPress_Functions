<?php

//changing default login icon wordpress
function change_login_logo()
{
    echo "
    <style>
    body.login #login h1 a {
    background: url('https://grupopilarengenharia.com.br/wp-content/uploads/2022/02/PAPELARIA-PILAR-CC-1024x382-1.png') no-repeat scroll center top transparent;
    height: 90px;
    width: 250px;
    }
    </style>
    ";
}

add_action("login_head", "change_login_logo");


