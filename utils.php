<?

function sanitize(string $url) {
  return $url; // heh.
}

function debug_dump(/*mixed*/ $var) {
  if (isset($_ENV['DBG'])) {
    var_dump($var);
  }
}

