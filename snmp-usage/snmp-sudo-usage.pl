#!/usr/bin/perl

my $sudosesh = `sudo grep -c "(sudo:session): session opened" /var/log/auth.log`;

print("$sudosesh");