<?php
/*=============================================*\
// ######################################## \\
// # https://www.m-asiyabi.ir             # \\
// # PHP code in this file is © 2017      # \\
// # Start Coding By: Mahdi Asiyabi       # \\
// ######################################## \\
\*=============================================*/

	class mytele
	{
		private $_dhn="mysql:host=localhost;dbname=cp34294_cafearz;charset=utf8";
		private $_username="cp34294_cafearza";
		private $_password='nogp}uK^T{AC';
		private $_db;

		public function __construct()
		{
			try
			{	
				$option = array (
					PDO::ATTR_PERSISTENT => true,
					PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
				);
				$this->_db= new PDO($this->_dhn,$this->_username,$this->_password,$option);
				$this->_db->query("set names utf8");
				$this->_db->query("set charset utf8"); 	
			}
			catch(PDOException $e)
			{
				trigger_error("Error On Database : " . $e->getMessage());
			}
		}

		function InsertNewGhimat($tablename,$cid,$price)
		{
            switch ($tablename)
            {
                case 'currency':
                    $CLU = $this->_db->prepare("INSERT INTO datasetcurrency (currency_id , `price`) VALUES (:idval,:price)");
                    break;
                case 'sourcecurrency':
                    $CLU = $this->_db->prepare("INSERT INTO datasetsourcecurrency (sourcecurrency_id , `price`) VALUES (:idval,:price)");
                    break;
                case 'digitalcurrency':
                    $CLU = $this->_db->prepare("INSERT INTO datasetdigitalcurrency (digitalcurrency_id , `price`) VALUES (:idval,:price)");
                    break;
                case 'gold':
                    $CLU = $this->_db->prepare("INSERT INTO datasetgold (gold_id , `price`) VALUES (:idval,:price)");
                    break;
                case 'coins':
                    $CLU = $this->_db->prepare("INSERT INTO datasetcoins (coins_id , `price`) VALUES (:idval,:price)");
                    break;
            }
			$CLU->bindParam(":idval", $cid);
			$CLU->bindParam(":price", $price);
			$CLU->execute();
			return -5;
		}

        function GetTableName()
        {
            $CLU = $this->_db->prepare("SELECT tablename FROM telegram WHERE id=1");
            $CLU->execute();
            $result = $CLU->fetchColumn();
            return $result;
        }

        function GetID()
        {
            $CLU = $this->_db->prepare("SELECT c_id FROM telegram WHERE id=1");
            $CLU->execute();
            $result = $CLU->fetchColumn();
            return $result;
        }
		function setCurrency($price)
        {
            $name = $this->GetTableName();
            $id =$this->GetID();
            switch ($name)
            {
                case 'currency':
                    $CLC = $this->_db->prepare("UPDATE  currency  SET `inc_dec`=:inc WHERE id=:cid");
                    break;
                case 'sourcecurrency':
                    $CLC = $this->_db->prepare("UPDATE  sourcecurrency  SET `inc_dec`=:inc WHERE id=:cid");
                    break;
                case 'digitalcurrency':
                    $CLC = $this->_db->prepare("UPDATE  digitalcurrency  SET `inc_dec`=:inc WHERE id=:cid");
                    break;
                case 'gold':
                    $CLC = $this->_db->prepare("UPDATE  gold  SET `inc_dec`=:inc WHERE id=:cid");
                    break;
                case 'coins':
                    $CLC = $this->_db->prepare("UPDATE  coins  SET `inc_dec`=:inc WHERE id=:cid");
                    break;
            }
            $incdec = $this->GetArzLastGhimat($name,$this->GetID());
            $incdecc="0";
            if($incdec<$price)
                $incdecc="1";
            $CLC->bindParam(":inc",$incdecc);
            $CLC->bindParam(":cid",$id);
            $CLC->execute();
            $this->InsertNewGhimat($name,$id,$price);
            $namer = $this->GetArzName($name,$id);
            $this->sendNotif($name,$this->GetID(),$namer);
            $this->UpdateChat(1,$name,$id);
            return $namer;
        }

        function GetArzNames($tablename)
        {
            $CLU = $this->_db->prepare("SELECT * FROM ".$tablename."");
            $CLU->execute();
            $result = $CLU->fetchAll();
            $resultT = $CLU->rowCount();
            return array($result,$resultT);
        }

        function GetArzName($tablename,$id)
        {
            $CLU = $this->_db->prepare("SELECT name FROM ".$tablename." WHERE id=:id");
            $CLU->bindParam(":id", $id);
            $CLU->execute();
            $result = $CLU->fetchColumn();
            return $result;
        }
        
        function GetArzLastGhimat($tablename,$id)
        {
            $date = date('Y-m-d', time());
            $date .= " 00:00:00";
            switch ($tablename)
            {
                case 'currency':
                    $CLC = $this->_db->prepare("SELECT price FROM datasetcurrency WHERE currency_id=:id AND update_at<\"".$date."\" ORDER BY updated_at DESC LIMIT 1");
                    break;
                case 'sourcecurrency':
                    $CLC = $this->_db->prepare("SELECT price FROM datasetsourcecurrency WHERE sourcecurrency_id=:id AND update_at<\"".$date."\" ORDER BY updated_at DESC LIMIT 1");
                    break;
                case 'digitalcurrency':
                    $CLC = $this->_db->prepare("SELECT price FROM datasetdigitalcurrency WHERE digitalcurrency_id=:id AND update_at<\"".$date."\" ORDER BY updated_at DESC LIMIT 1");
                    break;
                case 'gold':
                    $CLC = $this->_db->prepare("SELECT price FROM datasetgold WHERE gold_id=:id AND update_at<\"".$date."\" ORDER BY updated_at DESC LIMIT 1");
                    break;
                case 'coins':
                    $CLC = $this->_db->prepare("SELECT price FROM datasetcoins WHERE coins_id=:id AND update_at<\"".$date."\" ORDER BY updated_at DESC LIMIT 1");
                    break;
            }
            
            $CLC->bindParam(":id", $id);
            $CLC->execute();
            $result = $CLC->fetchColumn();
            return $result;
        }


        function GetChatStatus()
		{
			$CLU = $this->_db->prepare("SELECT checker FROM telegram WHERE id=1");
			$CLU->execute();
			$result = $CLU->fetchColumn();
			if($CLU->rowCount()==1)
			{
				return $result;
			}
			return -6;
		}

		public function UpdateChat($cheker,$tablename,$c_id)
		{
            $CLU = $this->_db->prepare("UPDATE `telegram` SET `checker`=:cheker,`tablename`=:tablename,c_id = :cid WHERE id=1");
            $CLU->bindParam(":cheker",$cheker);
            $CLU->bindParam(":tablename",$tablename,PDO::PARAM_STR);
            $CLU->bindParam(":cid",$c_id);
			$CLU->execute();
			return -5;
		}
		
		function sendNotif($tablename,$id,$namearz)
		{
            switch ($tablename)
            {
                case 'currency':
                    $CLC = $this->_db->prepare("SELECT pusheid FROM subscribers WHERE `table`='Currencies' AND sub_id=:id");
                    break;
                case 'sourcecurrency':
                    $CLC = $this->_db->prepare("SELECT pusheid FROM subscribers WHERE `table`='SCurrencies' AND sub_id=:id");
                    break;
                case 'digitalcurrency':
                    $CLC = $this->_db->prepare("SELECT pusheid FROM subscribers WHERE `table`='DCurrencies' AND sub_id=:id");
                    break;
                case 'gold':
                    $CLC = $this->_db->prepare("SELECT pusheid FROM subscribers WHERE `table`='Golds' AND sub_id=:id");
                    break;
                case 'coins':
                    $CLC = $this->_db->prepare("SELECT pusheid FROM subscribers WHERE `table`='Coins' AND sub_id=:id");
                    break;
            }
            
            $CLC->bindParam(":id", $id);
            $CLC->execute();
            $result = $CLC->fetchAll();
            $msg11 = "قیمت ".$namearz."تغییر یافت ";
            $this->OrginalNotif($msg11,$result);
		}
		
		function OrginalNotif($message,$id)
		{
		    
		       $url = 'https://fcm.googleapis.com/fcm/send';
                $fields = array (
                        'registration_ids' => array (
                                $id
                        ),
                        'data' => array (
                                "message" => $message
                        )
                );
                $fields = json_encode ( $fields );
            
                $headers = array (
                        'Authorization: key=' . "YOUR_KEY_HERE",
                        'Content-Type: application/json'
                );
            
                $ch = curl_init ();
                curl_setopt ( $ch, CURLOPT_URL, $url );
                curl_setopt ( $ch, CURLOPT_POST, true );
                curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
                curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
                curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
            
                $result = curl_exec ( $ch );
                echo $result;
                curl_close ( $ch );

		}
		
		/*
		function OrginalNotif($msg11,$pushids)
		{
		    $TOKEN = "65390604f2dd2e60c8251a66837189c4394ffc36";
            $data = array(
                "app_ids" => ["mr.bisi.cafearz"],
                "data" => array(
                    "title" => "تغییر قیمت",
                    "content" => $msg11,
                    "notif_icon" => "announcement",
                    "wake_screen" => true,
                    "sound_url" => "http://panel.pushe.co/assets/voices/2.mp3",
                    "visibility" => true,
                    "led_color" => "-16733441",
                    "led_on" => 200,
                    "led_off" => 500,
                    "action" => array(
                        "url" => "",
                        "action_type" => "A"
                    ),
                ),
                "filters" => array(
                    "pushe_id" => [$pushid],
                ),
            );
            $ch = curl_init("https://api.pushe.co/v2/messaging/notifications/");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Content-Type: application/json",
                "Accept: application/json",
                "Authorization: Token " . $TOKEN,
            ));
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $reponse = curl_exec($ch);
            $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
		}
		*/
		
	}
?>