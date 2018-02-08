<?php

public function get_count_report($id){
  $count_report = Reports::where('driver_id', $id)->count();
  return $count_report;
}
?>
