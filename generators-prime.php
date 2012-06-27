<?

/* Kinda contrived example of using generators. */

/*
 * Use trial division to decide if a number is prime.
 */
function isPrime(int $cand) {
  if ($cand == 2) return true;
  $r = range(2, $cand - 1);
  foreach ($r as $n) {
    if ($cand % $n == 0) {
      return false;
    }
  }
  return true;
}

/*
 * Iterator over all primes.
 */
function thePrimes() {
  for ($i = 2; ; $i++) { // infinite loop? how/what?
    if (isPrime($i)) yield $i; // ahh. it's a generator.
  }
}

function main() {
  foreach (thePrimes() as $p) {
    var_dump($p);
    if ($p == 19501) break;
  }
  echo "----\n";
  foreach (thePrimes() as $p) {
    var_dump(2 * $p);
    if ($p == 23) break;
  }
}

main();
