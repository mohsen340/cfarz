<?php

include 'Telegram.php';
include 'Controlltele.php';

// Set the bot TOKEN
$bot_token = '621080322:AAHzEC3AS_gRKfJd2idoTd5M08pAiyRgonE';
// Instances the class
$telegram = new Telegram($bot_token);
$controlltele = new mytele();

$text = $telegram->Text();
$chat_id = $telegram->ChatID();


    $callback_query = $telegram->Callback_Query();
    if ($callback_query !== null && $callback_query != '' && $controlltele->GetChatStatus()==0)
    {
        $reply = 'لطفا قیمت را وارد کنید :';
        $array = explode(':', $telegram->Callback_Data());
        $content = ['chat_id' => $telegram->Callback_ChatID(), 'text' => $reply];
        $telegram->sendMessage($content);
        $controlltele->UpdateChat(1,$array[0],$array[1]);
    }
    else if($controlltele->GetChatStatus()==0)
    {
        if($chat_id=="472306697" || $chat_id=="677035415" )
        {
            $keyboard = [
                ['ارزهای دیجیتال', 'ارز های مرجع', 'ارز ها'],
                ['سکه ها', 'طلاها']
            ];
        
            $reply_markup = [
                'keyboard' => $keyboard,
                'one_time_keyboard' => false,
                'resize_keyboard' => true,
                'selective' => false
            ];
        
            switch ($text) {
                case "/start":
                    $content = ['chat_id' => $chat_id, 'reply_markup' => json_encode($reply_markup), 'text' => 'به ربات تلگرامی کافه ارز خوش آمدید، لطفا یکی از بخش ها را انتخاب نمایید.'];
                    $telegram->sendMessage($content);
                    break;
                case "ارز ها":
                    $result = $controlltele->GetArzNames("currency");
                    $list = array();
                    foreach ($result[0] as $row) {
                        array_push($list, array(["text" => $row['name'], 'callback_data' => "currency:" . $row['id']]));
                    }
                    $keyb = $telegram->buildInlineKeyBoard($list);
                    $content = ['chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => '🔥🔥به بخش ارزها خوش آمدید🔥🔥 
         جهت ثبت قیمت هر کدام از ارزها بر روی دکمه مربوطه کلیک کنید و قیمت جدید را برای ارز وارد نمایید.'];
                    $telegram->sendMessage($content);
                    break;
                case "ارز های مرجع":
                    $result = $controlltele->GetArzNames("sourcecurrency");
                    $list = array();
                    foreach ($result[0] as $row) {
                        array_push($list, array(["text" => $row['name'], 'callback_data' => "sourcecurrency:" . $row['id']]));
                    }
                    $keyb = $telegram->buildInlineKeyBoard($list);
                    $content = ['chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => '🔥🔥به بخش ارزهای مرجع خوش آمدید🔥🔥 
         جهت ثبت قیمت هر کدام از ارزها بر روی دکمه مربوطه کلیک کنید و قیمت جدید را برای ارز وارد نمایید.'];
                    $telegram->sendMessage($content);
                    break;
                case "ارزهای دیجیتال":
                    $result = $controlltele->GetArzNames("digitalcurrency");
                    $list = array();
                    foreach ($result[0] as $row) {
                        array_push($list, array(["text" => $row['name'], 'callback_data' => "digitalcurrency:" . $row['id']]));
                    }
                    $keyb = $telegram->buildInlineKeyBoard($list);
                    $content = ['chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => '🔥🔥به بخش ارزهای دیجیتال خوش آمدید🔥🔥 
         جهت ثبت قیمت هر کدام از ارزها بر روی دکمه مربوطه کلیک کنید و قیمت جدید را برای ارز وارد نمایید.'];
                    $telegram->sendMessage($content);
                    break;
                case "طلاها":
                    $result = $controlltele->GetArzNames("gold");
                    $list = array();
                    foreach ($result[0] as $row) {
                        array_push($list, array(["text" => $row['name'], 'callback_data' => "gold:" . $row['id']]));
                    }
                    $keyb = $telegram->buildInlineKeyBoard($list);
                    $content = ['chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => '🔥🔥به بخش طلاها خوش آمدید🔥🔥 
         جهت ثبت قیمت هر کدام از طلاها بر روی دکمه مربوطه کلیک کنید و قیمت جدید را وارد نمایید.'];
                    $telegram->sendMessage($content);
                    break;
                case "سکه ها":
                    $result = $controlltele->GetArzNames("coins");
                    $list = array();
                    foreach ($result[0] as $row) {
                        array_push($list, array(["text" => $row['name'], 'callback_data' => "coins:" . $row['id']]));
                    }
                    $keyb = $telegram->buildInlineKeyBoard($list);
                    $content = ['chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => '🔥🔥به بخش سکه ها خوش آمدید🔥🔥 
         جهت ثبت قیمت هر کدام از سکه ها بر روی دکمه مربوطه کلیک کنید و قیمت جدید را وارد نمایید.'];
                    $telegram->sendMessage($content);
                    break;
            }
        }
        else
        {
            $string = "شما مجوز دسترسی به ربات را ندارید.";
            $content = ['chat_id' => $chat_id, 'text' => $string];
            $telegram->sendMessage($content);
        }
    }
    else
    {
        if($chat_id=="472306697" || $chat_id=="677035415" )
        {
            $result = $controlltele->setCurrency($text);
            $string = $result . " با موفقیت در سرور بروزرسانی شد. ";
            $content = ['chat_id' => $chat_id, 'text' => $string];
            $telegram->sendMessage($content);
            $controlltele->UpdateChat(0,0,0);
        }
        else
        {
            $string = "شما مجوز دسترسی به ربات را ندارید.";
            $content = ['chat_id' => $chat_id, 'text' => $string];
            $telegram->sendMessage($content);
        }
    
    }
?>