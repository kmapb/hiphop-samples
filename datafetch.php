<?

class AsyncHttpGet {
  private $fp;
  function __construct(string $host, int $port=80, string $path='/') {
    $this->fp = fsockopen($host, $port, $errno, $errstr, 30);
    // Start the request right now.
    $out = "GET $path HTTP/1.1\r\n";
    $out .= "Host: $host\r\n\r\n";
    fwrite($this->fp, $out);
  }
  function blockingGet() {
    return fread($this->fp, 1024);
  }
  function __destruct() {
    fclose($this->fp);
  }
}

class MultiHandle {
  private array $handles;
  function __construct(array $userIDs) {
    $this->handles = array_map(
        function($u) {
          return new AsyncHttpGet('graph.facebook.com', 80, "/$u"); },
        $userIDs);
  }

  function fetchAll() {
    foreach ($this->handles as $h)
      yield $h->blockingGet();
  }
}
