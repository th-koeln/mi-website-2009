#! /usr/bin/perl

=head1 Aufruf

http://essen.klickmeister.de/cgi-bin/c.noss/unischriften/cnoss_generator.pl?farbe=9BC0E5&text=Willkommen%20auf%20der<br>Website%20des%20Studiengangs<br>Kommunikationsdesign&breite=300

=cut


BEGIN{

	use CGI::Carp qw(fatalsToBrowser);
	
}

#use Image::Magick;
use Digest::MD5 qw(md5_hex);
my $cache = "../../website/font_images";

##################################################################################################
# Hauptprogramm

# Query String in MD5 umwandeln
my $name = md5_hex($ENV{QUERY_STRING});

# Bild oeffnen und anzeigen
my $grafik;

open(LESEN, "$cache/$name.gif") or print "Content-type: text/html\n\n$cache/$name.gif" and exit;binmode(LESEN);
while(<LESEN>){$grafik.=$_;}
close(LESEN);


binmode(STDOUT);
print "Content-type: image/gif\n\n$grafik";
