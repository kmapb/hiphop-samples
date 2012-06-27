<?

require_once 'datafetch.php';

/*
 * A more realistic use of generators. We want to interleave
 * compute with long-running data-fetches. Even when we need
 * the data, we only want to wait for the next one, not every
 * little thing.
 */
function processFetchedData($d) {
  // Spicy business logic right here!
  var_dump($d);
}

function main() {
  $dat = new MultiHandle(array(4, 530929372));
  // Data fetches have begun; we can do some data-independent compute here.

  // The fetches have all been kicked off now.
  foreach ($dat->fetchAll() as $d) {
    processFetchedData($d);
  }
}
main();

