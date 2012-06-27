<?

// We can represent stuff that isn't html.
class :point2d {
  attribute
    double x = 0.0,
    double y = 0.0;
  function __construct(array $properties, array $children) {
    if (isset($properties['x'])) $this->x = (float)$properties['x'];
    if (isset($properties['y'])) $this->y = (float)$properties['y'];
  }
}

class :poly2d {
  attribute
    enum {'red', 'green', 'blue'} color;
  children(:point2d)*;

  function __construct(array $properties, array $children) {
    if (isset($properties['color'])) $this->color = $properties['color'];
    $this->children = $children;
  }

  function translate(:point2d $vec) {
    foreach ($this->children as &$c) {
      $c->x += $vec->x;
      $c->y += $vec->y;
    }
  }

  function render() {
    // err. graphics code here.
  }
}

$poly = <poly2d>
    <point2d x={1.0} y={2.0}/>
    <point2d x={3.7} y={4.5}/>
    <point2d x={9.0} y={10.0}/>
  </poly2d>;

var_dump($poly);
$poly->translate(<point2d x={-1.0} y={1.0}/>);
var_dump($poly);

