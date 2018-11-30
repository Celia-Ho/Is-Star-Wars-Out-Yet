<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Is Star Wars Out Yet?</title>
    <style type="text/css">
    body {
    	margin: 0;
    	padding: 0;
      background: black;
    }
    #main-content {
      margin: 30px;
      text-align: center;
      color: skyblue;
    }
    #main-content h1 {
      font: 40px Arial, Helvetica, sans-serif;
    }
    #main-content p {
      font: 24px "Times New Roman", Times, Georgia, serif;
    }
    #main-content p strong {
      font-size: 70px;
      color: white;
    }
  	</style>
  </head>
  <body>
    <div id="main-content">
      <h1>Is Star Wars Out Yet?</h1>
      
      <?php date_default_timezone_set("America/Toronto"); ?>

      <p>
      <?php
      $star_wars_dates = array(
        1 => '1999-05-19',
        2 => '2002-05-16',
        3 => '2005-05-19',
        4 => '1977-05-25',
        5 => '1980-05-21',
        6 => '1983-05-25',
        7 => '2015-12-18',
        8 => '2017-12-15',
        9 => '2019-12-20'
      );
      
      if(isset($_GET['episode'])) {
        $episode = intval($_GET['episode']);  // GET request to get the episode number from drop-down list
      } else {
        $episode = 9;  // Defaulting the episode number to 9
      }

      $release_date_s = $star_wars_dates[$episode]; // String of release date (2019-12-20)
      $release_date_t = strtotime($release_date_s); // timestamp (time string to Unix timestamp)
      $release_date_p = strftime("%B %d, %Y", $release_date_t); // string formatted time = pretty string
      
      if(is_null($release_date_s)) {  // If there is no release date (NULL)
        echo "No. Episode #{$episode} does not yet have a release date.";
      } elseif(time() >= $release_date_t) {  // release date is in the past
        echo "Yes! Episode #{$episode} was released on {$release_date_p}.";
      } else {  // otherwise, release date is in the future
        echo "Not yet! Episode #{$episode} will be released on {$release_date_p}.";
      }
        
      ?>
    </p>
    <br />
      <form action="" method="get">
        Which Star Wars Episode?<br /><br />
        <select name="episode">
          <?php
          for($i=1; $i <= 9; $i++) {
            echo "<option value=\"{$i}\">#{$i}</option>"; // Drop-down list with options 1 to 9
          }
          ?>
        </select>
        <input type="submit" value="Submit" />
      </form>
      
    </div>
    
  </body>
</html>
