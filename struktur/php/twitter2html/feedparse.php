<?php
error_reporting(E_ALL&(~E_NOTICE));



function cut($start,$end,$word,$testvar=0)
{	
	$word=substr($word,strpos($word,$start)+strlen($start));
	$word=substr($word,0,strpos($word,$end));
	if($testvar) die($start." ".$end."<br>".$word);
	return $word;
}

function resume($text,$limit=7)
{
	$words=@explode(" ",$text);
	$words=@array_splice($words,0,$limit);
	$retstr=@implode(" ",$words);
	return $retstr."... ";
}


function easyfeeder($configs)
{
	$content=file_get_contents($configs[feed]);

	$items=explode("<status>",$content);
	array_shift($items);
	
	$retstr="";
	
	foreach($items as $cnt=>$item)
	{
		if($configs[maxitems]>0 and $cnt+1>$configs[maxitems]) break;
		
		$created_at=cut("<created_at>","</created_at>",$item);
		$text=cut("<text>","</text>",$item);
		$itemid=cut("<id>","</id>",$item);
		$screenname=cut("<screen_name>","</screen_name>",$item);

		$created_day = substr($created_at, 0, 3);
		$created_monthday = substr($created_at, 4, 3);
		$created_monthday2 = substr($created_at, 8, 2);
		

		$created_monthday = preg_replace("=Apr=", "April", $created_monthday);

		$created_timehour = substr($created_at, 11, 2) + 2;
		$created_timeminutes = substr($created_at, 14, 2);
		$created_year = substr($created_at, 26, 4);
			
		$created_at = "$created_monthday2. " . $created_monthday . " " . $created_year . ", " . $created_timehour . ":" . $created_timeminutes . $ampm;
		$itemlink = "http://twitter.com/" . $screenname . "/statuses/" . $itemid;

		$tpl=file_get_contents($configs[template]);
		
		
#		$tweet = preg_replace("=http://(.*?) =", "<a href=\"http://$1\">$1</a> ", $tweet);
		
		$tpl=str_replace("{created_at}",$created_at,$tpl);		
		$tpl=str_replace("{text}",$text,$tpl);
		$tpl=str_replace("{itemlink}",$itemlink,$tpl);
		
		#$tpl = preg_replace("=www\.(.*?)[ |<]=", "<a href=\"htetep://www.$1\" onclick=\"return window.open(this.href); return false;\">www.$1</a> ", $tpl);		
		$tpl = preg_replace("=http://(.*?)[ |<]=", "<a href=\"http://$1\" onclick=\"return window.open(this.href); return false;\">$1</a> ", $tpl);
		$tpl = preg_replace("=> /h3>=", "</h3>", $tpl);
		#$tpl=str_replace("htetep://","http://",$tpl);
		#$tpl = preg_replace("=http://(.*?) =", "<a href=\"http://$1\">$1</a> ", $tpl);
		
		$retstr.=$tpl;		
	}
	
	return $retstr;
}
?>