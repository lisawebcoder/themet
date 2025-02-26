                    <div style="position:relative;margin: auto; background-image:url(<?php echo osc_current_web_theme_url('images/map/'.osc_get_preference('country@map', 'aiclassy_theme').'.png'); ?>); width:100%;max-width:542px; height:436px;background-repeat:no-repeat;background-size:contain;background-position:center;">
                        <canvas id="map-status"  style="position:absolute;left:2px; top:0px; width:100%;max-width:542px; height:436px;" width="542" height="436"></canvas>
                        <canvas id="map-hover"  style="position:absolute;left:2px; top:0px; width:100%;max-width:542px; height:436px;" width="542" height="436"></canvas>
                        <img id="map-img" src="<?php echo osc_current_web_theme_url('images/map/'.osc_get_preference('country@map', 'aiclassy_theme').'.png'); ?>" alt="pakistan" usemap="#Map" border="0" style="position:absolute;left:0; top:2px; width:100%;max-width:542px; height:436px; opacity:0" width="542" height="436"/>
                    </div>
                    <map id="Map" name="Map">
                        <area shape="poly" coords="243,279,254,279,259,292,265,302,247,328,247,338,255,343,262,341,264,347,260,361,262,366,263,373,276,373,277,384,283,392,283,401,287,407,285,414,287,419,277,423,272,421,273,416,263,418,258,419,255,424,248,424,244,419,223,419,218,417,214,426,202,428,197,434,193,434,187,428,179,426,174,418,170,404,170,397,157,392,171,378,182,360,180,353,175,340,175,316,184,296,203,291,214,280,225,278" href="#" alt="Sindh" />
<area shape="poly" coords="181,360,170,379,156,392,156,386,157,382,154,377,154,367,151,370,147,366,139,371,126,371,120,370,115,370,113,375,109,370,97,369,90,374,80,364,73,367,65,365,56,369,50,366,40,366,36,364,31,368,26,368,26,363,20,363,20,367,12,367,11,363,2,363,6,356,7,346,13,342,16,331,23,324,32,320,41,317,54,317,55,314,62,314,63,304,59,301,52,301,50,296,52,288,52,272,54,267,43,262,30,254,22,245,18,227,6,208,5,203,9,203,49,225,89,225,91,231,96,231,102,227,118,226,127,231,131,226,138,228,153,226,153,223,159,221,159,212,165,206,162,201,165,191,177,180,190,180,198,182,204,181,205,177,200,174,210,169,222,163,228,167,234,166,239,172,250,159,253,166,256,166,265,160,268,165,269,181,272,187,276,184,279,184,278,194,276,196,277,202,268,215,267,232,261,238,254,244,254,250,256,254,250,270,244,279,223,279,215,280,205,290,186,296,180,304,175,319,175,334,175,339,178,348" href="#" alt="Balochistan" />
<area shape="poly" coords="245,278,253,279,257,285,265,303,274,297,280,296,283,304,287,310,297,304,313,303,318,301,319,293,325,290,328,283,330,277,338,273,341,269,348,268,358,254,365,238,380,231,381,227,378,221,391,213,392,208,396,205,399,202,399,197,398,194,399,191,402,189,401,182,399,179,404,173,411,170,417,167,421,165,420,159,415,154,410,153,403,152,404,142,398,143,393,141,384,135,380,135,376,128,376,106,372,106,364,110,356,103,351,107,345,102,339,102,337,108,331,110,330,115,322,123,323,130,318,126,316,132,309,134,305,136,306,146,310,151,308,159,303,168,299,172,299,176,293,179,297,184,293,189,279,190,277,196,277,202,270,212,268,214,267,231,262,237,255,241,253,246,256,254,252,263,249,272" href="#" alt="Punjab" />

<area shape="poly"  coords="375,105,366,108,358,104,352,107,346,102,340,103,337,108,331,109,331,115,323,122,323,131,318,126,316,132,306,134,306,144,310,152,306,163,300,171,300,176,294,179,298,184,294,189,280,190,279,184,273,188,269,182,269,165,266,160,261,165,255,165,252,162,250,143,255,140,255,135,259,131,259,124,272,124,281,118,280,112,272,95,275,93,293,97,300,96,306,90,302,81,320,57,321,43,316,34,313,29,328,14,334,13,338,10,341,6,379,1,383,8,376,8,362,9,362,14,347,29,347,36,349,40,362,40,363,45,373,50,381,50,380,55,380,61,392,65,389,70,384,73,380,75,380,80,370,89,374,97" href="#" alt="KPK" />
<area shape="poly"  coords="413,153,405,153,405,141,398,143,385,136,380,134,377,128,376,105,376,101,371,89,380,80,380,74,388,74,391,67,402,67,414,75,421,70,424,70,427,82,433,84,442,84,447,78,454,78,454,75,463,75,469,67,474,67,477,62,496,48,499,46,503,44,508,45,511,40,517,40,520,44,525,48,532,48,539,53,539,64,536,72,535,79,533,83,527,84,527,90,519,91,519,98,515,104,503,103,504,109,506,116,503,118,503,124,514,126,514,135,521,143,516,151,511,149,503,157,497,153,497,147,487,151,487,145,477,147,469,135,465,141,457,139,450,136,446,129,436,129,432,134,428,134,423,138,423,144" href="#" alt="Azad Kashmir" />
<area shape="poly" coords="500,45,476,64,476,67,471,67,465,76,456,76,455,78,448,78,443,84,430,84,427,81,425,70,413,75,404,68,393,68,393,65,381,61,382,52,374,51,365,45,364,40,353,40,348,38,348,30,362,15,362,10,384,9,384,4,390,6,393,2,402,2,402,6,408,3,414,1,418,8,423,15,429,21,435,24,440,26,443,30,450,36,450,41,456,44,463,48,467,55,473,55,478,52,490,47,497,47" href="#" alt="GilGit" />
</map>
