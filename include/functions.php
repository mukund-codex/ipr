<?php 

    include_once('database.php');
    include_once('config.php');
    error_reporting(0);
    class Functions extends Database {
        private $userType = 'admin';
        
        function getAllBanners() {
			$query = "select * from ".PREFIX."banner_master where active ='Yes' order by display_order ASC";
			$sql = $this->query($query);
			return $sql;
        }
        
        function callsms($to)
        {   
            $digits = 4;
            $msg = rand(pow(10, $digits-1), pow(10, $digits)-1);
            $smsMsg = 'http://sms.businesskarma.in/api?method=sms.normal&api_key=2bb02d3223f91802a5974ee056e5b997&to='.$to.'&sender=TXTSMS&message='.$msg;
            $sms_delivery = file_get_contents($smsMsg);

			$query = "insert into ".PREFIX."login(mobile, otp) values ('".$to."', '".$msg."')";
            $this->query($query);
            $_SESSION['status'] = 'sent';
            //$_SESSION['login'] = 'notlogin';
        }

        function checkOTP($mobile, $otp){
            
            $query = "SELECT * FROM ".PREFIX."login WHERE mobile = '".$mobile."' and otp = '".$otp."' order by created DESC";
            $row = $this->query($query);
            if($this->num_rows($row) > 0){
                $_SESSION['status'] = 'Verified';
            }else{
                session_destroy();
            }
        }

        function checkVideoOTP($mobile, $otp){
            $query = "SELECT * FROM ".PREFIX."login WHERE mobile = '".$mobile."' and otp = '".$otp."' order by created DESC";
            $row = $this->query($query);
            if($this->num_rows($row) > 0){
                $_SESSION['video']++;
                $_SESSION['videoOTP'] = 'Verified';          
            }else{
                $_SESSION['videoOTP'] = 'Failed';
            }
        }

        function updateVechicleCode($mobile, $vehicle_code){

            $query = "UPDATE ".PREFIX."login SET vehicle_code = '".$vehicle_code."' WHERE mobile = '".$mobile."' order by created DESC";
            $this->query($query);
            
            //header("location: video.php");

        }

        function getDetails($mobile){
            
            $getdata = $this->fetch($this->query("SELECT * FROM ".PREFIX."login WHERE mobile = '".$mobile."' "));
            $vehicle_code = $getdata['vehicle_code'];

            $driverDetails = $this->query("SELECT * FROM ".PREFIX."vehicle_master WHERE vehicle_code = '".$vehicle_code."' ");
            return $this->fetch($driverDetails);
        }

        function getVideoDetailsbyDisplay(){
            $video = $_SESSION['video'];
            
            $query = $this->query("SELECT * FROM ".PREFIX."video_master where display_order = '".$video."' and active = 'Yes' order by id ASC");
            if($this->num_rows($query) > 0){
               	
                return $this->fetch($query);
               
            }else{
                if(isset($_SESSION)){
                    session_destroy();
                }
                header("location: thank-you.php");
            }
            
        }
    }

?>