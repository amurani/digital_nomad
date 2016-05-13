<?php

  $title = "Digitial Nomads";

  function get_base_url() {
    $base_url = "http://localhost/digital_nomad/";
    if (gethostname() == "Kevins-MacBook-Pro.local") {
      $base_url = "http://localhost:8000/digital_nomad/";
    }

    return $base_url;
  }

?>
