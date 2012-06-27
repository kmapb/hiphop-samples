<?

require_once 'xhp-classes.php';

// Where and when are we again?
$audience = 'Zynga ' . date(DATE_RSS);
$url = "https://github.com/facebook/hiphop-php/";

// Mixing php and xml code/data.
$anchor = <a href={sanitize($url)}>Hi, {$audience}!</a>;
// It's not just a string.
debug_dump($anchor);
// ...though this particular library provides a way to render it to a string.
debug_dump($anchor->render());

// Compose!
$list = <ol>
  <li>First thing</li>
  <li>Second thing</li>
  </ol>;

$head = <head> <title>Hi, {$audience}!</title> </head>;
$body = <body> {$anchor} {$list} </body>;

$htmlDoc = <html> {$head} {$body} </html>;

echo $htmlDoc->render();

