<?php
declare (strict_types=1);
if(preg_match("/^(\S{5,25})@([a-z]{3,8})\.([a-z]{3})$/", "goizane.olaneta02@gmail.com")){
    echo "Email correcto";
}
else echo "Email incorrecto";
