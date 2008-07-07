<?php
class LinkHelper extends AppHelper 
{
    function menuItem($title, $url) 
	{
		return $this->output
		(
			"<a href=\"$url\" class=\"edit\">
				<div class=\"menuItemLeft\"></div>
				$title
				<div class=\"menuItemRight\"></div>
			</a>"
		);
    }
	
    function menu($links = array())
    {
		$out = array();
		
        foreach ($links as $title => $link)
        {			
            if($link == $this->here)
            {
                $out[] = sprintf(
					"<a href=\"%s\" class=\"active\"><div class=\"menuItemLeft\"></div>%s<div class=\"menuItemRight\"></div></a>", $link, $title);
            }
            else
            {
                $out[] = sprintf(
					"<a href=\"%s\"><div class=\"menuItemLeft\"></div>%s<div class=\"menuItemRight\"></div></a>", $link, $title);
            }
        }
		
		$tmp = join("\n", $out);
        return $this->output($tmp);
    } 
	
    function menu2($links = array(),$htmlAttributes = array(),$type = 'ul')
    {      
        $this->tags['ul'] = '<ul%s>%s</ul>';
        $this->tags['ol'] = '<ol%s>%s</ol>';
        $this->tags['li'] = '<li%s>%s</li>';
        $out = array();        
        foreach ($links as $title => $link)
        {
            if($this->url($link) == substr($this->here,0,-1))
            {
                $out[] = sprintf($this->tags['li'],' class="active"',$this->Html->link($title, $link));
            }
            else
            {
                $out[] = sprintf($this->tags['li'],'',$this->Html->link($title, $link));
            }
        }
        $tmp = join("\n", $out);
        return $this->output(sprintf($this->tags[$type],$this->_parseAttributes($htmlAttributes), $tmp));
    } 
}

?>