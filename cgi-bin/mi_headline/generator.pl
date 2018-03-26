#! /usr/bin/perl

=head1 Aufruf

http://essen.klickmeister.de/cgi-bin/c.noss/unischriften/cnoss_generator.pl?farbe=9BC0E5&text=Willkommen%20auf%20der<br>Website%20des%20Studiengangs<br>Kommunikationsdesign&breite=300

=cut


BEGIN{

	use CGI::Carp qw(fatalsToBrowser);
	
}

use Image::Magick;
use Digest::MD5 qw(md5_hex);

##################################################################################################
# Config

my $vorlagen = "vorlagen";
my $cache = "../../website/font_images";
my $font = "$vorlagen/myriadpro_regular.otf";
my $fontb = "$vorlagen/MyriadPro-Semibold.otf";
my $fontc = "$vorlagen/dakota.otf";


my %datensatz = (
	font => $font,
	farbe => "ffffff",
	farbe2 => "000000",
	farbe3 => "880000",
	bg => "77aabb",
	letter_spacing => 1.5,
	breite => 180,
	hoehe => 180,
	fontsize => 24,
	lineheight => 18,
	top => 0,
	left => 0,
	right => 0,
	text => "kein Text<br>vorhanden"
);

my %headline = (
	fontsize => 240,
	breite => 560,
	letter_spacing => 1,
	top => 40,
	left => 40,
	right => 40,
	unterlaenge => 80,
	font => $fontb
);

my %text = (
	fontsize => 180,
	breite => 560,
	bg => "c9eb99",
	farbe => "000000",
	letter_spacing => 1,
	top => 40,
	left => 40,
	right => 40,
	unterlaenge => 80
);

my %tagebuch = (
	fontsize => 240,
	farbe=> "442211",
	breite => 560,
	letter_spacing => 1,
	top => 40,
	left => 40,
	right => 40,
	unterlaenge => 80,
	hoehe => 180,
	font => $fontc,
	bg=>"ffffff"
);

my %textklein = (
	fontsize => 140,
	breite => 560,
	bg => "d18",
	farbe => "000000",
	letter_spacing => 1,
	top => 40,
	left => 40,
	right => 40,
	unterlaenge => 80
);

my %subline = (
	fontsize => 180,
	breite => 560,
	farbe => "3882d7",
	bg => "ffffff",
	letter_spacing => 1,
	unterlaenge => 40,
	font => $fontb,
);

my %verweis = (
	font => $fontb,
	fontsize => 130,
	breite => 560,
	farbe => "000",
	bg => "ffffff",
	letter_spacing => 1,
	unterlaenge => 40
);

my %verweis_aktiv = (
	font => $font,
	fontsize => 120,
	breite => 560,
	farbe => "000000",
	bg => "ffffff",
	letter_spacing => 1,
	unterlaenge => 40
);

# unicode Map
my %unicode_map = (
	
	"Š" => "\x{00e4}",
	"š" => "\x{00f6}",
	"Ÿ" => "\x{00fc}",
	"€" => "\x{00c4}",
	"…" => "\x{00d6}",
	"†" => "\x{00dc}",
	"§" => "\x{00df}",
	
	"ä" => "\x{00e4}",
	"ö" => "\x{00f6}",
	"ü" => "\x{00fc}",
	"Ä" => "\x{00c4}",
	"Ö" => "\x{00d6}",
	"Ü" => "\x{00dc}",
	"ß" => "\x{00df}"

);

sub UNICODE{
	my $text = shift;
	return $text;
	
	$text =~ s/pluszeichen/+/g;
	
	# utf-8 Codiererung einbauen
	foreach $key( keys(%unicode_map)){ 

		$text =~ s/$key/$unicode_map{$key}/g; 
	}

	return $text;
}

sub set_params{
	my %data = @_;
	foreach my $key(keys( %data )){
		$datensatz{ $key } = $data{ $key }; 
	}
}

##################################################################################################
# Hauptprogramm

# Query String in MD5 umwandeln
my $name = md5_hex($ENV{QUERY_STRING});

# Gibt es die Datei schon?
if(-e "$cache/$name.gif"){

	# zugriff zaehlen
	open(L, "$cache/$name.txt");
	undef $/;
	my $count = <L>;
	close(L);
	
	$count++;
	
	open(S, ">$cache/$name.txt");
	print S $count;
	close(S);

	# Bild oeffnen und anzeigen
	my $bild=Image::Magick->new();
	$bild->Read("$cache/$name.gif");
	
	print "Content-type: image/gif\n\n";
	binmode STDOUT;
	$bild->Write('gif:-');

	
}else{

	if($ENV{QUERY_STRING}){
		foreach (split(/&/, $ENV{QUERY_STRING}))  {
		 ($feldname,$feldwert) = split(/=/, $_);   
		 $feldwert =~ tr/+/ /;
		 $feldwert =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
		 $feldwert =~ s/<!--(.|\n)*-->//g;
		 $datensatz{$feldname} = $feldwert;
		}
	}
	
	
	if( $datensatz{"typ"} eq "text"){ set_params(%text); }
	if( $datensatz{"typ"} eq "textklein"){ set_params(%textklein); }
	if( $datensatz{"typ"} eq "headline"){ set_params(%headline); }
	if( $datensatz{"typ"} eq "subline"){ set_params(%subline); }
	if( $datensatz{"typ"} eq "verweis_aktiv"){ set_params(%verweis_aktiv); }
	if( $datensatz{"typ"} eq "tagebuch"){ set_params(%tagebuch); }


#print "Content-type: text/html\n\n$datensatz{text1} $datensatz{text2}"; exit;
	#$datensatz{text} =~ tr/[a-z]/[A-Z]/;	$datensatz{text2} =~ tr/[a-z]/[A-Z]/;
	$datensatz{text} =~ s/<br>/\n/ig;		$datensatz{text2} =~ s/<br>/\n/ig;	
	
	if($datensatz{text} =~ /amerikanischer/){ $datensatz{text} =~ s/amerikanischer/amerik./; }
	if($datensatz{text} =~ /MADE IN GERMANY/){ $datensatz{text} =~ s/MADE IN GERMANY/"MADE IN GERMANY"/; }
	
	if( $datensatz{"typ"} eq "text_rot"){
		$datensatz{text} =~ s/Macassar//i;
	}

	
	$datensatz{text} = UNICODE($datensatz{text}); $datensatz{text2} = UNICODE($datensatz{text2});

	#my $bild=Image::Magick->new(size=>$datensatz{breite}.'x'.$datensatz{fontsize});
	my $bild=Image::Magick->new(size=>'1200x'.$datensatz{fontsize});
	$bild->Read('xc:white');
	$bild->Colorize(fill=>"#$datensatz{bg}");
	
#	$bild->Annotate(font=>$font, fill=>"#$datensatz{farbe}" ,antialias=>1, pointsize=>$datensatz{fontsize} ,geometry=>"+0+$datensatz{fontsize}",text=>$datensatz{text}, encoding=>{UTF-8});
	
	$datensatz{text} =~ s/kaufmannsund/&/g; $datensatz{text2} =~ s/kaufmannsund/&/g;
	$string = $datensatz{text}; 
	$string2 = $datensatz{text2}; 
	$advance = $datensatz{letter_spacing};
	#$width{$_} ||= ($bild->QueryFontMetrics(text=>$_, font=>$datensatz{font}, pointsize=>$datensatz{fontsize}))[4] for (split //, $string);
	#$width{$_} ||= ($bild->QueryFontMetrics(text=>$_, font=>$datensatz{font}, pointsize=>$datensatz{fontsize}))[4] for (split //, $string);
	
	my $breite = ($bild->QueryFontMetrics(text=>$string, font=>$datensatz{font}, pointsize=>$datensatz{fontsize}))[4];
	my $breite2 = ($bild->QueryFontMetrics(text=>$string2, font=>$datensatz{font}, pointsize=>$datensatz{fontsize}))[4];
	my $breite_ges = $breite + $breite2 + $datensatz{right} + $datensatz{left};
	$breite_ges = "$breite_ges";
	
	
	my $hoehe = $datensatz{fontsize};
	if($datensatz{unterlaenge}){ 
		$hoehe = (($datensatz{fontsize}*1 ) +$datensatz{unterlaenge});
		$hoehe = "$hoehe";
	}
	if(( $datensatz{"typ"} eq "navi_footer_strich_rot")||( $datensatz{"typ"} eq "navi_footer_strich_weiss")){
		$breite_ges += 14;
	}
	my $bild2=Image::Magick->new(size=>$breite_ges.'x'. $hoehe);

	$bild2->Read('xc:white');
	$bild2->Colorize(fill=>"#$datensatz{bg}");
	
	if(( $datensatz{"typ"} eq "navi_footer_strich_rot")||( $datensatz{"typ"} eq "navi_footer_strich_weiss")){
		$bild2->Draw(stroke=>'white', primitive=>'line', points=>'4,2 4,9');
		$x = 12;
	}
	
	#$bild2->Annotate(text=>$_, font=>$font, fill=>"#$datensatz{farbe}", font=>$datensatz{font}, pointsize=>$datensatz{fontsize}, y=>$datensatz{fontsize}, x=>$x), $x +=$advance + $width{$_} for(split //, $string);
	$bild2->Annotate(text=>$string, font=>$font, fill=>"#$datensatz{farbe}", font=>$datensatz{font}, pointsize=>$datensatz{fontsize}, y=>$datensatz{top}+$datensatz{fontsize}-($datensatz{fontsize}/4), x=>$datensatz{left});
	$bild2->Annotate(text=>$string2, font=>$font, fill=>"#$datensatz{farbe}", font=>$fontb, pointsize=>$datensatz{fontsize}, y=>$datensatz{fontsize}-($datensatz{fontsize}/4), x=>$breite);

	# bild speichern
	$bild2->Scale("10%");
	
	$bild2->Write("$cache/$name.gif");
	
	print "Content-type: image/gif\n\n";
	binmode STDOUT;
	$bild2->Write('gif:-');
}
