<?php

namespace App\Helpers;

class Helper {
    public function faculties(){
        return array("Science and Engineering", "Bio-Sciences", "Business Studies", "Social Sciences","Arts and Humanities", "Law");
    }
    public function statuses(){
        return array("Pending", "Completed", "Cancelled");
    }

    public function comment($gpa){
        if($gpa>=3.0){
            return "First Class";
        }else if($gpa>=2.25){
            return "Second Class";
        }else if($gpa>=2.0){
            return "Third Class";
        }
        return "Fail";
    }


}
