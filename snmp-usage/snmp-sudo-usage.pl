#!/usr/bin/perl

my $sudosesh = `grep -c "(sudo:session): session opened" /var/log/auth.log`;

chomp($sudosesh);
print $sudosesh;