<?php
 
/*
 * webprepration
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$config = [
'admin_login' => [
            [
                'field' => 'u_email',
                'label' =>'Username required',
                'rules' =>'required|alpha|trim'
            ],
            [
                'field' => 'password',
                'label' =>'Password',
                'rules'=> 'required|trim'
            ]
 ]
];