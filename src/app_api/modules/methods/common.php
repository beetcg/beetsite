<?php
	class Methods {
    // Log out
    public function logout(){
      setcookie('fname', '', time()-1);
      setcookie('lname', '', time()-1);
      setcookie('email', '', time()-1);
      setcookie('type', '', time()-1);

      if (!empty($_COOKIE['email'])) {
        $res = true;
      } else {
				$res = false;
			}
      return $res;
    }
  }
