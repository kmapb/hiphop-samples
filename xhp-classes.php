<?

require_once 'utils.php';

// HTML-like XHP element base class
class :html:element {
  private array $props;
  private array $children;

  function __construct(array $props, array $children) {
    $this->props = $props;
    $this->children = $children;
  }

  private function renderHelp(int $depth = 0) {
    $ind = str_repeat(" ", $depth * 4);
    $ret = $ind . '<' . $this->category;
    foreach ($this->props as $p => $v) {
      $ret .= " $p=\"$v\" ";
    }
    $ret .= '>';
    foreach ($this->children as $child) {
      $ret .="\n";
      if (is_string($child)) {
        $ret .= $ind . $ind . $child;
      } else if ($child instanceof :html:element) {
        $ret .= $child->renderHelp($depth + 1);
      }
    }
    $ret .= "\n".$ind."</" . $this->category . ">";
    return $ret;
  }

  public function render() {
    return $this->renderHelp(0);
  }
}

class :html extends :html:element {
  children(:head, :body);
  function __construct(array $props, array $children) {
    $this->category = 'html';
    parent::__construct($props, $children);
  }
}

class :head extends :html:element {
  children(:title);
  function __construct(array $props, array $children) {
    $this->category = 'html';
    parent::__construct($props, $children);
  }
}

class :title extends :html:element {
  function __construct(array $props, array $children) {
    $this->category = 'title';
    parent::__construct($props, $children);
  }
}

class :li extends :html:element {
  function __construct(array $props, array $children) {
    $this->category = 'li';
    parent::__construct($props, $children);
  }
}

class :ol extends :html:element {
  function __construct(array $props, array $children) {
    $this->category = 'ol';
    parent::__construct($props, $children);
  }
}

class :body extends :html:element {
  children (:title);
  function __construct(array $props, array $children) {
    $this->category = 'body';
    parent::__construct($props, $children);
  }
}

class :a extends :html:element {
  attribute
    string href = 'http://yahoo.com'; // XXX: should be your URL class
  function __construct(array $props, array $children) {
    $this->category = 'a';
    parent::__construct($props, $children);
  }
}

