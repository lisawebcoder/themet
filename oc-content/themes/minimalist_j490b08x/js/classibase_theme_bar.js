$(document).ready(clb_theme_bar);

function clb_theme_bar()
{
	/* 
	 * name
	 * presets
	 * url_demo
	 * url_info
	 */
	var arr_themes = {
		minimalist: {
			name: 'Minimalist',
			presets: {
				light: 'Light',
				dark: 'Dark'
			},
			url_demo: 'http://classibase.com/demo-theme/minimalist/',
			url_info: 'http://classibase.com/minimalist-free-responsive-osclass-theme/'
		}
	};
	var url_info = '';
	var opt_theme = '';
	var opt_preset = '';
	var opt_preset_sel = '';

	// read scurrent theme and preset from cookie
	var cur_theme = clb_theme;
	var cur_preset = clb_theme_preset;
	
	
	for (k in arr_themes)
	{
		if (cur_theme == k)
		{
			// populate presets
		}
		opt_theme += '<option value="' + arr_themes[k]['url_demo'] + '">' + arr_themes[k]['name'] + '</option>';
	}

	if (cur_theme && arr_themes[cur_theme])
	{
		// link to current theme
		url_info = arr_themes[cur_theme]['url_info'];

		// presets
		if (arr_themes[cur_theme]['presets'])
		{

			// populate presets
			for (p in arr_themes[cur_theme]['presets'])
			{
				if (cur_preset == p)
				{
					// selected preset
					opt_preset_sel = ' selected="selected"';
				}
				else
				{
					opt_preset_sel = '';
				}
				opt_preset += '<option value="' + p + '"' + opt_preset_sel + '>' + arr_themes[cur_theme]['presets'][p] + '</option>';
			}
		}
	}

	if (opt_theme != '')
	{
		opt_theme = '<select name="clb_theme" id="clb_theme">' + opt_theme + '</select> ';
	}
	if (opt_preset != '')
	{
		opt_preset = '<select name="clb_theme_preset" id="clb_theme_preset">' + opt_preset + '</select> ';
	}
	if (url_info != '')
	{
		url_info = '<a href="' + url_info + '" class="clb_button">Download</a>';
	}

	var html_return = '<style>.clb_theme_bar{background-color:#666;color:#ccc;border-bottom:solid 2px #333;font:12px/1.5 helvetica,arial,sans-serif; text-align:center; padding:5px; margin:0;}'
			+ '#clb_theme,#clb_theme_preset{width:150px;font:12px/1.5 helvetica,arial,sans-serif; margin:0; padding: 3px; border-radius:3px; color:#333; background-color:#fff; border:solid 1px #333;}'
			+ 'a.clb_button{text-decoration:none; background-color:#FA6900; border: solid 1px #999; border: solid 1px rgba(0, 0, 0, 0.2); box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5); border-radius:3px; padding:3px 10px;display: inline-block;color: white;cursor: pointer;font-weight: normal;overflow: visible;vertical-align: baseline;font-size: 100%;text-shadow: 1px 1px #666;}'
			+ 'a.clb_button:hover{background-color:#fb8733;}'
			+ 'a.clb_logo{font-size:140%; font-weight:normal; color:#fff; vertical-align:baseline;}'
			+ '</style>'
			+ '<div class="clb_theme_bar">'
			+ '<a href="http://classibase.com/category/themes/" class="clb_logo">Classibse Themes</a> '
			+ opt_theme
			+ opt_preset
			+ url_info
			+ '</div>';


	$('body').prepend(html_return);

	// add functionality to select boxes
	$('#clb_theme').change(function() {
		var $me = $(this);
		top.location.href = $me.val();
	});

	$('#clb_theme_preset').change(function() {
		var $me = $(this);
		
		//window.location.href = window.location.href + '?clb_theme_preset=' + $me.val();
		window.location.href =  '?clb_theme_preset=' + $me.val();
	});
}