<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarCatalog extends Component {
  
public $items = array();

  public function __construct($items=null) {
    $this->items = $items;
  }
  public function render() {
    return view('front.sidebar-catalog');
  }
}
