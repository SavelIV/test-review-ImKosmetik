<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public $my;

    function __construct()
    {
        $this->my = TaskList::all();
    }

    public function addElements($element)
    {
        if (is_array($element))
            foreach($element as $el) if(is_int($el)) $this->my[] = $el;

        foreach ($this->my as $el) {
            $new = new TaskList(['user_id' => 1, ...$el]);
            $new->save();
        }
    }

    public function remove_element($element) {
        foreach(TaskList::all() as $el)
        {
            if($el == $element) {
                $el->delete();
            }
        }
    }
    public function sortArray()
    {
        $s = $this->calcSize($this->my);
        do {
            $t = false;
            $s1 = $s - 1;
            for ($i = 0; $i < $s1; $i++) {
                $k = $i+1;
                if ($this->my[$i] > $this->my[$k]) {
                    $temp = $this->my[$i];
                    $this->my[$i] = $this->my[$k];
                    $this->my[$k] = $temp;
                    $t = true;
                }
            }
            $s = $s1;
        } while ($t);

        return $this->my;
    }


    public function calcSize($array = null) {
        $size = 0;
        if ($array == null) $array = $this->my;
        foreach($array as $el) $size = $size+1;
        return $size;
    }
}
