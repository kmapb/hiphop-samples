hiphop-samples
==============

This provides some examples of HipHop-specific extensions, especially
XHP and generators. To enable it, pass -v Eval.EnableHipHopSyntax=true to
hphpi or hhvm.

xhp-html.php: An example of an HTML-like use of XHP.
xhp-points.php: XHP in a different domain: 2d geometry.

generators-prime.php: Demonstrating generators over an infinite collection.
generators-data.php: A more realistic use of generators to make non-blocking
  I/O more readable.

datafetch.php: utilities for generators-data.php
xhp-classes.php: the html micro-library xhp-html.php uses.
utils.php: a couple other utility functions.
