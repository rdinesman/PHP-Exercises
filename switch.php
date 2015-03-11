 <?php

 // Set the default timezone
 date_default_timezone_set('America/Chicago');

 // Get Day of Week as number
 // 1 (for Monday) through 7 (for Sunday)
 $dayOfWeek = date('N');

 switch($dayOfWeek) {
     case 1:
         fwrite(STDOUT, "Monday\n");
         break;
     case 2:
         fwrite(STDOUT, "Tuesday\n");
         break;
     case 3:
         fwrite(STDOUT, "Wednesday\n");
         break;

     case 4:
         fwrite(STDOUT, "Thursday\n");
         break;
     case 5:
         fwrite(STDOUT, "Friday\n");
         break;
     case 6:
         fwrite(STDOUT, "Satday\n");
         break;
     default:
     	fwrite(STDOUT, "Sunday\n");
     	break;
 }