<?php
namespace Easychat\Controller;

use Easychat\Controller;
use Easychat\Repository;
use Easychat\Repository\UserRepository;
use Easychat\Repository\MessageRepository;

class IndexController extends BaseController
{

	/*
	 index check if logged and render to right page 
	*/
    function index()
    {
        if (isset($_SESSION["user"])) {
            $this->redirectUrl('/index/chatroom');
        }else{
			$this->render('login.view.php');
		}
    }
	function login(){
		$error="";
		if (isset($_POST["uname"]) && $_POST["uname"] != "" && isset($_POST["psw"]) && $_POST["psw"] != "")
		{
			$userRepository = new UserRepository();
            $user = $userRepository->getUserByUsername($_POST["uname"]);
			if($user){
                if(password_verify($_POST["psw"],$user['password'])){
                    $_SESSION['user'] = $user['id'];
                    $data = array('isConnected'=>1);
                    $where = array('id'=>$user['id']);
                    $userRepository->update($data,$where);
                    $this->redirectUrl('/index/chatroom');
                }else{
                    $error = "Failed to login";
                }			
            }else{
                $error = "Failed to login";
            }
		}
        $this->render('login.view.php',array('error'=>$error));
        
	}
	/*
	logout from chatrrom

	*/

    function logout(){
        $error="";
        if(isset($_SESSION['user'])){
            $userRepository = new UserRepository();
            $data = array('isConnected'=>0);
            $where = array('id'=>$_SESSION['user']);
            $userRepository->update($data,$where);
            unset($_SESSION['user']);
            $this->redirectUrl('/index/index'); 
        }
        $this->render('login.view.php',array('error'=>$error));
        
	}

	/*
	register page
	*/
    function register()
    {
        $error="";
        if (isset($_SESSION["user"])) {
            $this->redirectUrl('/index/index');
        }else{
            if(isset($_POST['uname'])){
                $userRepository = new UserRepository();
                $user = $userRepository->getUserByUsername($_POST["uname"]);
                if($user){
                    $error = "this username exist please choose another .";
                }else if( $_POST['psw'] !== $_POST['psw-repeat']){
                    $error = "password is not authentique ";
                }else if(strlen($_POST['psw'])>9){
                    $error = "password too short min 9 caracters ";
                }else{
                    $newUser = array(
                        'username'=>$_POST['uname'],
                        'password'=>password_hash($_POST['psw'], PASSWORD_BCRYPT),
                        'isConnected'=>0
                        );
                     $result =  $userRepository->create($newUser);
                     $this->redirectUrl('/index/login');
                }
            }
			$this->render('signup.view.php',array('error'=>$error));
		}
    }
    function chatroom(){
        $error="";
        
        if (!isset($_SESSION["user"])) {
            $this->redirectUrl('/index/index');
        }
        $userId = $_SESSION["user"];
        $MessageRepository = new MessageRepository();
        $UserRepository = new UserRepository();
        $messages = $MessageRepository->getAllMessage();
        $connectedUsers = $UserRepository->getConnectedUsers();

        if(isset($_POST['submit'])){
            $newMsg = array(
                'message'=>$_POST['message'],
                'userId'=>$userId
                );
            $result =  $MessageRepository->insert($newMsg);
            $this->redirectUrl('/index/chatroom');
        }

        $this->render('chatroom.view.php',array('error'=>$error,'messages'=> $messages,'connectedUsers'=> $connectedUsers));

    }
}