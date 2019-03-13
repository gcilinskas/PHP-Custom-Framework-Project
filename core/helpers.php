<?php
session_start();
  
    function base_path($path = '') {
        return __DIR__ . '/..//' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }

    function redirect($location)
    {
        header("location: {$location}");
    }

    function redirectBack()
    {
        $back = trim($_SERVER['HTTP_REFERER'],'http://');
        redirect($back);
    }

    function view($name, $data = [])
    {
        extract($data);
        return require "app/views/main/{$name}.view.php";
    }

    function viewAdmin($name, $data = [])
    {
        extract($data);
        return require "app/views/admin/{$name}.view.php";
    }

     function get($item)
    {
        if (isset($_POST[$item])) {
            if(!empty($_POST[$item]) && $_POST[$item] != ""){
                return $_POST[$item];
            } else{
                return null;
            }
            
        } else if (isset($_GET[$item])) {
            if(!empty($_GET[$item])){
                return $_GET[$item];
            } else{
                return null;
            }
        }
    }

    // Get Only integers from string
    function int($s)
    {
        return preg_replace("/[^0-9]/", '', $s);    
    }


    // get category
    // works only with numeric_string
    function getCategoryFromFile() {

        $searchthis = '100000433';
        $matches = array();

        //Search for line where requested category id is written
        $handle = @fopen("assets/api_categories.txt", "r");
        if ($handle)
        {
            // if requested category id is in line, add line to array
            while (!feof($handle))
            {
                $buffer = fgets($handle);
                if(strpos($buffer, $searchthis) !== FALSE)
                    $matches[] = $buffer;
            }
            fclose($handle);
        }

        

        // pull out right line. Trying to avoid if requested id is part of other longer category_id
        $index = 0;
        foreach($matches as $match) {
            $string = $matches[$index];
            $first = strtok($string, " ");

            $int = int($first);
            if($int === $category_id)
            {
                $string = preg_replace('/[0-9]+/', '', $string);
                $string = preg_replace('/true/', '', $string);
                $string = preg_replace('/false/', '', $string);
                $string = preg_replace('/,/', '', $string);

            }
            $index++;
        }

    }

    if(!function_exists('env')) 
    {
        function env($key, $default = null) 
        {
            $value = getenv($key);

            if($value === false) {
                return $default;
            }

            switch (strtolower($value)) {
                case $value === 'true';
                    return true;
                case $value === 'false';
                    return false;
                default:
                    return $value;
            }
        }
    }

    function extractObject($object) : array {



    }
    








